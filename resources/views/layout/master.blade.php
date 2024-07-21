<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="Ask online Form">
    <meta name="description" content="The Ask is a bootstrap design help desk, support forum website template coded and designed with bootstrap Design, Bootstrap, HTML5 and CSS. Ask ideal for wiki sites, knowledge base sites, support forum sites">
    <meta name="keywords" content="HTML, CSS, JavaScript,Bootstrap,js,Forum,webstagram ,webdesign ,website ,web ,webdesigner ,webdevelopment">
    <meta name="robots" content="index, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <link rel="icon" type="image/x-icon" href="/image/images.png">
    <title>@yield('title')</title>

    @include('style')

    @stack('style')

<body>
    <!--======== Navbar =======-->
    @include('layout.header')


    <!--======= welcome section on top background=====-->
    @yield('header')

    
    <!-- ======content section/body=====-->
    <section class="main-content920">
        <div class="container">
            <div class="row">

                <!-- Nội dung chính   -->
                @yield('content')

                <!--end of col-md-9 -->
                <!--strart col-md-3 (side bar)-->
                <aside class="col-md-3 sidebar97239">

                    <!--              login part-->
                    @if(Auth::check())
                    <div class="login-part2389">
                        <h4>Xin chào, {{ Auth::user()->name }}!</h4>
                        <div class="pints-wrapper">
                            <div class="left-user3898">
                                <a href="#"><img src="/image/images.png" alt="Image"></a>
                                <!-- <div class="imag-overlay39"> <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a> </div> -->
                            </div> <span class="points-details938">
                                <a href="{{ route('user.myinfo') }}">
                                    <h5>Thông tin cá nhân</h5>
                                </a>
                                <a href="#" class="designetion439">Thành viên</a>
                                <!-- <p>{{ Auth::user()->name }}</p> -->
                            </span>
                            <div class="logout-btn">
                                <a href="{{route('logout')}}" class="userlogout320">Log Out</a>
                            </div>
                        </div>
                    </div>



                    @else

                    <div class="login-part2389">
                        <form action="{{route('login')}}" method="post">
                            @csrf
                            <h4>Login</h4>
                            <div class="input-group300"> <span><i class="fa fa-user" aria-hidden="true"></i></span>
                                <input type="text" class="namein309" name="username" placeholder="Username">
                            </div>
                            <div class="input-group300"> <span><i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input type="password" class="passin309" name="password" placeholder="Name">
                            </div>
                            <a href="#">
                                <button type="submit" type="button" class="userlogin320">Log In</button>
                            </a>
                            <div class="rememberme">
                                <label>
                                    <input type="checkbox" checked="checked"> Remember Me</label> <a href="/register" class="resbutton3892">Register</a>
                            </div>
                        </form>
                    </div>

                    @endif


                    <!--             social part -->
                    <div class="social-part2189">
                        <h4>Theo dõi</h4>
                        <li class="rss-one">
                            <a href="#" target="_blank"> <strong>
                                    <span>Subscribe</span>
                                    <i class="fa fa-rss" aria-hidden="true"></i>

                                    <br>
                                    <small>To RSS Feed</small>

                                </strong> </a>
                        </li>
                        <li class="facebook-two">
                            <a href="#" target="_blank"> <strong>
                                    <span>Subscribe</span>
                                    <i class="fa fa-facebook" aria-hidden="true"></i>

                                    <br>
                                    <small>To Facebook Feed</small>

                                </strong> </a>
                        </li>
                        <li class="twitter-three">
                            <a href="#" target="_blank"> <strong>
                                    <span>Subscribe</span>
                                    <i class="fa fa-twitter" aria-hidden="true"></i>

                                    <br>
                                    <small>To twitter Feed</small>

                                </strong> </a>
                        </li>
                        <li class="youtube-four">
                            <a href="#" target="_blank"> <strong>
                                    <span>Subscribe</span>
                                    <i class="fa fa-youtube" aria-hidden="true"></i>

                                    <br>
                                    <small>To youtube Feed</small>

                                </strong> </a>
                        </li>
                    </div>

                    <!--              highest part-->
                    <div class="highest-part302">
                        <h4>Top thành viên</h4>
                        @foreach($highestPoints as $user)
                        <div class="pints-wrapper">
                            <div class="left-user3898">
                                <a href="#"><img src="/image/images.png" alt="Image"></a>
                                <!-- <div class="imag-overlay39"> <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a> </div> -->
                            </div> 
                            <span class="points-details938">
                                <a href="{{route('user.userinfo', ['user_id' => $user->id])}}">
                                    <h5>{{ $user->name }}</h5>
                                </a>
                                <a href="#" class="designetion439">Thành viên</a>
                                <p>Point: {{ $user->point }}</p>
                            </span>
                        </div>
                        <hr>
                        @endforeach
                    </div>

                    <!--          End tags part-->
                    <!--        start recent post  -->
                    <div class="recent-post3290">
                        <h4>Bài viết gần đây</h4>

                        @foreach($recentQuestions as $question)
                        <div class="post-details021"> 
                            <a href="{{ route('question.detail', ['slug' => $question->slug]) }}">
                                <h5>{{ $question->title }}</h5>
                            </a>
                            <p>{!! $question->content !!}</p>
                        </div>
                        <small style="color: #848991">Created: {{ $question->created_at->format('d-m-Y'); }}</small>
                        <hr>
                        @endforeach
                    </div>
                    <!--       end recent post    -->
                </aside>
            </div>
        </div>
    </section>
    <!--    footer -->

    @include('layout.footer')

    @include('script')

    @stack('script')

</body>

</html>