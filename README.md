# FoodMartLab

Mô tả ngắn: FoodMartLab là một dự án mẫu cửa hàng thương mại điện tử viết bằng PHP theo kiến trúc MVC đơn giản, dùng để học tập và demo tính năng cơ bản (sản phẩm, giỏ hàng, checkout, admin CRUD, blog, voucher, wishlist).

## Nội dung file này
- Mô tả dự án
- Yêu cầu và cài đặt nhanh
- Cấu hình cần thiết
- Cách chạy và kiểm tra
- Tài khoản demo (Admin & User)

---

## Yêu cầu
- XAMPP (Apache + MySQL) hoặc môi trường LAMP/WAMP tương đương
- PHP 7.x / 8.x (đi kèm XAMPP)

## Cài đặt nhanh
1. Đặt thư mục dự án vào thư mục web của bạn (ví dụ `C:\xampp\htdocs\FoodMartLab`).
2. Mở phpMyAdmin và tạo database mới, rồi import file `foodmart_full.sql` (nằm ở gốc dự án).
3. Mở file [config/config.php](config/config.php) và cấu hình các hằng số sau cho phù hợp với môi trường của bạn:
    - `DB_HOST`, `DB_USER`, `DB_PASS`, `DB_NAME`
    - `BASE_URL` — ví dụ `http://localhost/FoodMartLab/`
4. Khởi động Apache và MySQL (XAMPP Control Panel).
5. Mở trình duyệt và truy cập trang chính:
    - Site: `http://localhost/FoodMartLab/`
    - Admin (giao diện quản trị): `http://localhost/FoodMartLab/admin/` (đường dẫn có thể khác tùy cấu trúc routing của dự án)

## Cấu hình thêm & trợ giúp
- Nếu CSS/JS không load đúng: kiểm tra `BASE_URL` trong [config/config.php](config/config.php).
- Nếu không vào được admin do mật khẩu không biết, chạy script reset:
   - Mở `scripts/reset_admin_password.php` trong trình duyệt (ví dụ `http://localhost/FoodMartLab/scripts/reset_admin_password.php`) hoặc chạy trên CLI PHP để đặt lại mật khẩu admin theo hướng dẫn trong file.

## Tài khoản demo (mẫu)
Lưu ý: dữ liệu demo phụ thuộc vào file SQL import. Nếu tài khoản dưới đây không tồn tại, dùng script reset hoặc tạo thủ công trong bảng `customers`/`admin`.

- Admin (mẫu):
   - Email: `admin@demo.com`
   - Mật khẩu: `123456` (nếu không có, dùng `scripts/reset_admin_password.php` để đặt lại)

- Người dùng (mẫu):
   - Email: `user@demo.com`
   - Mật khẩu: `123456`

Hướng dẫn reset nhanh (ví dụ):
1. Mở trình duyệt tới `http://localhost/FoodMartLab/scripts/reset_admin_password.php`.
2. Thực hiện theo hướng dẫn trong script để đặt mật khẩu mới cho tài khoản admin.

---

## Cấu trúc thư mục (tóm tắt)
- `assets/` — CSS, JS, hình ảnh
- `config/` — file cấu hình (ví dụ `config.php`)
- `core/` — các thành phần lõi (router, database, helpers)
- `controllers/` — controller cho site và admin
- `models/` — logic truy vấn DB
- `views/` — template giao diện site & admin
- `uploads/` — ảnh upload
- `scripts/` — script tiện ích (ví dụ reset password)

## Lưu ý bảo mật
- Không đưa thông tin kết nối DB và mật khẩu thật lên kho mã công khai.
- Nếu dùng trong môi trường production, cần thêm:
   - Mã hóa mật khẩu mạnh (bcrypt)
   - Kiểm tra và ngăn chặn SQL injection (prepared statements)
   - Cấu hình HTTPS

---

Nếu bạn muốn, tôi có thể:
- Thêm hướng dẫn chi tiết hơn về `scripts/reset_admin_password.php`.
- Đưa danh sách tài khoản demo thực tế nếu bạn gửi tệp SQL mẫu.

README đã được cập nhật.

 

