@extends('layout.master')

@section('title')
Detail Question
@endsection

@section('header')

<section class="header-descriptin329">
    <div class="container">
        <h3>Chi tiết bài viết</h3>
        <ol class="breadcrumb breadcrumb839">
            <li><a href="#">Home</a></li>
            <li><a href="#">Post Details</a></li>
            <li class="active">{{ $question->title }}</li>
        </ol>
    </div>
</section>

@endsection

@section('content')

<div class="col-md-9">
    <div class="post-details">
        <div class="details-header923">
            <div class="row">
                <div class="col-md-8">
                    <div class="post-title-left129">
                        <h3>{{ $question->title }}</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="post-que-rep-rihght320"> <a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i> {{ $question->hashtag->name }}</a> <a href="#" class="r-clor10">Report</a> </div>
                </div>
            </div>
        </div>
        <div class="post-details-info1982">
            <p>{!! $question->content !!}</p>
            <hr>
            <div class="post-footer29032">
                <div class="l-side2023"> <i class="fa fa-folder folder2" aria-hidden="true"> {{ $question->category->name }}</i> <i class="fa fa-clock-o clock2" aria-hidden="true"> {{ \Carbon\Carbon::now()->diffForHumans($question->created_at) }}</i> <a href="#"><i class="fa fa-commenting commenting2" aria-hidden="true"> {{ $question->answers->count() }} answers</i></a> <i class="fa fa-user user2" aria-hidden="true"> {{ $question->viewcount }} views</i> </div>
                <div class="l-rightside39">
                    @if(isset($user))
                    <span class="single-question-vote-result"> &nbsp; +{{ $question->likes->where('like', 1)->count() }}</span><button type="button" class="tolltip-button thumbs-up2" data-toggle="tooltip" data-placement="bottom" title="Like"><a href="{{ route('question.like', ['question_id'=> $question->id])}}" class="fa fa-thumbs-o-up " aria-hidden="true" <?php echo $user->likes->where('question_id', $question->id)->where('like', 1)->count() > 0 ? 'style="color: red;text-decoration: none; font-size: 20px;"' : 'style="text-decoration: none; font-size: 20px;"' ?>></a></button>
                    <span class="single-question-vote-result"> &nbsp; +{{ $question->likes->where('like', 0)->count() }}</span><button type="button" class="tolltip-button  thumbs-down2" data-toggle="tooltip" data-placement="bottom" title="Dislike"><a href="{{ route('question.dislike', ['question_id' => $question->id]) }}" class="fa fa-thumbs-o-down" aria-hidden="true" <?php echo $user->likes->where('question_id', $question->id)->where('like', 0)->count() > 0 ? 'style="color: red;text-decoration: none; font-size: 20px;"' : 'style="text-decoration: none; font-size: 20px;"' ?>></a></button>
                    @else
                    <span class="single-question-vote-result"> &nbsp; +{{ $question->likes->where('like', 1)->count() }}</span><button type="button" class="tolltip-button thumbs-up2" data-toggle="tooltip" data-placement="bottom" title="Like"><a href="{{ route('question.like', ['question_id'=> $question->id])}}" class="fa fa-thumbs-o-up " aria-hidden="true" style="text-decoration: none; font-size: 20px;"></a></button>
                    <span class="single-question-vote-result"> &nbsp; +{{ $question->likes->where('like', 0)->count() }}</span><button type="button" class="tolltip-button  thumbs-down2" data-toggle="tooltip" data-placement="bottom" title="Dislike"><a href="{{ route('question.dislike', ['question_id' => $question->id]) }}" class="fa fa-thumbs-o-down" aria-hidden="true" style="text-decoration: none; font-size: 20px;"></a></button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="author-details8392">
        <!-- <div class="author-img202l"> <img src="/image/images.png" alt="image">
            <div class="au-image-overlay text-center"> <a href="#"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a> </div>
        </div>  -->
        <div class="left-user3898">
            <a href="#"><img src="/image/images.png" alt="Image"></a>
            <!-- <div class="imag-overlay39"> <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a> </div> -->
        </div>
        <span class="author-deatila04re">
            <a href="{{route('user.userinfo', ['user_id' => $question->user->id])}}"><h5>{{ $question->user->name }}</h5></a>
            <p>Chào mọi người! Tôi là <strong>{{ $question->user->name }}</strong>. Mời mọi người vào trang của tôi để biết thêm thông tin về tôi.</p>

        </span>
    </div>
    <div class="related3948-question-part">
        <h3>Bài viết liên quan</h3>
        <hr>

        @foreach($relatedQuestions as $relatedQuestion)
        <p><a href="{{ route('question.detail', ['slug' => $relatedQuestion->slug]) }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>{{ $relatedQuestion->title }}</a></p>
        @endforeach
    </div>


    <!-- Comment -->
    <div class="comment289-box">
        <h3>Câu trả lời của bạn</h3>
        @if(Auth::check())
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('question.answer', ['id' => $question->id])}}">
                    <div class="post9320-box">
                        <input type="text" name="content" class="comment-input219882" placeholder="Enter Your Post">
                    </div>
                    <button type="submit" class="pos393-submit">Post Your Answer</button>
                </form>
            </div>
        </div>
        @endif
    </div>
    <div class="comment-list12993">
        <div class="container">
            <div class="row">

                <div class="comments-container">
                    <ul id="comments-list" class="comments-list">

                        @if($answers->count() == 0)
                            <li style="margin-left: 50px;"><strong>Chưa có câu trả lời nào</strong></li>
                        @endif

                        @foreach($answers as $answer)
                        <li>
                            @if($answer->answers->count() == 0)
                            <div class="comment-avatar"><img src="/image/images.png" alt=""></div>
                            <div class="comment-box">
                                <div class="comment-head">
                                    <h6 class="comment-name"><a href="#">{{ $answer->user->name }}</a></h6> <span><i class="fa fa-clock-o" aria-hidden="true"> {{ $answer->created_at }}</i></span> <i class="fa fa-reply"></i> <i class="fa fa-heart"></i>
                                </div>
                                <div class="comment-content"> {{ $answer->content }} </div>
                                <div href="#" class="btn btn-secondary btn-reply" id="rep-comment" onclick="handleClickRepComment('form-rep-comment-<?php echo $answer->id; ?>')">Trả lời</div>
                            </div>
                            <!-- form comment -->
                            <div id="form-rep-comment-<?php echo $answer->id; ?>" class="row" style="display: none; max-width: 500px; margin: 0;">
                                <div class="col-md-12" style="background: white; padding: 10px; border-radius: 10px; box-shadow: 0px 0px 13px -3px;">
                                    <form action="{{route('rep.answer', ['parent_id' => $answer->id])}}" method="post" style="display: flex; flex-direction: column; align-items: center;">
                                        @csrf
                                        <div class="post9320-box" style="width: 100%;">
                                            <input type="text" name="content" class="comment-input219882" placeholder="Enter Your Post" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                                        </div>
                                        <button  type="submit" class="pos393-submit" style="margin-top: 10px; padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Post Your Answer</button>
                                    </form>
                                </div>
                            </div>


                            @else

                            <div class="comment-avatar"><img src="/image/images.png" alt=""></div>
                            <div class="comment-box">
                                <div class="comment-head">
                                    <h6 class="comment-name"><a href="#">{{ $answer->user->name }}</a></h6> <span><i class="fa fa-clock-o" aria-hidden="true"> {{ $answer->created_at }}</i></span> <i class="fa fa-reply"></i> <i class="fa fa-heart"></i>
                                </div>
                                <div class="comment-content"> {{ $answer->content }} </div>
                                <div href="#" class="btn btn-secondary btn-reply" id="rep-comment" onclick="handleClickRepComment('form-rep-comment-<?php echo $answer->id; ?>')">Trả lời</div>
                                <button id="btn-show-{{$answer->id}}"  style="padding: 5px 10px; background-color:aqua; border-style: none; border-radius: 5px" onclick="showMoreBtn(<?php echo $answer->id ?>,'reply-list-<?php echo $answer->id; ?>')">Hiện thêm</button>

                            </div>

                            <!-- form comment -->
                            <div id="form-rep-comment-<?php echo $answer->id; ?>" class="row" style="display: none; max-width: 500px; margin: 0;">
                                <div class="col-md-12" style="background: white; padding: 10px; border-radius: 10px; box-shadow: 0px 0px 13px -3px;">
                                    <form action="{{route('rep.answer', ['parent_id' => $answer->id])}}" method="post" style="display: flex; flex-direction: column; align-items: center;">
                                        @csrf
                                        <div class="post9320-box" style="width: 100%;">
                                            <input type="text" name="content" class="comment-input219882" placeholder="Enter Your Post" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                                        </div>
                                        <button  type="submit" class="pos393-submit" style="margin-top: 10px; padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Post Your Answer</button>
                                    </form>
                                </div>
                            </div>

                            <ul id="reply-list-<?php echo $answer->id; ?>" class="comments-list reply-list" style="display: none;">
                                @foreach($answer->recursive() as $answerChild)
                                <li>
                                    <div class="comment-avatar"><img src="/image/images.png" alt=""></div>
                                    <div class="comment-box">
                                        <div class="comment-head">
                                            <h6 class="comment-name"><a href="#">{{ $answerChild->user->name }}</a></h6> <span><i class="fa fa-clock-o" aria-hidden="true"> {{ $answerChild->created_at }}</i></span> <i class="fa fa-reply"></i> <i class="fa fa-heart"></i>
                                        </div>
                                        <div class="comment-content"> <a href="">{{ $answerChild->parent->user->name != $answerChild->user->name ? $answerChild->parent->user->name : '' }}</a> {{$answerChild->content }} </div>
                                        <div href="#" class="btn btn-secondary btn-reply" id="rep-comment" onclick="handleClickRepComment('form-rep-comment-<?php echo $answerChild->id; ?>')">Trả lời</div>

                                    </div>
                                    <!-- form comment -->
                                    <div id="form-rep-comment-<?php echo $answerChild->id; ?>" class="row" style="display: none; max-width: 500px; margin: 0;">
                                        <div class="col-md-12" style="background: white; padding: 10px; border-radius: 10px; box-shadow: 0px 0px 13px -3px;">
                                            <form action="{{route('rep.answer', ['parent_id' => $answerChild->id])}}" method="post" style="display: flex; flex-direction: column; align-items: center;">
                                                @csrf
                                                <div class="post9320-box" style="width: 100%;">
                                                    <input type="text" name="content" class="comment-input219882" placeholder="Enter Your Post" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                                                </div>
                                                <button type="submit" class="pos393-submit" style="margin-top: 10px; padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Post Your Answer</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                <button id="btn-hide-{{$answer->id}}" style="padding: 5px 10px; background-color:aqua; border-style: none; border-radius: 5px" onclick="hideMoreBtn(<?php echo $answer->id ?>,'reply-list-<?php echo $answer->id; ?>')">Ẩn bớt</button>
                            </ul>
                            @endif
                        </li>
                        @endforeach



                    </ul>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection