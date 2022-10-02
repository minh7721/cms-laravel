# CMS Laravel
Đề bài yêu cầu tạo một CMS với những tính năng CRUD cơ bản Thực hiện bởi: Hoàng Nhật Minh


## Cài đặt

B1: 
Coppy .env.example sang .env vaf Config database ở file .env

B2:
`composer install`

B3:`npm install`

B4:
`npm install --save @ckeditor/ckeditor5-build-classic`

B5: Tạo key cho file .env

`php artisan key:generate`

B6: Thực hiện câu lệnh sau trên terminal để tạo CSDL:

`php artisan migrate`

B7: Chạy câu lệnh sau:

`php artisan db:seed`

B8: CHạy thử chương trình : 
`php artisan serve`

### Đăng nhập vào tk admin

Tài khoản: admin@gmail.com

Password: admin

## Các tính năng
**Admin**
- [ ] Giao diện admin
- [ ] Login, Logout
- [ ] Quản lý user và phân quyền
- [ ] CRUD Article/Category/Tag
- [ ] Filter Dứ liệu theo một số trường
- [ ] Kết nối và lưu trữ ảnh bằng MinIO thông qua s3 driver
- [ ] Hiện thị Logs
- [ ] Dashboard

**Frontend**
- [ ] Auth, Login facebook/google (* Login Frontend và Admin là khác nhau)
- [ ] Người dùng có thể cập nhập lại thông tin, mật khẩu
- [ ] Ốp giao diện blog đã làm từ trước (hoặc giao diện khác)
- [ ] Hiển thị số lượt view trên mỗi bài viết
- [ ] Command lấy các bài viết mới nhất của một trang báo/blog bất kỳ (setup chạy hàng ngày)
- [ ] Search (sử dụng elasticsearch)
- [ ] Tìm hiểu kiển thức cơ bản về SEO, thêm vào trang của mình
