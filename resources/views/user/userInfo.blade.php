@extends('layout.master')

@section('title')
User Details
@endsection

@section('header')
<section class="header-descriptin329">
    <div class="container">
        <h3>User DeatilsThông tin người dùng</h3>
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