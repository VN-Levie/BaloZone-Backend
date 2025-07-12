# Brands (Thương hiệu)

Các endpoint để quản lý thông tin thương hiệu sản phẩm.

## Base URL
```
/api/brands/
```

## Endpoints

### 1. Lấy danh sách thương hiệu

- **Endpoint:** `GET /api/brands`
- **Mô tả:** Lấy danh sách tất cả thương hiệu (bao gồm cả active và inactive)
- **Phân quyền:** Public
- **Tham số:** Không có

- **Response thành công (200):**

```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "Nike",
            "slug": "nike",
            "description": "Nike là thương hiệu thể thao hàng đầu thế giới, nổi tiếng với các sản phẩm balo và túi thể thao chất lượng cao.",
            "logo": "https://placehold.co/600x400?text=brands/nike-logo.png",
            "status": "active",
            "created_at": "2025-07-12T17:24:34.000000Z",
            "updated_at": "2025-07-12T17:24:34.000000Z"
        },
        {
            "id": 2,
            "name": "Adidas",
            "slug": "adidas",
            "description": "Adidas là thương hiệu thể thao nổi tiếng với thiết kế năng động và chất lượng vượt trội.",
            "logo": "https://placehold.co/600x400?text=brands/adidas-logo.png",
            "status": "active",
            "created_at": "2025-07-12T17:24:34.000000Z",
            "updated_at": "2025-07-12T17:24:34.000000Z"
        }
    ],
    "message": "Lấy danh sách thương hiệu thành công"
}
```

### 2. Lấy danh sách thương hiệu đang hoạt động

- **Endpoint:** `GET /api/brands/active`
- **Mô tả:** Lấy danh sách các thương hiệu có status = "active"
- **Phân quyền:** Public
- **Tham số:** Không có

- **Response thành công (200):**

```json
{
    "data": [
        {
            "id": 1,
            "name": "Nike",
            "slug": "nike",
            "logo": "https://placehold.co/600x400?text=brands/nike-logo.png"
        },
        {
            "id": 2,
            "name": "Adidas",
            "slug": "adidas",
            "logo": "https://placehold.co/600x400?text=brands/adidas-logo.png"
        },
        {
            "id": 3,
            "name": "Samsonite",
            "slug": "samsonite",
            "logo": "https://placehold.co/600x400?text=brands/samsonite-logo.png"
        }
    ]
}
```

### 3. Lấy chi tiết thương hiệu

- **Endpoint:** `GET /api/brands/{id}`
- **Mô tả:** Lấy thông tin chi tiết của một thương hiệu theo ID
- **Phân quyền:** Public
- **Tham số:**
  - `id` (integer, required): ID của thương hiệu

- **Response thành công (200):**

```json
{
    "data": {
        "id": 1,
        "name": "Nike",
        "slug": "nike",
        "description": "Nike là thương hiệu thể thao hàng đầu thế giới, nổi tiếng với các sản phẩm balo và túi thể thao chất lượng cao.",
        "logo": "https://placehold.co/600x400?text=brands/nike-logo.png",
        "status": "active",
        "created_at": "2025-07-12T17:24:34.000000Z",
        "updated_at": "2025-07-12T17:24:34.000000Z"
    }
}
```

- **Response lỗi (404):**

```json
{
    "success": false,
    "message": "Endpoint không tồn tại",
    "data": null
}
```

## Error Responses

### 404 Not Found

```json
{
    "success": false,
    "message": "Endpoint không tồn tại",
    "data": null
}
```

### 500 Internal Server Error

```json
{
    "success": false,
    "message": "Lỗi hệ thống khi lấy danh sách thương hiệu"
}
```

## cURL Examples

### Lấy tất cả thương hiệu
```bash
curl -X GET "http://localhost:8000/api/brands" \
  -H "Accept: application/json"
```

### Lấy thương hiệu đang hoạt động
```bash
curl -X GET "http://localhost:8000/api/brands/active" \
  -H "Accept: application/json"
```

### Lấy chi tiết thương hiệu
```bash
curl -X GET "http://localhost:8000/api/brands/1" \
  -H "Accept: application/json"
```

## Notes

- Tất cả endpoints brands đều public, không cần authentication
- Endpoint `/api/brands` trả về tất cả brands (cả active và inactive)
- Endpoint `/api/brands/active` chỉ trả về brands có status = "active" và format response đơn giản hơn
- Slug được sử dụng để tạo URL thân thiện
- Logo sử dụng placeholder images trong môi trường development

---

**Related Files:**
- Controller: `app/Http/Controllers/BrandController.php`
- Model: `app/Models/Brand.php`
- Routes: `routes/api.php` (lines 40-44)
