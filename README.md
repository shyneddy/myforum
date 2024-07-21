<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Hướng dẫn chạy web localhost:
- yêu cầu: Xampp - Composer - Laravel 10.x
- Tạo CSDL: tạo DB tên: myforum (nếu thay đổi thì cấu hình lại trong file .env)
- import file myforum.sql trong thư mục public vào db.
- Chạy các lệnh sau để chạy code:
  // Cài đặt dependencies: composer install
  // Chạy lệnh sau để khởi động máy chủ web local: php artisan serve

Mô tả chi tiết:
Đây là version đầu tiên của dự án nên có nhiều chức năng chưa hoàn thiện.
Các chức năng đã hoàn thiện:
- Đăng ký, đăng nhập
- Đăng bài (có danh mục, hashtag,... )
- Bình luận, Like/Dislike
- Quản lý thông tin cá nhân, chỉnh sửa, xem thông tin của user khác
- Tìm kiếm sử dụng Laravel Scout Algolia
- Lọc bài viết theo danh mục, hashtag, user, phân trang,...
-  Sếp hạng user, bài đăng,...
 
