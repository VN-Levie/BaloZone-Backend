# Hướng dẫn cài đặt BaloZone-Backend

## Yêu cầu hệ thống

- PHP >= 8.2
- Composer
- MySQL

## Các bước cài đặt

1. **Clone a repository**

   ```bash
   git clone https://github.com/your-username/BaloZone-Backend.git
   cd BaloZone-Backend
   ```

2. **Cài đặt các gói phụ thuộc**

   Cài đặt các gói PHP với Composer:

   ```bash
   composer install
   ```

3. **Cấu hình môi trường**

   Sao chép file `.env.example` thành `.env`:

   ```bash
   cp .env.example .env
   ```

   Mở file `.env` và cấu hình các thông tin cần thiết, đặc biệt là thông tin kết nối cơ sở dữ liệu:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=balozone_backend
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Tạo khóa ứng dụng**

   ```bash
   php artisan key:generate
   ```

5. **Tạo khóa JWT**

   ```bash
   php artisan jwt:secret
   ```

6. **Chạy Migrations và Seeders**

   Chạy migrations để tạo các bảng trong cơ sở dữ liệu và seeders để thêm dữ liệu mẫu:

   ```bash
   php artisan migrate --seed
   ```

   Sau khi chạy seeders, bạn sẽ có các tài khoản mặc định sau:

   ### Tài khoản Admin

   - **Email:** `admin@balozone.com`
   - **Password:** admin123
   - **Tên:** Admin BaloZone
   - **Quyền:** Quản trị viên

   ### Tài khoản Test User

   - **Email:** `test@example.com`
   - **Password:** password
   - **Tên:** Test User
   - **Quyền:** Người dùng thường

   > **Lưu ý:** Hãy thay đổi mật khẩu của các tài khoản này trong môi trường production để đảm bảo bảo mật.

7. **Chạy ứng dụng**

   Khởi động server phát triển Laravel:

   ```bash
   php artisan serve
   ```

   Ứng dụng sẽ chạy tại địa chỉ `http://127.0.0.1:8000`.

## Kiểm tra các routes

Để xem danh sách tất cả các routes đã đăng ký trong ứng dụng:

```bash
php artisan route:list
```

## Cài đặt Scribe (Tùy chọn)

Nếu bạn muốn tạo lại tài liệu API bằng Scribe:

```bash
php artisan scribe:generate
```

Tài liệu sẽ có tại `/docs`.
