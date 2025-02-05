<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
<br>
<h2>Hướng dẫn chạy web localhost:</h2>
<ul>
  <li>Yêu cầu: Xampp - Composer - Laravel 10.x</li>
  <li>Tạo CSDL: tạo DB tên: myforum (nếu thay đổi thì cấu hình lại trong file .env)</li>
  <li>Import file myforum.sql trong thư mục public/db vào db.</li>
  <li>Chạy các lệnh sau để chạy code:
    <ul>
      <li>Cài đặt dependencies: <code>composer install</code></li>
      <li>Chạy lệnh sau để khởi động máy chủ web local: <code>php artisan serve</code></li>
    </ul>
  </li>
</ul>

<h2>Mô tả chi tiết:</h2>
<p>Đây là version đầu tiên của dự án nên có nhiều chức năng chưa hoàn thiện.</p>
<h3>Các chức năng đã hoàn thiện:</h3>
<ul>
  <li>Đăng ký, đăng nhập</li>
  <li>Đăng bài (có danh mục, hashtag,...)</li>
  <li>Bình luận, Like/Dislike</li>
  <li>Quản lý thông tin cá nhân, chỉnh sửa, xem thông tin của user khác</li>
  <li>Tìm kiếm sử dụng Laravel Scout Algolia</li>
  <li>Lọc bài viết theo danh mục, hashtag, user, phân trang,...</li>
  <li>Xếp hạng user, bài đăng,...</li>
</ul>
<h3>Một số tài khoản demo:</h3>
<ul>
    <li>username: user1 - password: 123</li>
    <li>username: user2 - password: 123</li>
</ul>
 
