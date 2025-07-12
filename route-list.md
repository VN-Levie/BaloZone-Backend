# Danh sách các routes

| Method | URI | Action | Chú thích |
|---|---|---|---|
| GET | / | | Trang chủ |
| GET | api/address-books | address-books.index › … | Lấy danh sách địa chỉ |
| POST | api/address-books | address-books.store › … | Tạo địa chỉ mới |
| GET | api/address-books/{address_book} | address… | Lấy thông tin một địa chỉ |
| PUT/PATCH | api/address-books/{address_book} | address… | Cập nhật một địa chỉ |
| DELETE | api/address-books/{address_book} | address… | Xóa một địa chỉ |
| POST | api/auth/login | AuthController@login | Đăng nhập |
| POST | api/auth/logout | AuthController@logout | Đăng xuất |
| GET | api/auth/me | AuthController@me | Lấy thông tin người dùng hiện tại |
| POST | api/auth/refresh | AuthController@refresh | Làm mới token |
| POST | api/auth/register | AuthController@register | Đăng ký |
| GET | api/brands | brands.index › BrandControlle… | Lấy danh sách thương hiệu |
| POST | api/brands | brands.store › BrandControlle… | Tạo thương hiệu mới |
| GET | api/brands-active | BrandController@getAct… | Lấy danh sách thương hiệu đang hoạt động |
| GET | api/brands/{brand} | brands.show › BrandCo… | Lấy thông tin một thương hiệu |
| PUT/PATCH | api/brands/{brand} | brands.update › Brand… | Cập nhật một thương hiệu |
| DELETE | api/brands/{brand} | brands.destroy › Bran… | Xóa một thương hiệu |
| GET | api/categories | categories.index › Catego… | Lấy danh sách danh mục |
| POST | api/categories | categories.store › Catego… | Tạo danh mục mới |
| GET | api/categories-with-products | CategoryCon… | Lấy danh sách danh mục kèm sản phẩm |
| GET | api/categories/slug/{slug} | CategoryContr… | Lấy thông tin danh mục bằng slug |
| GET | api/categories/{category} | categories.sho… | Lấy thông tin một danh mục |
| PUT/PATCH | api/categories/{category} | categories.upd… | Cập nhật một danh mục |
| DELETE | api/categories/{category} | categories.des… | Xóa một danh mục |
| POST | api/change-password | UserController@chang… | Đổi mật khẩu |
| GET | api/comments | comments.index › CommentCon… | Lấy danh sách bình luận |
| POST | api/comments | comments.store › CommentCon… | Tạo bình luận mới |
| GET | api/comments/product/{productId} | Comment… | Lấy danh sách bình luận của một sản phẩm |
| GET | api/comments/{comment} | comments.show › C… | Lấy thông tin một bình luận |
| PUT/PATCH | api/comments/{comment} | comments.update … | Cập nhật một bình luận |
| DELETE | api/comments/{comment} | comments.destroy … | Xóa một bình luận |
| POST | api/contacts | ContactController@store | Gửi liên hệ |
| GET | api/contacts | ContactController@index | Lấy danh sách liên hệ |
| GET | api/contacts/{contact} | ContactController… | Lấy thông tin một liên hệ |
| DELETE | api/delete-account | UserController@delete… | Xóa tài khoản |
| GET | api/my-comments | CommentController@getUse… | Lấy danh sách bình luận của tôi |
| GET | api/news | NewsController@index | Lấy danh sách tin tức |
| GET | api/news-latest | NewsController@getLatest | Lấy tin tức mới nhất |
| GET | api/news/{news} | NewsController@show | Lấy thông tin một tin tức |
| GET | api/orders | orders.index › OrderControlle… | Lấy danh sách đơn hàng |
| POST | api/orders | orders.store › OrderControlle… | Tạo đơn hàng mới |
| GET | api/orders-stats | OrderController@getStats | Lấy thống kê đơn hàng |
| GET | api/orders/{order} | orders.show › OrderCo… | Lấy thông tin một đơn hàng |
| POST | api/orders/{order}/cancel | OrderControlle… | Hủy một đơn hàng |
| GET | api/products | products.index › ProductCon… | Lấy danh sách sản phẩm |
| POST | api/products | products.store › ProductCon… | Tạo sản phẩm mới |
| GET | api/products-featured | ProductController@… | Lấy danh sách sản phẩm nổi bật |
| GET | api/products-on-sale | ProductController@g… | Lấy danh sách sản phẩm đang giảm giá |
| GET | api/products-search | ProductController@se… | Tìm kiếm sản phẩm |
| GET | api/products/brand/{brandSlug} | ProductCo… | Lấy danh sách sản phẩm theo thương hiệu |
| GET | api/products/category/{categorySlug} | Pro… | Lấy danh sách sản phẩm theo danh mục |
| GET | api/products/{product} | products.show › P… | Lấy thông tin một sản phẩm |
| PUT/PATCH | api/products/{product} | products.update … | Cập nhật một sản phẩm |
| DELETE | api/products/{product} | products.destroy … | Xóa một sản phẩm |
| GET | api/products/{product}/sale-campaigns | Pr… | Lấy danh sách chiến dịch sale của sản phẩm |
| GET | api/profile | UserController@profile | Lấy thông tin cá nhân |
| PUT | api/profile | UserController@updateProfile | Cập nhật thông tin cá nhân |
| GET | api/sale-campaigns | sale-campaigns.index … | Lấy danh sách chiến dịch sale |
| POST | api/sale-campaigns | sale-campaigns.store … | Tạo chiến dịch sale mới |
| GET | api/sale-campaigns-active | SaleCampaignCo… | Lấy danh sách chiến dịch sale đang hoạt động |
| GET | api/sale-campaigns-featured | SaleCampaign… | Lấy danh sách chiến dịch sale nổi bật |
| GET | api/sale-campaigns/{saleCampaign}/products | SaleCampaignController@getProdu… | Lấy danh sách sản phẩm trong chiến dịch sale |
| POST | api/sale-campaigns/{saleCampaign}/products | SaleCampaignController@addProdu… | Thêm sản phẩm vào chiến dịch sale |
| DELETE | api/sale-campaigns/{saleCampaign}/products/{product} | SaleCampaignController@… | Xóa sản phẩm khỏi chiến dịch sale |
| GET | api/sale-campaigns/{sale_campaign} | sale-… | Lấy thông tin một chiến dịch sale |
| PUT/PATCH | api/sale-campaigns/{sale_campaign} | sale-… | Cập nhật một chiến dịch sale |
| DELETE | api/sale-campaigns/{sale_campaign} | sale-… | Xóa một chiến dịch sale |
| GET | api/user | | Lấy thông tin người dùng |
| GET | api/user-stats | UserController@getStats | Lấy thống kê người dùng |
| GET | api/vouchers | vouchers.index › VoucherCon… | Lấy danh sách voucher |
| POST | api/vouchers | vouchers.store › VoucherCon… | Tạo voucher mới |
| GET | api/vouchers-active | VoucherController@ge… | Lấy danh sách voucher đang hoạt động |
| POST | api/vouchers/validate | VoucherController@… | Xác thực voucher |
| GET | api/vouchers/{voucher} | vouchers.show › V… | Lấy thông tin một voucher |
| PUT/PATCH | api/vouchers/{voucher} | vouchers.update … | Cập nhật một voucher |
| DELETE | api/vouchers/{voucher} | vouchers.destroy … | Xóa một voucher |
| GET | docs | scribe | Trang tài liệu API |
| GET | docs.openapi | scribe.openapi | File OpenAPI |
| GET | docs.postman | scribe.postman | File Postman |
| GET | storage/{path} | storage.local | Truy cập file trong storage |
| GET | up | | Kiểm tra trạng thái ứng dụng |
