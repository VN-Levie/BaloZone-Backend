# 7. Quản lý người dùng (User Management)

## Lấy thông tin người dùng hiện tại

### GET /api/user

**Mô tả**: Lấy thông tin chi tiết người dùng hiện tại

**Phương thức**: GET

**URL**: `/api/user`

**Phân quyền**: Yêu cầu authentication (Bearer Token)

**Headers**:

```
Authorization: Bearer {token}
```

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
    "email_verified_at": "2024-01-01T00:00:00.000000Z",
    "created_at": "2024-01-01T00:00:00.000000Z",
    "updated_at": "2024-01-01T00:00:00.000000Z"
  },
  "message": "Lấy thông tin người dùng thành công"
}
```

## Cập nhật thông tin người dùng

### PUT /api/user

**Mô tả**: Cập nhật thông tin người dùng hiện tại

**Phương thức**: PUT

**URL**: `/api/user`

**Phân quyền**: Yêu cầu authentication (Bearer Token)

**Headers**:

```
Authorization: Bearer {token}
Content-Type: application/json
```

**Body**:

```json
{
  "name": "Nguyễn Văn A Updated",
  "phone": "0987654321",
  "date_of_birth": "1990-01-01",
  "gender": "male"
}
```

**Response thành công (200)**:

```json
{
  "success": true,
  "data": {
    "id": 1,
    "name": "Nguyễn Văn A Updated",
    "email": "user@example.com",
    "phone": "0987654321",
    "avatar": "https://example.com/avatar.jpg",
    "date_of_birth": "1990-01-01",
    "gender": "male",
    "email_verified_at": "2024-01-01T00:00:00.000000Z",
    "created_at": "2024-01-01T00:00:00.000000Z",
    "updated_at": "2024-01-01T12:00:00.000000Z"
  },
  "message": "Cập nhật thông tin thành công"
}
```

**Response lỗi (422)**:

```json
{
  "success": false,
  "message": "Dữ liệu không hợp lệ",
  "errors": {
    "name": ["Tên không được để trống"],
    "phone": ["Số điện thoại không hợp lệ"],
    "date_of_birth": ["Ngày sinh không hợp lệ"],
    "gender": ["Giới tính phải là male, female hoặc other"]
  }
}
```

**Validation rules**:

- `name` (string, required): Tên người dùng
- `phone` (string, optional): Số điện thoại
- `date_of_birth` (date, optional): Ngày sinh (format: YYYY-MM-DD)
- `gender` (string, optional): Giới tính (male, female, other)

## Thay đổi mật khẩu

### POST /api/user/change-password

**Mô tả**: Thay đổi mật khẩu người dùng

**Phương thức**: POST

**URL**: `/api/user/change-password`

**Phân quyền**: Yêu cầu authentication (Bearer Token)

**Headers**:

```
Authorization: Bearer {token}
Content-Type: application/json
```

**Body**:

```json
{
  "current_password": "old_password123",
  "new_password": "new_password123",
  "new_password_confirmation": "new_password123"
}
```

**Response thành công (200)**:

```json
{
  "success": true,
  "message": "Đổi mật khẩu thành công"
}
```

**Response lỗi (422)**:

```json
{
  "success": false,
  "message": "Dữ liệu không hợp lệ",
  "errors": {
    "current_password": ["Mật khẩu hiện tại không đúng"],
    "new_password": ["Mật khẩu mới phải có ít nhất 8 ký tự"],
    "new_password_confirmation": ["Xác nhận mật khẩu không khớp"]
  }
}
```

**Validation rules**:

- `current_password` (string, required): Mật khẩu hiện tại
- `new_password` (string, required): Mật khẩu mới (ít nhất 8 ký tự)
- `new_password_confirmation` (string, required): Xác nhận mật khẩu mới

## Upload avatar

### POST /api/user/upload-avatar

**Mô tả**: Upload avatar cho người dùng

**Phương thức**: POST

**URL**: `/api/user/upload-avatar`

**Phân quyền**: Yêu cầu authentication (Bearer Token)

**Headers**:

```
Authorization: Bearer {token}
Content-Type: multipart/form-data
```

**Body (Form Data)**:

- `avatar` (file, required): File ảnh avatar

**Response thành công (200)**:

```json
{
  "success": true,
  "data": {
    "avatar_url": "https://example.com/avatars/user-1-avatar.jpg"
  },
  "message": "Upload avatar thành công"
}
```

**Response lỗi (422)**:

```json
{
  "success": false,
  "message": "Dữ liệu không hợp lệ",
  "errors": {
    "avatar": ["Avatar phải là file ảnh", "Kích thước file không được vượt quá 2MB"]
  }
}
```

**Validation rules**:

- `avatar` (file, required): File ảnh (jpg, jpeg, png, gif, max 2MB)

**Lưu ý**:

- Tất cả các endpoint trong module này đều yêu cầu authentication
- Không thể thay đổi email thông qua API này
- Avatar sẽ được lưu trữ và trả về URL đầy đủ
- Khi upload avatar mới, avatar cũ sẽ bị ghi đè
- Giới tính có 3 giá trị: "male", "female", "other"
