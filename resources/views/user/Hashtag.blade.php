@extends('layout.master')

@section('title')
My Hashtag Filter
@endsection

@section('header')
<section class="header-descriptin329">
    <div class="container">
        <h3>Tất cả bài viết theo Hashtag</h3>
        <ol class="breadcrumb breadcrumb839">
            <li><a href="#">Home</a></li>
            <li class="active">{{ $hashtag->name }}</li>
        </ol>
    </div>
</section>
@endsection

@section('content')
<div class="col-md-9">
    <section class="category2781">

        @if(isset($questions))
        @foreach($questions as $question)
        <div class="question-type2033">
            <div class="row">
                <div class="col-md-1">
                    <div class="left-user12923 left-user12923-repeat">
                        <a href="#"><img src="/image/images.png" alt="image"> </a> <a href="#"><i class="fa fa-check" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="right-description893">
                        <div id="que-hedder2983">
                            <h3><a href="{{ route('question.detail', ['slug' => $question->slug]) }}" target="_blank"> {{ $question->title }}</a></h3>
                        </div>
                        <div class="ques-details10018">
                            <p>{!! $question->content !!}</p>
                        </div>
                        <hr>
                        <div class="ques-icon-info3293"> <a href="#"><i class="fa fa-star" aria-hidden="true"> 5 </i> </a> <a href="#"><i class="fa fa-folder" aria-hidden="true"> {{ $question->category->name }}</i></a> <a href="#"><i class="fa fa-clock-o" aria-hidden="true"> {{ \Carbon\Carbon::now()->diffForHumans($question->created_at) }} </i></a> <a href="#"><i class="fa fa-question-circle-o" aria-hidden="true"> Question</i></a> <a href="#"><i class="fa fa-bug" aria-hidden="true"> Report</i></a> </div>
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
        @endif

        <nav aria-label="Page navigation">
            {{ $questions->withQueryString()->links() }}
        </nav>


    </section>
</div>
@endsection