@extends('layout.master')

@section('title')
User Details
@endsection

@section('header')
<section class="header-descriptin329">
    <div class="container">
        <h3>Thông tin người dùng</h3>
        <ol class="breadcrumb breadcrumb839">
            <li><a href="#">Home</a></li>
            <li class="active">Thông tin người dùng</li>
        </ol>
    </div>
</section>
@endsection

@section('content')
<div class="col-md-9">
    <div class="about-user2039 mt-70">
        <div class="user-title3930">
            <h3>About <a href="#">{{ $user->name }}</a>

                <span class="badge229">
                    <a href="#">Thành viên</a></span>
            </h3>
            <hr>
        </div>
        <!-- <div class="user-image293"> <img src="image/images.png" alt="Image"> </div> -->
        <div class="left-user3898">
            <a href="#"><img src="/image/images.png" alt="Image"></a>
            <div class="imag-overlay39"> <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a> </div>
        </div>
        <div class="user-list10039">
            <div class="ul-list-user-left29">
                <ul>
                    <li><i class="fa fa-plus" aria-hidden="true"></i> <strong>Registered:</strong> {{ $user->created_at->format('d-m-Y') }}</li>
                    <li><i class="fa fa-globe" aria-hidden="true"></i> <strong>Ngày sinh:</strong> {{ $user->birthday }}</li>
                    <li><i class="fa fa-heart" aria-hidden="true"></i> <strong>Age:</strong> {{ Carbon\Carbon::parse($user->birthday)->age }}</li>
                    <li><i class="fa fa-globe" aria-hidden="true"></i> <strong>Email:</strong><a href="#"> {{ $user->email }}</a></li>

                </ul>
            </div>
            <div class="ul-list-user-right29">
                <ul>
                    <li><i class="fa fa-phone" aria-hidden="true"></i> <strong>Phone:</strong> {{ $user->phonenumber }}</li>
                    <li><i class="fa fa-user" aria-hidden="true"></i> <strong>Sex: </strong> {{ $user->gender == 1 ? 'Nam' : 'Nữ' }}</li>
                    <li><i class="fa fa-user" aria-hidden="true"></i> <strong>Point: </strong> {{ $user->point }}</li>

                </ul>
            </div>
        </div>
        <div class="user-description303">
            <a style="cursor: pointer;" onclick="handleUpdateInfo()">Chỉnh sửa thông tin cá nhân</a>
        </div>

        <form id="update-user-info-form" style="margin: 20px 0; display: none" action="{{ route('user.edit.myinfo') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Họ Tên:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email:</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="phone" class="col-sm-3 col-form-label">Số điện thoại:</label>
                <div class="col-sm-9">
                    <input type="tel" class="form-control" id="phone" name="phonenumber" value="{{ $user->phonenumber }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="birthday" class="col-sm-3 col-form-label">Ngày sinh:</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $user->birthday }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="gender" class="col-sm-3 col-form-label">Giới tính:</label>
                <div class="col-sm-9">
                    <select class="form-control" id="gender" name="gender">
                        <option value="1" {{ $user->gender == 1 ? 'selected' : '' }}>Nam</option>
                        <option value="0" {{ $user->gender == 0 ? 'selected' : '' }}>Nữ</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">Mật khẩu:</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-sm-12 text-right">
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </div>
            </div>
        </form>
    </div>

    <div class="user-statas921" style="background-color: #f8f9fa; padding: 20px; border-radius: 5px;">
        <div class="row">
            <div class="col-md-6">
                <ul class="ul_list_ul_list-icon-ok281 list-inline" style="list-style-type: none; padding: 0; margin: 0;">
                    @foreach($hashtags as $hashtag)
                    <li style="display: inline-block; margin-right: 20px;">
                        <a href="{{ route('hashtag.filter', ['hashtag_id'=> $hashtag->id, 'user_id'=> $user->id]) }}" style="color: #495057; text-decoration: none; font-size: 14px;">{{ $hashtag->name }} ( {{ $user->questions->where('hashtag_id', $hashtag->id )->count() }} )</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</div>
@endsection