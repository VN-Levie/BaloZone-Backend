# Hướng dẫn cài đặt BaloZone-Backend

## Yêu cầu hệ thống

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL hoặc một cơ sở dữ liệu tương thích khác

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

   Cài đặt các gói JavaScript với NPM:

   ```bash
   npm install
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
   DB_DATABASE=balozone
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

7. **Chạy ứng dụng**

   Khởi động server phát triển Laravel:

   ```bash
   php artisan serve
   ```

   Ứng dụng sẽ chạy tại địa chỉ `http://127.0.0.1:8000`.

8. **Biên dịch tài nguyên Frontend**

   Biên dịch các tài nguyên CSS và JavaScript:

   ```bash
   npm run dev
   ```

   Để theo dõi các thay đổi và tự động biên dịch lại:

   ```bash
   npm run watch
   ```

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
