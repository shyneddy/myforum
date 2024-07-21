@extends('layout.master')

@section('title')
Ask Question
@endsection

@section('header')

<section class="header-descriptin329">
    <div class="container">
        <h3>Thêm bài viết</h3>
        <ol class="breadcrumb breadcrumb839">
            <li><a href="#">Home</a></li>
            <li class="active">Thêm bài viết</li>
        </ol>
    </div>
</section>

@endsection

@section('content')

<div class="col-md-9">
    <div class="ask-question-input-part032">
        <h4>Thông tin bài viết</h4>
        <hr>

        @if(Auth::user())
        <form action="{{ route('question.create') }}" method="post">
            @csrf
            <div class="question-title39">
                <span class="form-description433">Tiêu đề* </span><input type="text" name="title" class="question-ttile32" placeholder="Write Your Question Title">
            </div>

            <div class="categori49">
                <span class="form-description43305">Danh mục*</span>
                <label>
                    <select name="category_id" class="list-category53">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </label>
            </div>

            <div class="hashtag49">
                <span class="form-description43305">Hashtag*</span>
                <label>
                    <select name="hashtag_id" class="list-hashtag53">
                        @foreach($hashtags as $hashtag)
                            <option value="{{ $hashtag->id }}">{{ $hashtag->name }}</option>
                        @endforeach
                    </select>
                </label>
            </div>

            <!-- <div class="button-group-addfile3239">
                    <span class="form-description23993">Attactment*</span><input type="file" name="ffile" class="question-ttile3226">

                </div> -->
            <div class="details2-239">
                <div class="col-md-12 nopadding">
                    <!-- <textarea id="txtEditor" name="content" ></textarea> -->

                    <label>Nội dung</label>
                    <textarea id="content" name="content" class="ckeditor"></textarea>

                </div>
            </div>

            <div class="publish-button2389">
                <button type="submit" class="publis1291">Đăng bài</button>
            </div>
        </form>
        @else
        <div>Vui lòng đăng nhập!!</div>
        @endif



    </div>


</div>

@endsection