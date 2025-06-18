# BaloZone Sale System Documentation

## 🎯 Tổng quan Sale System

Hệ thống Sale của BaloZone được thiết kế với 2 bảng chính:

### 1. Sale Campaigns (Chiến dịch Sale)
Quản lý thông tin tổng quát về các chiến dịch sale như Black Friday, Flash Sale, Sale sinh viên...

### 2. Sale Products (Sản phẩm trong Sale)
Quản lý chi tiết sản phẩm nào được sale, giảm bao nhiêu %, giới hạn số lượng...

## 📊 Database Schema

### Sale Campaigns Table
```sql
- id (primary key)
- name (string, required) - Tên chiến dịch
- slug (string, unique, required) - URL-friendly name
- description (text, nullable) - Mô tả chiến dịch
- banner_image (string, nullable) - Hình ảnh banner
- start_date (datetime, required) - Ngày bắt đầu sale
- end_date (datetime, required) - Ngày kết thúc sale
- status (enum: draft/active/expired/cancelled, default: draft)
- is_featured (boolean, default: false) - Chiến dịch nổi bật
- priority (integer, default: 0) - Độ ưu tiên hiển thị
- metadata (json, nullable) - Dữ liệu bổ sung
- created_at, updated_at
```

### Sale Products Table
```sql
- id (primary key)
- sale_campaign_id (foreign key to sale_campaigns)
- product_id (foreign key to products)
- original_price (decimal, required) - Giá gốc
- sale_price (decimal, required) - Giá sau khi giảm
- discount_percentage (decimal) - % giảm giá
- discount_amount (decimal) - Số tiền giảm
- discount_type (enum: percentage/fixed_amount)
- start_date (datetime, nullable) - Override ngày campaign
- end_date (datetime, nullable) - Override ngày campaign
- max_quantity (integer, nullable) - Giới hạn số lượng sale
- sold_quantity (integer, default: 0) - Đã bán
- is_active (boolean, default: true)
- created_at, updated_at
```

## 🔗 API Endpoints

### Public Sale Campaign APIs
```http
GET    /api/sale-campaigns          # List sale campaigns (search, filter, pagination)
GET    /api/sale-campaigns/{id}     # Get sale campaign details
GET    /api/sale-campaigns-active   # Get active sale campaigns
GET    /api/sale-campaigns-featured # Get featured sale campaigns
GET    /api/sale-campaigns/{id}/products # Get products in sale campaign
```

### Product Sale APIs
```http
GET    /api/products-on-sale        # Get products currently on sale
GET    /api/products/{id}/sale-campaigns # Get sale campaigns for product
```

### Admin Sale Campaign APIs (Protected)
```http
POST   /api/sale-campaigns          # Create sale campaign
PUT    /api/sale-campaigns/{id}     # Update sale campaign
DELETE /api/sale-campaigns/{id}     # Delete sale campaign
POST   /api/sale-campaigns/{id}/products # Add products to campaign
DELETE /api/sale-campaigns/{id}/products/{productId} # Remove product from campaign
```

## 📝 Request/Response Examples

### Create Sale Campaign
```json
POST /api/sale-campaigns
{
    "name": "Black Friday 2025",
    "slug": "black-friday-2025",
    "description": "Siêu sale Black Friday - Giảm giá khủng lên đến 70%",
    "banner_image": "campaigns/black-friday-2025.jpg",
    "start_date": "2025-11-24T00:00:00Z",
    "end_date": "2025-11-30T23:59:59Z",
    "status": "active",
    "is_featured": true,
    "priority": 100,
    "metadata": {
        "color": "#000000",
        "tags": ["black-friday", "mega-sale"],
        "description_short": "Giảm giá lên đến 70%"
    }
}
```

### Add Products to Campaign
```json
POST /api/sale-campaigns/1/products
{
    "products": [
        {
            "product_id": 10,
            "sale_price": 150000,
            "discount_type": "percentage",
            "max_quantity": 20
        },
        {
            "product_id": 11,
            "sale_price": 200000,
            "discount_type": "percentage",
            "max_quantity": 15
        }
    ]
}
```

### Get Products On Sale with Filters
```http
GET /api/products-on-sale?category_id=1&min_discount=30&sort_by=discount&sort_order=desc
```

## 🔄 Model Relationships

### SaleCampaign Model
```php
// One to Many with SaleProduct
public function saleProducts()
{
    return $this->hasMany(SaleProduct::class);
}

// Many to Many with Product (through sale_products)
public function products()
{
    return $this->belongsToMany(Product::class, 'sale_products')
        ->withPivot(['original_price', 'sale_price', 'discount_percentage', ...])
        ->withTimestamps();
}
```

### Product Model (Updated)
```php
// One to Many with SaleProduct
public function saleProducts()
{
    return $this->hasMany(SaleProduct::class);
}

// Get current active sale
public function currentSale()
{
    return $this->hasOne(SaleProduct::class)
        ->where('is_active', true)
        ->whereHas('saleCampaign', function($q) {
            $q->where('status', 'active')
              ->where('start_date', '<=', now())
              ->where('end_date', '>=', now());
        });
}

// Check if product is on sale
public function isOnSale(): bool
{
    return $this->currentSale()->exists();
}
```

## 🎨 Features

### 1. Campaign Management
- ✅ Tạo, sửa, xóa chiến dịch sale
- ✅ Lên lịch start/end date
- ✅ Trạng thái: draft, active, expired, cancelled
- ✅ Độ ưu tiên hiển thị (priority)
- ✅ Campaign nổi bật (is_featured)
- ✅ Metadata tùy chỉnh (màu sắc, tags, mô tả ngắn)

### 2. Product Sale Management
- ✅ Thêm/xóa sản phẩm khỏi campaign
- ✅ Tự động tính discount percentage/amount
- ✅ Giới hạn số lượng sale (max_quantity)
- ✅ Theo dõi đã bán (sold_quantity)
- ✅ Override start/end date cho từng sản phẩm

### 3. Public APIs
- ✅ Lấy danh sách campaign đang active
- ✅ Lấy campaign nổi bật (featured)
- ✅ Lấy sản phẩm đang sale
- ✅ Filter theo category, brand, discount range
- ✅ Tìm kiếm và phân trang

### 4. Business Logic
- ✅ Kiểm tra campaign đang active
- ✅ Kiểm tra sản phẩm còn slot sale
- ✅ Tự động cập nhật sold_quantity khi có order
- ✅ Tính giá hiệu quả (effective price) cho sản phẩm

## 📈 Sample Data Created

Hệ thống đã tạo 4 chiến dịch sale mẫu:

### 1. Black Friday 2025
- **Thời gian**: Ngày mai đến 7 ngày
- **Trạng thái**: Active, Featured
- **Discount**: 40-70%
- **Sản phẩm**: 8 sản phẩm

### 2. Flash Sale Cuối Tuần  
- **Thời gian**: Hôm nay đến 3 ngày
- **Trạng thái**: Active, Featured
- **Discount**: 30-50%
- **Sản phẩm**: 8 sản phẩm

### 3. Sale Sinh Viên
- **Thời gian**: 2 ngày trước đến 14 ngày
- **Trạng thái**: Active
- **Discount**: 20-35%
- **Sản phẩm**: 7 sản phẩm

### 4. Mega Sale Khai Trương
- **Thời gian**: 10 ngày nữa đến 17 ngày
- **Trạng thái**: Draft, Featured
- **Discount**: 60-80%
- **Sản phẩm**: 3 sản phẩm

## 🧪 Testing

Sử dụng file `test_sale_apis.http` để test các API:

1. **Public APIs**: Test không cần authentication
2. **Admin APIs**: Cần JWT token
3. **Error Handling**: Test với dữ liệu invalid
4. **Performance**: Test pagination và filtering

## 🚀 Next Steps

1. **Frontend Integration**: Tích hợp với React/Vue frontend
2. **Email Marketing**: Gửi email thông báo sale
3. **Push Notifications**: Thông báo real-time khi có sale mới
4. **Analytics**: Theo dõi hiệu quả campaign
5. **A/B Testing**: Test các banner và mô tả khác nhau
6. **Inventory Management**: Tích hợp với hệ thống kho
