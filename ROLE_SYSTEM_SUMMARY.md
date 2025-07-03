# Role System - Tổng kết Implementation

## 📋 Tổng quan hệ thống Role

Hệ thống đã được implement với 3 roles cơ bản:
- **Admin**: Quản trị viên hệ thống - có quyền truy cập toàn bộ
- **User**: Người dùng thông thường - có thể mua hàng và sử dụng tính năng cơ bản
- **Contributor**: Cộng tác viên - có thể quản lý sản phẩm và nội dung

## 🗄️ Cấu trúc Database

### Bảng `roles`
```sql
- id (bigint, primary key)
- name (varchar, unique) - tên role: admin, user, contributor
- display_name (varchar) - tên hiển thị
- description (text) - mô tả role
- timestamps
```

### Bảng `user_roles`
```sql
- id (bigint, primary key)
- user_id (bigint, foreign key)
- role_id (bigint, foreign key)
- timestamps
- unique(user_id, role_id)
```

## 🔧 Models & Relationships

### User Model
```php
// Relationships
public function roles() - belongsToMany
public function userRoles() - hasMany

// Helper methods
public function hasRole($roleName) - kiểm tra role
public function isAdmin() - kiểm tra admin
public function isContributor() - kiểm tra contributor
public function assignRole($roleName) - gán role
public function removeRole($roleName) - xóa role
```

### Role Model
```php
// Constants
const ADMIN = 'admin';
const USER = 'user';
const CONTRIBUTOR = 'contributor';

// Relationships
public function users() - belongsToMany
public function userRoles() - hasMany
```

## 🛡️ Middleware & Security

### CheckRole Middleware
```php
// Sử dụng: middleware('role:admin,contributor')
// Kiểm tra user đã đăng nhập và có role phù hợp
```

### Route Protection
```php
// Admin only
Route::middleware(['auth:api', 'role:admin'])

// Admin hoặc Contributor
Route::middleware(['auth:api', 'role:admin,contributor'])
```

## 🔌 API Endpoints

### Role Management (Admin only)
```
GET    /api/roles                    - Lấy danh sách roles
POST   /api/roles                    - Tạo role mới
GET    /api/roles/{id}               - Xem chi tiết role
PUT    /api/roles/{id}               - Cập nhật role
DELETE /api/roles/{id}               - Xóa role
POST   /api/roles/assign             - Gán role cho user
POST   /api/roles/remove             - Xóa role khỏi user
```

### User Management (Admin only)
```
GET    /api/admin/users              - Lấy danh sách users
PUT    /api/admin/users/{id}         - Cập nhật user
DELETE /api/admin/users/{id}         - Xóa user
POST   /api/admin/users/{id}/toggle-status - Khóa/mở khóa user
```

### Content Management (Admin + Contributor)
```
POST   /api/products                 - Tạo sản phẩm
PUT    /api/products/{id}            - Cập nhật sản phẩm
DELETE /api/products/{id}            - Xóa sản phẩm
POST   /api/news                     - Tạo tin tức
PUT    /api/news/{id}                - Cập nhật tin tức
DELETE /api/news/{id}                - Xóa tin tức
...và các endpoint khác
```

## 👥 Default Users

### Admin Account
```
Email: admin@balozone.com
Password: admin123
Role: admin
```

### Contributor Account
```
Email: contributor@balozone.com
Password: contributor123
Role: contributor
```

### Test User Account
```
Email: test@example.com
Password: password
Role: user
```

## 🧪 Testing

Sử dụng file `test_role_system.http` để test các tính năng:

1. **Đăng nhập với các role khác nhau**
2. **Test quyền truy cập APIs**
3. **Kiểm tra middleware hoạt động**
4. **Test quản lý roles**

## 📝 Lưu ý quan trọng

### Bảo mật
- Middleware tự động kiểm tra authentication trước khi kiểm tra role
- Không cho phép xóa admin user
- Không cho phép thay đổi status của admin
- Không cho phép xóa role đang được sử dụng

### Response Format
```json
{
    "success": true,
    "message": "Success message",
    "data": {...}
}
```

### Authentication
- Sử dụng JWT token với header: `Authorization: Bearer {token}`
- Token được trả về khi đăng nhập thành công
- User info bao gồm cả roles trong response

## 🚀 Cách sử dụng

### 1. Gán role cho user mới
```php
$user = User::create([...]);
$user->assignRole(Role::USER); // Gán role mặc định
```

### 2. Kiểm tra quyền trong Controller
```php
if (auth()->user()->hasRole('admin')) {
    // Logic cho admin
}

if (auth()->user()->isAdmin()) {
    // Logic cho admin
}
```

### 3. Sử dụng middleware trong routes
```php
Route::middleware(['auth:api', 'role:admin'])->group(function () {
    // Routes chỉ admin mới truy cập được
});
```

### 4. Frontend Integration
```javascript
// Lấy thông tin user và roles
const user = response.data.user;
const roles = user.roles;

// Kiểm tra role
const isAdmin = roles.some(role => role.name === 'admin');
```

## ✅ Hoàn thành

Hệ thống role đã hoạt động hoàn toàn và sẵn sàng sử dụng. Tất cả APIs đã được bảo vệ bằng middleware phù hợp và có thể mở rộng dễ dàng khi cần thêm roles mới.
