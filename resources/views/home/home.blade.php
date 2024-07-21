@extends('layout.master')


@section('title')
Homepage
@endsection

@section('header')
<section class="welcome-part-one">
    <div class="container">
        <div class="welcome-demop102 text-center">
            <h2>MINH Ý FORUM!</h2>
            <p>Chào mừng bạn đến với diễn đàn trực tuyến của tôi - nơi chia sẻ, thảo luận và tương tác về các chủ đề hấp dẫn!</p>

            <div class="form-style8292">
                <form action="{{route('search.home')}}">
                    <div class="input-group"> <span class="input-group-addon"><i class="fa fa-pencil-square" aria-hidden="true"></i></span>
                        <input type="text" class="form-control form-control8392" name="search" placeholder="Vấn đề bạn đang quan tâm ?"> <span class="input-group-addon"><button type="submit">Tìm kiếm</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')

<div class="col-md-9">
    <div id="main">

        @if(isset($taget))
        @if($taget == 1)
        <input id="tab1" type="radio" name="tabs" value="Recent" checked>
        <a href="/?query=recent-question"><label>Bài viết gần đây</label></a>
        <input id="tab2" type="radio" name="tabs" value="Most">
        <a href="/?query=most-response"><label>Trả lời nhiều nhất</label></a>
        <input id="tab3" type="radio" name="tabs" value="Recently">
        <a href="/?query=recently-answered"><label>Trả lời gần đây</label></a>
        @endif

        @if($taget == 2)
        <input id="tab1" type="radio" name="tabs" value="Recent">
        <a href="/?query=recent-question"><label>Bài viết gần đây</label></a>
        <input id="tab2" type="radio" name="tabs" value="Most" checked>
        <a href="/?query=most-response"><label>Trả lời nhiều nhất</label></a>
        <input id="tab3" type="radio" name="tabs" value="Recently">
        <a href="/?query=recently-answered"><label>Trả lời gần đây</label></a>
        @endif

        @if($taget == 3)
        <input id="tab1" type="radio" name="tabs" value="Recent">
        <a href="/?query=recent-question"><label>Bài viết gần đây</label></a>
        <input id="tab2" type="radio" name="tabs" value="Most">
        <a href="/?query=most-response"><label>Trả lời nhiều nhất</label></a>
        <input id="tab3" type="radio" name="tabs" value="Recently" checked>
        <a href="/?query=recently-answered"><label>Trả lời gần đây</label></a>
        @endif
        @endif



        <section id="content1">
            <!--Recent Question Content Section -->

            @foreach ($questions as $question)
            <div class="question-type2033">
                <div class="row">
                    <div class="col-md-1">
                        <div class="left-user12923 left-user12923-repeat">
                            <a href="#"><img src="image/images.png" alt="image"> </a> <a href="#"> <i class="{{ $question->issolved == 0 ? 'fa fa-check' : 'fa fa-times' }}" aria-hidden="true"></i> </a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="right-description893">
                            <div id="que-hedder2983">
                                <h3><a href="{{ route('question.detail', ['slug' => $question->slug]) }}" target="_blank">{{ $question->title }}</a></h3>
                            </div>
                            <div class="ques-details10018">
                                <p>{!! $question->content !!}</p>
                            </div>
                            <hr>
                            <div class="ques-icon-info3293"> <a href="#"><i class="fa fa-folder" aria-hidden="true"> {{ $question->category->name }}</i></a> <a href="#"><i class="fa fa-clock-o" aria-hidden="true"> {{ \Carbon\Carbon::now()->diffForHumans($question->created_at) }}</i></a> <a href="#"><i class="fa fa-question-circle-o" aria-hidden="true"> {{ $question->hashtag->name }}</i></a> </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="ques-type302">
                            <a href="#">
                                <button type="button" class="q-type238"><i class="fa fa-comment" aria-hidden="true"> {{ $question->answers->count() }} answer</i></button>
                            </a>
                            <a href="#">
                                <button type="button" class="q-type23 button-ques2973"> <i class="fa fa-user-circle-o" aria-hidden="true"> {{ $question->viewcount }} view</i> </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


            <nav aria-label="Page navigation">
                {{ $questions->withQueryString()->links() }}
            </nav>

        </section>
        <!--  End of content-1------>

    </div>
</div>


@endsection