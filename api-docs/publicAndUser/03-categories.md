# Categories (Danh mục)

Các endpoint để quản lý thông tin danh mục sản phẩm.

## Base URL

```
/api/categories/
```

## Endpoints

### 1. Lấy danh sách danh mục

- **Endpoint:** `GET /api/categories`
- **Mô tả:** Lấy danh sách tất cả danh mục sản phẩm
- **Phân quyền:** Public
- **Tham số:** Không có

- **Response thành công (200):**

```json
{
    "success": true,
    "data": [
        {
            "id": 2,
            "name": "Balo Du Lịch",
            "slug": "balo-du-lich",
            "description": "Balo dành cho các chuyến du lịch, trekking với dung tích lớn và nhiều ngăn tiện ích",
            "image": "https://placehold.co/600x400?text=categories/balo-du-lich.jpg",
            "created_at": "2025-07-12T17:24:34.000000Z",
            "updated_at": "2025-07-12T17:24:34.000000Z"
        },
        {
            "id": 1,
            "name": "Balo Học Sinh",
            "slug": "balo-hoc-sinh",
            "description": "Các loại balo dành cho học sinh, sinh viên với thiết kế trẻ trung và tiện dụng",
            "image": "https://placehold.co/600x400?text=categories/balo-hoc-sinh.jpg",
            "created_at": "2025-07-12T17:24:34.000000Z",
            "updated_at": "2025-07-12T17:24:34.000000Z"
        },
        {
            "id": 6,
            "name": "Balo Mini",
            "slug": "balo-mini",
            "description": "Balo nhỏ gọn dành cho việc đi chơi, dạo phố",
            "image": "http://localhost:8000/storage/categories/balo-mini.jpg",
            "created_at": "2025-07-12T17:24:34.000000Z",
            "updated_at": "2025-07-12T17:24:34.000000Z"
        }
    ],
    "message": "Lấy danh sách danh mục thành công"
}
```

### 2. Lấy chi tiết danh mục

- **Endpoint:** `GET /api/categories/{id}`
- **Mô tả:** Lấy thông tin chi tiết của một danh mục theo ID
- **Phân quyền:** Public
- **Tham số:**
  - `id` (integer, required): ID của danh mục

- **Response thành công (200):**

```json
{
    "data": {
        "id": 1,
        "name": "Balo Học Sinh",
        "slug": "balo-hoc-sinh",
        "description": "Các loại balo dành cho học sinh, sinh viên với thiết kế trẻ trung và tiện dụng",
        "image": "https://placehold.co/600x400?text=categories/balo-hoc-sinh.jpg",
        "created_at": "2025-07-12T17:24:34.000000Z",
        "updated_at": "2025-07-12T17:24:34.000000Z",
        "products_count": 39
    }
}
```

### 3. Lấy danh mục kèm sản phẩm

- **Endpoint:** `GET /api/categories/with-products`
- **Mô tả:** Lấy danh sách các danh mục kèm theo một số sản phẩm trong mỗi danh mục
- **Phân quyền:** Public
- **Tham số:** Không có

- **Response thành công (200):**

```json
{
    "data": [
        {
            "id": 2,
            "name": "Balo Du Lịch",
            "slug": "balo-du-lich",
            "description": "Balo dành cho các chuyến du lịch, trekking với dung tích lớn và nhiều ngăn tiện ích",
            "image": "https://placehold.co/600x400?text=categories/balo-du-lich.jpg",
            "created_at": "2025-07-12T17:24:34.000000Z",
            "updated_at": "2025-07-12T17:24:34.000000Z",
            "products": [
                {
                    "id": 150,
                    "name": "Balo Gaming RGB dicta",
                    "slug": "balo-gaming-rgb-dicta-1167",
                    "price": "1183754.00",
                    "discount_price": "947003.20",
                    "image": "https://placehold.co/600x400?text=products/balo-gaming-rgb-dicta.jpg",
                    "stock": 25,
                    "brand": {
                        "id": 9,
                        "name": "Nikolaus Ltd",
                        "description": "Omnis animi provident eos nam vel. Dolores sit placeat consequatur nihil quam in maxime rerum. Est et voluptatibus et sit omnis. Ducimus quam officiis error dolores.",
                        "slug": "nikolaus-ltd",
                        "logo": "https://placehold.co/200x100?text=brands/nikolaus-ltd.jpg",
                        "status": "inactive",
                        "created_at": "2025-07-12T17:24:34.000000Z",
                        "updated_at": "2025-07-12T17:24:34.000000Z",
                        "deleted_at": null
                    }
                }
            ]
        }
    ]
}
```

### 4. Lấy danh mục theo slug

- **Endpoint:** `GET /api/categories/slug/{slug}`
- **Mô tả:** Lấy thông tin danh mục và danh sách sản phẩm theo slug (có phân trang)
- **Phân quyền:** Public
- **Tham số:**
  - `slug` (string, required): Slug của danh mục
  - `page` (integer, optional): Số trang (mặc định: 1)
  - `per_page` (integer, optional): Số sản phẩm mỗi trang (mặc định: 12)

- **Response thành công (200):**

```json
{
    "category": {
        "id": 1,
        "name": "Balo Học Sinh",
        "slug": "balo-hoc-sinh",
        "description": "Các loại balo dành cho học sinh, sinh viên với thiết kế trẻ trung và tiện dụng",
        "image": "https://placehold.co/600x400?text=categories/balo-hoc-sinh.jpg",
        "created_at": "2025-07-12T17:24:34.000000Z",
        "updated_at": "2025-07-12T17:24:34.000000Z"
    },
    "products": {
        "current_page": 1,
        "data": [
            {
                "id": 58,
                "category_id": 1,
                "brand_id": 6,
                "name": "Balo Du Lịch Samsonite eos",
                "description": "Sint est amet laborum. Dolores nihil dolor nesciunt quas itaque amet. Possimus suscipit voluptates et ipsum et fuga et. Odit non fuga eum voluptas ut amet provident. Nulla repellendus provident dolores maxime dolore impedit quaerat.",
                "price": "1640641.00",
                "discount_price": null,
                "stock": 49,
                "image": "https://placehold.co/600x400?text=products/balo-du-lich-samsonite-eos.jpg",
                "gallery": [
                    "https://placehold.co/600x400?text=balo-du-lich-samsonite-eos-1.jpg",
                    "https://placehold.co/600x400?text=balo-du-lich-samsonite-eos-2.jpg"
                ],
                "slug": "balo-du-lich-samsonite-eos-8388",
                "color": "Nâu",
                "created_at": "2025-07-12T17:24:37.000000Z",
                "updated_at": "2025-07-12T17:47:55.000000Z",
                "deleted_at": null,
                "brand": {
                    "id": 6,
                    "name": "Herschel",
                    "description": "Herschel Supply Co. nổi tiếng với thiết kế vintage và hiện đại, phù hợp cho mọi lứa tuổi.",
                    "slug": "herschel",
                    "logo": "https://placehold.co/600x400?text=brands/herschel-logo.png",
                    "status": "active",
                    "created_at": "2025-07-12T17:24:34.000000Z",
                    "updated_at": "2025-07-12T17:24:34.000000Z",
                    "deleted_at": null
                }
            }
        ],
        "first_page_url": "http://localhost:8000/api/categories/slug/balo-hoc-sinh?page=1",
        "from": 1,
        "last_page": 4,
        "last_page_url": "http://localhost:8000/api/categories/slug/balo-hoc-sinh?page=4",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://localhost:8000/api/categories/slug/balo-hoc-sinh?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": "http://localhost:8000/api/categories/slug/balo-hoc-sinh?page=2",
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": "http://localhost:8000/api/categories/slug/balo-hoc-sinh?page=2",
        "path": "http://localhost:8000/api/categories/slug/balo-hoc-sinh",
        "per_page": 12,
        "prev_page_url": null,
        "to": 12,
        "total": 39
    }
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
    "message": "Lỗi hệ thống khi lấy danh sách danh mục"
}
```

## cURL Examples

### Lấy tất cả danh mục

```bash
curl -X GET "http://localhost:8000/api/categories" \
  -H "Accept: application/json"
```

### Lấy chi tiết danh mục

```bash
curl -X GET "http://localhost:8000/api/categories/1" \
  -H "Accept: application/json"
```

### Lấy danh mục kèm sản phẩm

```bash
curl -X GET "http://localhost:8000/api/categories/with-products" \
  -H "Accept: application/json"
```

### Lấy danh mục theo slug

```bash
curl -X GET "http://localhost:8000/api/categories/slug/balo-hoc-sinh" \
  -H "Accept: application/json"
```

### Lấy danh mục theo slug với phân trang

```bash
curl -X GET "http://localhost:8000/api/categories/slug/balo-hoc-sinh?page=2" \
  -H "Accept: application/json"
```

## Notes

- Tất cả endpoints categories đều public, không cần authentication
- Endpoint `/api/categories` trả về danh sách cơ bản của tất cả categories
- Endpoint `/api/categories/with-products` trả về categories kèm một số sản phẩm mẫu của mỗi category
- Endpoint `/api/categories/slug/{slug}` hỗ trợ phân trang với `per_page=12` sản phẩm mỗi trang
- Response `/api/categories/{id}` bao gồm `products_count` - tổng số sản phẩm trong category
- Slug được sử dụng để tạo URL thân thiện SEO
- Images sử dụng placeholder trong môi trường development

---

**Related Files:**
- Controller: `app/Http/Controllers/CategoryController.php`
- Model: `app/Models/Category.php`
- Routes: `routes/api.php` (lines 46-50)

# Test slug không tồn tại (lỗi 404)
curl -X GET "http://localhost:8000/api/categories/slug/khong-ton-tai" \
  -H "Accept: application/json" | jq .
```
