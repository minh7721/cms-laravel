## CMS Laravel
Đề bài yêu cầu tạo một CMS với những tính năng CRUD cơ bản Thực hiện bởi: Hoàng Nhật Minh
Download code và run code tại đường dẫn https://github.com/minh7721/cms-laravel.git

Cách sử dụng kết quả:

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

Tài khoản: admin@admin.com

Password: minh
