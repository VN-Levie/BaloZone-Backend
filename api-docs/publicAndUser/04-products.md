# 4. Sản phẩm (Products)

## Lấy danh sách sản phẩm

### GET /api/products

**Mô tả**: Lấy danh sách sản phẩm với phân trang

**Phương thức**: GET

**URL**: `/api/products`

**Phân quyền**: Không yêu cầu authentication

**Tham số query**:
- `page` (integer, optional): Số trang (mặc định: 1)
- `per_page` (integer, optional): Số sản phẩm mỗi trang (mặc định: 10)

**Response thành công (200)**:

```json
{
  "success": true,
  "data": {
    "current_page": 1,
    "data": [
      {
        "id": 1,
        "name": "Balo Nike Air Max",
        "slug": "balo-nike-air-max",
        "description": "Balo thể thao Nike Air Max với thiết kế hiện đại",
        "price": 1200000,
        "discount_price": 1000000,
        "image": "https://example.com/nike-backpack.jpg",
        "gallery": [
          "https://example.com/nike-1.jpg",
          "https://example.com/nike-2.jpg"
        ],
        "stock": 50,
        "brand": {
          "id": 1,
          "name": "Nike",
          "slug": "nike"
        },
        "category": {
          "id": 1,
          "name": "Balo",
          "slug": "balo"
        },
        "created_at": "2024-01-01T00:00:00.000000Z",
        "updated_at": "2024-01-01T00:00:00.000000Z"
      }
    ],
    "first_page_url": "http://example.com/api/products?page=1",
    "from": 1,
    "last_page": 5,
    "last_page_url": "http://example.com/api/products?page=5",
    "next_page_url": "http://example.com/api/products?page=2",
    "path": "http://example.com/api/products",
    "per_page": 10,
    "prev_page_url": null,
    "to": 10,
    "total": 50
  },
  "message": "Lấy danh sách sản phẩm thành công"
}
```

## Lấy chi tiết sản phẩm

### GET /api/products/{id}

**Mô tả**: Lấy thông tin chi tiết sản phẩm

**Phương thức**: GET

**URL**: `/api/products/{id}`

**Phân quyền**: Không yêu cầu authentication

**Tham số URL**:
- `id` (integer, required): ID sản phẩm

**Response thành công (200)**:

```json
{
  "success": true,
  "data": {
    "id": 1,
    "name": "Balo Nike Air Max",
    "slug": "balo-nike-air-max",
    "description": "Balo thể thao Nike Air Max với thiết kế hiện đại",
    "price": 1200000,
    "discount_price": 1000000,
    "image": "https://example.com/nike-backpack.jpg",
    "gallery": [
      "https://example.com/nike-1.jpg",
      "https://example.com/nike-2.jpg"
    ],
    "stock": 50,
    "brand": {
      "id": 1,
      "name": "Nike",
      "slug": "nike"
    },
    "category": {
      "id": 1,
      "name": "Balo",
      "slug": "balo"
    },
    "created_at": "2024-01-01T00:00:00.000000Z",
    "updated_at": "2024-01-01T00:00:00.000000Z"
  },
  "message": "Lấy chi tiết sản phẩm thành công"
}
```

**Response lỗi (404)**:

```json
{
  "success": false,
  "message": "Sản phẩm không tồn tại"
}
```

## Lấy sản phẩm nổi bật

### GET /api/products-featured

**Mô tả**: Lấy danh sách sản phẩm nổi bật

**Phương thức**: GET

**URL**: `/api/products-featured`

**Phân quyền**: Không yêu cầu authentication

**Tham số**: Không có

**Response**: Giống như `/api/products` nhưng chỉ trả về sản phẩm nổi bật

## Lấy sản phẩm theo danh mục

### GET /api/products/category/{slug}

**Mô tả**: Lấy danh sách sản phẩm theo danh mục

**Phương thức**: GET

**URL**: `/api/products/category/{slug}`

**Phân quyền**: Không yêu cầu authentication

**Tham số URL**:
- `slug` (string, required): Slug của danh mục

**Tham số query**:
- `page` (integer, optional): Số trang (mặc định: 1)
- `per_page` (integer, optional): Số sản phẩm mỗi trang (mặc định: 10)

**Response**: Giống như `/api/products` nhưng chỉ trả về sản phẩm thuộc danh mục được chỉ định

## Lấy sản phẩm theo thương hiệu

### GET /api/products/brand/{slug}

**Mô tả**: Lấy danh sách sản phẩm theo thương hiệu

**Phương thức**: GET

**URL**: `/api/products/brand/{slug}`

**Phân quyền**: Không yêu cầu authentication

**Tham số URL**:
- `slug` (string, required): Slug của thương hiệu

**Tham số query**:
- `page` (integer, optional): Số trang (mặc định: 1)
- `per_page` (integer, optional): Số sản phẩm mỗi trang (mặc định: 10)

**Response**: Giống như `/api/products` nhưng chỉ trả về sản phẩm thuộc thương hiệu được chỉ định

## Tìm kiếm sản phẩm

### GET /api/products-search

**Mô tả**: Tìm kiếm sản phẩm theo từ khóa

**Phương thức**: GET

**URL**: `/api/products-search`

**Phân quyền**: Không yêu cầu authentication

**Tham số query**:
- `q` (string, required): Từ khóa tìm kiếm
- `page` (integer, optional): Số trang (mặc định: 1)
- `per_page` (integer, optional): Số sản phẩm mỗi trang (mặc định: 10)

**Response**: Giống như `/api/products` nhưng chỉ trả về sản phẩm khớp với từ khóa

## Lấy sản phẩm đang giảm giá

### GET /api/products-on-sale

**Mô tả**: Lấy danh sách sản phẩm đang có giảm giá

**Phương thức**: GET

**URL**: `/api/products-on-sale`

**Phân quyền**: Không yêu cầu authentication

**Tham số query**:
- `page` (integer, optional): Số trang (mặc định: 1)
- `per_page` (integer, optional): Số sản phẩm mỗi trang (mặc định: 10)

**Response**: Giống như `/api/products` nhưng chỉ trả về sản phẩm có discount_price

## Lấy chiến dịch khuyến mãi của sản phẩm

### GET /api/products/{id}/sale-campaigns

**Mô tả**: Lấy danh sách chiến dịch khuyến mãi áp dụng cho sản phẩm

**Phương thức**: GET

**URL**: `/api/products/{id}/sale-campaigns`

**Phân quyền**: Không yêu cầu authentication

**Tham số URL**:
- `id` (integer, required): ID sản phẩm

**Response thành công (200)**:

```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "name": "Flash Sale Cuối Tuần",
      "description": "Giảm giá 50% cho tất cả sản phẩm",
      "discount_percentage": 50,
      "start_date": "2024-01-01T00:00:00.000000Z",
      "end_date": "2024-01-07T23:59:59.000000Z",
      "is_active": true,
      "created_at": "2024-01-01T00:00:00.000000Z",
      "updated_at": "2024-01-01T00:00:00.000000Z"
    }
  ],
  "message": "Lấy chiến dịch khuyến mãi thành công"
}
```

## Lấy chi tiết sản phẩm theo slug

### GET /api/products/slug/{slug}

**Mô tả**: Lấy thông tin chi tiết sản phẩm theo slug

**Phương thức**: GET

**URL**: `/api/products/slug/{slug}`

**Phân quyền**: Không yêu cầu authentication

**Tham số URL**:
- `slug` (string, required): Slug sản phẩm

**Response thành công (200)**:

```json
{
  "success": true,
  "data": {
    "id": 2,
    "name": "Balo Nike Heritage 2.0",
    "slug": "balo-nike-heritage-20",
    "description": "Balo thể thao năng động với logo Nike nổi bật. Thiết kế hiện đại, phù hợp cho học sinh cấp 3.",
    "price": 1200000,
    "discount_price": 999000,
    "image": "https://placehold.co/600x400?text=products/balo-nike-heritage-20.jpg",
    "gallery": [
      "https://placehold.co/600x400?text=Nike-1.jpg",
      "https://placehold.co/600x400?text=Nike-2.jpg"
    ],
    "stock": 30,
    "brand": {
      "id": 1,
      "name": "Nike",
      "slug": "nike"
    },
    "category": {
      "id": 1,
      "name": "Balo Học Sinh",
      "slug": "balo-hoc-sinh"
    },
    "created_at": "2025-07-12T17:24:37.000000Z",
    "updated_at": "2025-07-12T17:24:37.000000Z"
  }
}
```

**Response lỗi (404)**:

```json
{
  "success": false,
  "message": "Endpoint không tồn tại",
  "data": null
}
```

**Lưu ý**:

- Tất cả các endpoint products đều public, không cần authentication
- Các endpoint có phân trang sẽ trả về thông tin pagination đầy đủ
- Giá sản phẩm được hiển thị theo VND (Vietnam Dong)
- Stock = 0 có nghĩa là sản phẩm hết hàng
- Gallery có thể là array rỗng nếu sản phẩm không có ảnh phụ
- **Có thể lấy sản phẩm theo ID hoặc slug**:
  - `/api/products/{id}` - Lấy theo ID
  - `/api/products/slug/{slug}` - Lấy theo slug (SEO friendly)
- Route slug được đặt trước route ID để tránh xung đột routing

**Test với cURL**:

```bash
# Lấy danh sách sản phẩm
curl -X GET "http://localhost:8000/api/products" \
  -H "Accept: application/json" | jq .

# Lấy chi tiết sản phẩm theo ID
curl -X GET "http://localhost:8000/api/products/2" \
  -H "Accept: application/json" | jq .

# Lấy chi tiết sản phẩm theo slug
curl -X GET "http://localhost:8000/api/products/slug/balo-nike-heritage-20" \
  -H "Accept: application/json" | jq .

# Lấy sản phẩm nổi bật
curl -X GET "http://localhost:8000/api/products-featured" \
  -H "Accept: application/json" | jq .

# Tìm kiếm sản phẩm
curl -X GET "http://localhost:8000/api/products-search?q=nike" \
  -H "Accept: application/json" | jq .

# Lấy sản phẩm theo category
curl -X GET "http://localhost:8000/api/products/category/balo-hoc-sinh" \
  -H "Accept: application/json" | jq .

# Lấy sản phẩm theo brand
curl -X GET "http://localhost:8000/api/products/brand/nike" \
  -H "Accept: application/json" | jq .

# Test với slug không tồn tại (lỗi 404)
curl -X GET "http://localhost:8000/api/products/slug/invalid-product-slug" \
  -H "Accept: application/json" | jq .
```
