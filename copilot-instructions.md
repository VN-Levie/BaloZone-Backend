````instructions
# Copilot Instructions - BaloZone Backend Project

## 📋 Thông tin dự án cơ bản

### Tech Stack
- **Backend**: Laravel 11 (PHP 8.2+)
- **Database**: MySQL/MariaDB
- **Authentication**: JWT (tymon/jwt-auth)
- **API Documentation**: Scribe
- **Testing**: PHPUnit, cURL
- **Environment**: Windows + PowerShell

### Cấu trúc dự án
```
BaloZone-Backend/
├── app/Http/Controllers/          # Controllers
├── app/Models/                    # Eloquent Models
├── routes/api.php                 # API Routes
├── config/                        # Configuration files
├── database/migrations/           # Database migrations
├── api-docs/                      # API Documentation (Markdown)
│   ├── admin/                     # Admin API docs
│   └── publicAndUser/             # Public/User API docs
└── storage/api-docs/              # Generated API docs
```

## 🔐 Authentication & Authorization

### JWT Token System
- **Login endpoint**: `POST /api/auth/login`
- **Token prefix**: `Bearer {token}`
- **Token location**: `Authorization` header

#### Example Login Request

```bash
curl -X POST "http://localhost:8000/api/auth/login" -H "Content-Type: application/json" -d '{"email":"admin@balozone.com","password":"admin123"}' | jq .  
```

#### Example Login Response

```json
{
  "success": true,
  "message": "Đăng nhập thành công",
  "user": {
    "id": 1,
    "name": "Admin BaloZone",
    "email": "admin@balozone.com",
    "email_verified_at": null,
    "phone": "0901234567",
    "status": "active",
    "created_at": "2025-07-12T17:24:35.000000Z",
    "updated_at": "2025-07-12T17:24:35.000000Z",
    "deleted_at": null,
    "roles": [
      {
        "id": 1,
        "name": "admin",
        "display_name": "Admin",
        "description": "Quản trị viên hệ thống - có quyền truy cập toàn bộ hệ thống",
        "created_at": "2025-07-12T17:24:34.000000Z",
        "updated_at": "2025-07-12T17:24:34.000000Z",
        "deleted_at": null,
        "pivot": {
          "user_id": 1,
          "role_id": 1
        }
      }
    ]
  },
  "authorization": {
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE3NTIzNDg4MTMsImV4cCI6MTc1MjM1MjQxMywibmJmIjoxNzUyMzQ4ODEzLCJqdGkiOiJFcTFvNmUwR25paVl5WktoIiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.hKpiP73ocx6RX3yX0xBBbAh9lLTR_7WZ9t8n8wjq8uY",
    "type": "bearer",
    "expires_in": 3600
  }
}
```

### User Roles & Permissions
```json
{
  "admin": {
    "email": "admin@balozone.com",
    "password": "admin123",
    "permissions": "Full access to all admin endpoints"
  },
  "contributor": {
    "permissions": "Limited admin access (content management)"
  },
  "user": {
    "permissions": "Public endpoints + authenticated user endpoints"
  }
}
```

### Admin Endpoints Pattern
- **Prefix**: `/api/dashboard/*`
- **Required**: `Authorization: Bearer {token}` + admin/contributor role
- **Examples**: 
  - `/api/dashboard/users`
  - `/api/dashboard/products`
  - `/api/dashboard/sale-campaigns`

## 🌐 API Endpoints Structure

### Public Endpoints
- **Pattern**: `/api/{resource}`
- **Authentication**: Not required
- **Examples**: `/api/products`, `/api/categories`, `/api/sale-campaigns`

### User Endpoints  
- **Pattern**: `/api/{resource}` (with auth)
- **Authentication**: Required (Bearer token)
- **Examples**: `/api/orders`, `/api/address-book`, `/api/comments`

### Admin Endpoints
- **Pattern**: `/api/dashboard/{resource}`
- **Authentication**: Required (Bearer token + admin role)
- **Examples**: `/api/dashboard/users`, `/api/dashboard/products`

### Route Patterns & Conflicts
- **Specific routes before dynamic**: Always place specific routes (like `/slug/{slug}`) before dynamic routes (like `/{id}`)
- **Slug routes**: Many resources support both ID and slug access:
  - Categories: `/api/categories/{id}` and `/api/categories/slug/{slug}`
  - Products: `/api/products/{id}` and `/api/products/slug/{slug}`
  - Sale Campaigns: `/api/sale-campaigns/{id}` and `/api/sale-campaigns/slug/{slug}`
- **Routing order matters**: Laravel matches routes top-to-bottom, so specific routes must come first

## 📝 API Response Formats

### Standard Success Response
```json
{
  "message": "Operation successful",
  "data": {
    // Response data here
  }
}
```

### Pagination Response
```json
{
  "data": [...],
  "links": {
    "first": "...",
    "last": "...",
    "prev": null,
    "next": "..."
  },
  "meta": {
    "current_page": 1,
    "from": 1,
    "last_page": 5,
    "per_page": 15,
    "to": 15,
    "total": 67
  }
}
```

### Error Response
```json
{
  "message": "Error message",
  "errors": {
    "field_name": ["Validation error message"]
  }
}
```

## 🧪 Testing Guidelines

### PowerShell cURL Commands
```powershell
# Login to get token
$response = curl -X POST "http://localhost:8000/api/auth/login" `
  -H "Content-Type: application/json" `
  -d '{"email":"admin@balozone.com","password":"admin123"}' | ConvertFrom-Json
$token = $response.authorization.token

# Use token in subsequent requests
curl -X GET "http://localhost:8000/api/dashboard/users" `
  -H "Authorization: Bearer $token" `
  -H "Accept: application/json"
```

### Testing Checklist
- [ ] Test authentication first (get valid token)
- [ ] Verify endpoint permissions (admin vs user vs public)
- [ ] Test with real data (not placeholder IDs)
- [ ] Check both success and error scenarios
- [ ] Validate response format matches documentation
- [ ] Test pagination if applicable
- [ ] Test filtering/searching parameters

### Common Testing Mistakes to Avoid
1. **Wrong credentials**: Use `admin123` not `password`
2. **Missing Bearer prefix**: Always use `Bearer {token}`
3. **Wrong endpoint prefix**: Admin endpoints use `/dashboard/`
4. **Placeholder IDs**: Use actual existing IDs from database
5. **Wrong content type**: Use `application/json` for JSON requests
6. **Case sensitivity**: API endpoints are case-sensitive

## 📊 Database Models & Relationships

### Key Models
```php
User: id, name, email, role, phone, address
Product: id, name, slug, price, category_id, brand_id
Category: id, name, slug, parent_id
Brand: id, name, slug, logo
Order: id, user_id, total_amount, status, payment_method
SaleCampaign: id, name, slug, start_date, end_date, status
PaymentMethod: id, name, type, is_active
AddressBook: id, user_id, full_name, phone, address
```

### Important Relationships
- `Product` belongs to `Category` and `Brand`
- `Order` has many `OrderDetails` (products)
- `User` has many `Orders` and `AddressBook`
- `SaleCampaign` has many `Products` (pivot table with sale_price)

## 🔧 Common API Patterns

### CRUD Operations
- **Create**: `POST /api/resource`
- **Read**: `GET /api/resource` (list), `GET /api/resource/{id}` (detail)
- **Update**: `PUT /api/resource/{id}`
- **Delete**: `DELETE /api/resource/{id}`

### Filtering & Search
- **Search**: `?search=keyword`
- **Filter**: `?category_id=1&brand_id=2`
- **Sort**: `?sort_by=name&sort_direction=asc`
- **Pagination**: `?page=2&per_page=20`

### File Uploads
- **Content-Type**: `multipart/form-data`
- **Fields**: Usually `image`, `images[]`, or `file`

## 🚨 Known Issues & Solutions

### Authentication Issues
```bash
# Problem: 401 Unauthorized
# Solution: Check token validity and role permissions

# Get fresh token
curl -X POST "http://localhost:8000/api/auth/login" \
  -H "Content-Type: application/json" \
  -d '{"email":"admin@balozone.com","password":"admin123"}'
```

### Validation Errors
```bash
# Problem: 422 Unprocessable Entity
# Solution: Check required fields and data types in controller/request validation
```

### Sale Campaign Product Management
```json
// Correct format for adding products to campaign
{
  "products": [
    {
      "product_id": 1,
      "sale_price": 674250,
      "discount_type": "percentage", 
      "max_quantity": 50
    }
  ]
}

// Wrong format (will cause validation error)
{
  "product_ids": [1, 2, 3]
}
```

## 📖 Documentation Standards

### API Documentation Format
```markdown
## Endpoint Name

### METHOD /api/endpoint

**Mô tả**: Brief description

**Phương thức**: HTTP_METHOD

**URL**: `/api/endpoint`

**Phân quyền**: Authentication requirements

**Headers**: Required headers

**Body**: Request body example

**Response thành công (200)**: Success response example

**Response lỗi (4xx)**: Error response example
```

### Response Examples
- Always use **real data** from actual API responses
- Include **complete JSON** structure
- Show **both success and error** scenarios
- Use **consistent formatting** and indentation

## 🛠️ Development Workflow

### Before Testing New Endpoints
1. Check if Laravel server is running (`php artisan serve`)
2. Get fresh authentication token
3. Verify database has test data
4. Read controller code to understand validation rules
5. Prepare test data that matches validation requirements

### During API Testing
1. Test authentication first
2. Test happy path (valid data)
3. Test validation errors (invalid data)
4. Test edge cases (empty data, large data)
5. Document real responses immediately

### After Testing
1. Update documentation with real responses
2. Add practical cURL examples
3. Note any discovered issues or limitations
4. Verify documentation accuracy

## 🎯 Project-Specific Notes

### Sale Campaigns
- Products are linked via pivot table with additional fields
- `sale_price` must be calculated and provided, not auto-calculated
- Campaigns can be deleted even when active and containing products
- `priority` determines display order (lower = higher priority)

### User Management
- Admin can manage all users
- Password changes require current password verification
- Soft delete is used for user removal

### Order Processing
- Orders go through multiple status changes
- Payment methods are configurable
- Order details store snapshot of product info at time of purchase

### File Storage
- Images stored in `storage/app/public`
- Accessible via `/storage/` URL prefix
- Support for multiple image uploads

---

**Cập nhật cuối**: July 13, 2025
**Phiên bản**: 1.0
**Tác giả**: Development Team

