# 15. Quản lý người dùng (Admin Users)

## Lấy danh sách người dùng (Admin)

### GET /api/admin/users

**Mô tả**: Lấy danh sách tất cả người dùng trong hệ thống

**Phương thức**: GET

**URL**: `/api/admin/users`

**Phân quyền**: Yêu cầu authentication (Bearer Token) + Role Admin

**Headers**:

```
Authorization: Bearer {token}
```

**Tham số query**:

- `role` (string, optional): Lọc theo vai trò
- `status` (string, optional): Lọc theo trạng thái (active, inactive, banned)
- `search` (string, optional): Tìm kiếm theo tên hoặc email
- `page` (integer, optional): Số trang (mặc định: 1)
- `per_page` (integer, optional): Số người dùng mỗi trang (mặc định: 10)

**Response thành công (200)**:

```json
{
  "success": true,
  "data": {
    "current_page": 1,
    "data": [
      {
        "id": 1,
        "name": "Nguyễn Văn A",
        "email": "user@example.com",
        "phone": "0123456789",
        "avatar": "https://example.com/avatar.jpg",
        "date_of_birth": "1990-01-01",
        "gender": "male",
        "status": "active",
        "email_verified_at": "2024-01-01T00:00:00.000000Z",
        "roles": [
          {
            "id": 3,
            "name": "customer",
            "display_name": "Khách hàng"
          }
        ],
        "orders_count": 5,
        "total_spent": 6500000,
        "last_login_at": "2024-01-01T10:00:00.000000Z",
        "created_at": "2024-01-01T00:00:00.000000Z",
        "updated_at": "2024-01-01T00:00:00.000000Z"
      }
    ],
    "first_page_url": "http://example.com/api/admin/users?page=1",
    "from": 1,
    "last_page": 15,
    "last_page_url": "http://example.com/api/admin/users?page=15",
    "next_page_url": "http://example.com/api/admin/users?page=2",
    "path": "http://example.com/api/admin/users",
    "per_page": 10,
    "prev_page_url": null,
    "to": 10,
    "total": 145
  },
  "message": "Lấy danh sách người dùng thành công"
}
```

## Lấy chi tiết người dùng (Admin)

### GET /api/admin/users/{id}

**Mô tả**: Lấy chi tiết một người dùng

**Phương thức**: GET

**URL**: `/api/admin/users/{id}`

**Phân quyền**: Yêu cầu authentication (Bearer Token) + Role Admin

**Headers**:

```
Authorization: Bearer {token}
```

**Tham số URL**:

- `id` (integer, required): ID người dùng

**Response thành công (200)**:

```json
{
  "success": true,
  "data": {
    "id": 1,
    "name": "Nguyễn Văn A",
    "email": "user@example.com",
    "phone": "0123456789",
    "avatar": "https://example.com/avatar.jpg",
    "date_of_birth": "1990-01-01",
    "gender": "male",
    "status": "active",
    "email_verified_at": "2024-01-01T00:00:00.000000Z",
    "roles": [
      {
        "id": 3,
        "name": "customer",
        "display_name": "Khách hàng",
        "assigned_at": "2024-01-01T00:00:00.000000Z"
      }
    ],
    "addresses": [
      {
        "id": 1,
        "name": "Địa chỉ nhà riêng",
        "address": "123 Đường ABC, Phường XYZ",
        "ward": "Phường 1",
        "district": "Quận 1",
        "province": "TP. Hồ Chí Minh",
        "is_default": true
      }
    ],
    "order_summary": {
      "total_orders": 5,
      "total_spent": 6500000,
      "average_order_value": 1300000,
      "last_order_at": "2024-01-01T10:00:00.000000Z"
    },
    "activity_log": [
      {
        "action": "login",
        "ip_address": "192.168.1.1",
        "user_agent": "Mozilla/5.0...",
        "created_at": "2024-01-01T10:00:00.000000Z"
      }
    ],
    "created_at": "2024-01-01T00:00:00.000000Z",
    "updated_at": "2024-01-01T00:00:00.000000Z"
  },
  "message": "Lấy chi tiết người dùng thành công"
}
```

## Cập nhật trạng thái người dùng

### PUT /api/admin/users/{id}/status

**Mô tả**: Cập nhật trạng thái người dùng (active, inactive, banned)

**Phương thức**: PUT

**URL**: `/api/admin/users/{id}/status`

**Phân quyền**: Yêu cầu authentication (Bearer Token) + Role Admin

**Headers**:

```
Authorization: Bearer {token}
Content-Type: application/json
```

**Tham số URL**:

- `id` (integer, required): ID người dùng

**Body**:

```json
{
  "status": "banned",
  "reason": "Vi phạm chính sách sử dụng"
}
```

**Response thành công (200)**:

```json
{
  "success": true,
  "data": {
    "id": 1,
    "status": "banned",
    "updated_at": "2024-01-01T12:00:00.000000Z"
  },
  "message": "Cập nhật trạng thái người dùng thành công"
}
```

**Response lỗi (422)**:

```json
{
  "success": false,
  "message": "Dữ liệu không hợp lệ",
  "errors": {
    "status": ["Trạng thái không hợp lệ"],
    "reason": ["Lý do là bắt buộc khi cấm người dùng"]
  }
}
```

**Validation rules**:

- `status` (string, required): Trạng thái mới (active, inactive, banned)
- `reason` (string, required if status is banned): Lý do cấm người dùng

## Thống kê người dùng (Admin)

### GET /api/admin/users/statistics

**Mô tả**: Lấy thống kê người dùng cho admin

**Phương thức**: GET

**URL**: `/api/admin/users/statistics`

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
    "total_users": 145,
    "active_users": 120,
    "inactive_users": 20,
    "banned_users": 5,
    "new_users_today": 3,
    "new_users_this_week": 15,
    "new_users_this_month": 45,
    "users_by_role": {
      "admin": 2,
      "staff": 5,
      "customer": 138
    },
    "users_by_gender": {
      "male": 75,
      "female": 60,
      "other": 10
    },
    "top_spenders": [
      {
        "user_id": 1,
        "user_name": "Nguyễn Văn A",
        "total_spent": 12500000,
        "orders_count": 8
      }
    ],
    "registration_trend": [
      {
        "date": "2024-01-01",
        "new_users": 5
      }
    ]
  },
  "message": "Lấy thống kê người dùng thành công"
}
```

**Lưu ý**:

- Tất cả các endpoint đều yêu cầu authentication + role admin
- Admin có thể xem tất cả thông tin chi tiết của người dùng
- Có thể lọc và tìm kiếm người dùng theo nhiều tiêu chí
- Khi cập nhật trạng thái, hệ thống sẽ lưu lịch sử thay đổi
- Trạng thái "banned" sẽ ngăn người dùng đăng nhập
- Thống kê cung cấp cái nhìn tổng quan về người dùng trong hệ thống
