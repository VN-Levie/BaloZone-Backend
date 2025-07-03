# 14. Quản lý đơn hàng (Admin Orders)

## Lấy danh sách đơn hàng (Admin)

### GET /api/admin/orders

**Mô tả**: Lấy danh sách tất cả đơn hàng trong hệ thống

**Phương thức**: GET

**URL**: `/api/admin/orders`

**Phân quyền**: Yêu cầu authentication (Bearer Token) + Role Admin

**Headers**:

```
Authorization: Bearer {token}
```

**Tham số query**:

- `status` (string, optional): Lọc theo trạng thái đơn hàng
- `user_id` (integer, optional): Lọc theo người dùng
- `payment_method` (string, optional): Lọc theo phương thức thanh toán
- `from_date` (date, optional): Lọc từ ngày (format: YYYY-MM-DD)
- `to_date` (date, optional): Lọc đến ngày (format: YYYY-MM-DD)
- `page` (integer, optional): Số trang (mặc định: 1)
- `per_page` (integer, optional): Số đơn hàng mỗi trang (mặc định: 10)

**Response thành công (200)**:

```json
{
  "success": true,
  "data": {
    "current_page": 1,
    "data": [
      {
        "id": 1,
        "user_id": 1,
        "order_number": "ORD-2024-001",
        "status": "pending",
        "total_amount": 1200000,
        "shipping_fee": 50000,
        "voucher_discount": 120000,
        "final_amount": 1130000,
        "payment_method": "cod",
        "payment_status": "pending",
        "user": {
          "id": 1,
          "name": "Nguyễn Văn A",
          "email": "user@example.com",
          "phone": "0123456789"
        },
        "shipping_address": {
          "recipient_name": "Nguyễn Văn A",
          "recipient_phone": "0123456789",
          "address": "123 Đường ABC, Phường XYZ",
          "ward": "Phường 1",
          "district": "Quận 1",
          "province": "TP. Hồ Chí Minh"
        },
        "items_count": 2,
        "created_at": "2024-01-01T00:00:00.000000Z",
        "updated_at": "2024-01-01T00:00:00.000000Z"
      }
    ],
    "first_page_url": "http://example.com/api/admin/orders?page=1",
    "from": 1,
    "last_page": 10,
    "last_page_url": "http://example.com/api/admin/orders?page=10",
    "next_page_url": "http://example.com/api/admin/orders?page=2",
    "path": "http://example.com/api/admin/orders",
    "per_page": 10,
    "prev_page_url": null,
    "to": 10,
    "total": 95
  },
  "message": "Lấy danh sách đơn hàng thành công"
}
```

## Cập nhật trạng thái đơn hàng

### PUT /api/admin/orders/{id}/status

**Mô tả**: Cập nhật trạng thái đơn hàng

**Phương thức**: PUT

**URL**: `/api/admin/orders/{id}/status`

**Phân quyền**: Yêu cầu authentication (Bearer Token) + Role Admin

**Headers**:

```
Authorization: Bearer {token}
Content-Type: application/json
```

**Tham số URL**:

- `id` (integer, required): ID đơn hàng

**Body**:

```json
{
  "status": "processing",
  "note": "Đơn hàng đang được xử lý"
}
```

**Response thành công (200)**:

```json
{
  "success": true,
  "data": {
    "id": 1,
    "status": "processing",
    "updated_at": "2024-01-01T12:00:00.000000Z",
    "history": {
      "status": "processing",
      "note": "Đơn hàng đang được xử lý",
      "updated_by": {
        "id": 1,
        "name": "Admin",
        "email": "admin@example.com"
      },
      "created_at": "2024-01-01T12:00:00.000000Z"
    }
  },
  "message": "Cập nhật trạng thái đơn hàng thành công"
}
```

**Response lỗi (422)**:

```json
{
  "success": false,
  "message": "Dữ liệu không hợp lệ",
  "errors": {
    "status": ["Trạng thái không hợp lệ"],
    "note": ["Ghi chú là bắt buộc"]
  }
}
```

**Validation rules**:

- `status` (string, required): Trạng thái mới (pending, processing, shipped, delivered, cancelled)
- `note` (string, required): Ghi chú về việc cập nhật

## Thống kê đơn hàng (Admin)

### GET /api/admin/orders/statistics

**Mô tả**: Lấy thống kê đơn hàng cho admin

**Phương thức**: GET

**URL**: `/api/admin/orders/statistics`

**Phân quyền**: Yêu cầu authentication (Bearer Token) + Role Admin

**Headers**:

```
Authorization: Bearer {token}
```

**Tham số query**:

- `period` (string, optional): Khoảng thời gian (today, week, month, year)
- `from_date` (date, optional): Từ ngày (format: YYYY-MM-DD)
- `to_date` (date, optional): Đến ngày (format: YYYY-MM-DD)

**Response thành công (200)**:

```json
{
  "success": true,
  "data": {
    "total_orders": 95,
    "pending_orders": 15,
    "processing_orders": 25,
    "shipped_orders": 20,
    "delivered_orders": 30,
    "cancelled_orders": 5,
    "total_revenue": 125000000,
    "average_order_value": 1315789,
    "top_customers": [
      {
        "user_id": 1,
        "user_name": "Nguyễn Văn A",
        "orders_count": 8,
        "total_spent": 12500000
      }
    ],
    "top_products": [
      {
        "product_id": 1,
        "product_name": "Balo Nike Air Max",
        "orders_count": 25,
        "total_quantity": 45
      }
    ],
    "daily_stats": [
      {
        "date": "2024-01-01",
        "orders_count": 5,
        "revenue": 6500000
      }
    ]
  },
  "message": "Lấy thống kê đơn hàng thành công"
}
```

**Lưu ý**:

- Tất cả các endpoint đều yêu cầu authentication + role admin
- Admin có thể xem tất cả đơn hàng trong hệ thống
- Có thể lọc đơn hàng theo nhiều tiêu chí khác nhau
- Khi cập nhật trạng thái, hệ thống sẽ lưu lịch sử thay đổi
- Thống kê có thể được lọc theo khoảng thời gian
- Hệ thống sẽ tự động gửi email thông báo cho khách hàng khi trạng thái thay đổi
