@extends('templates.house.master')
@section('content')
    <section class="breadcumb-area bg-img" style="background-image: url(/public/templates/house/img/bg-img/hero1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Blogs</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <section class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">

                    <div class="single-blog-area">
                        <!-- Post Thumbnail -->
                        <div class="blog-post-thumbnail">
                           <img src="{{asset('storage/app/public/files/show_news/'.$objNews['image'])}}" alt="{{ $objNews['name'] }}">
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <!-- Date -->
                            <div class="post-date">
                                <a href="#">{{ Carbon\Carbon::createFromTimestamp(strtotime($objNews['created_at']))->diffForHumans() }} </a>
                            </div>
                            <!-- Headline -->
                            <a href="#" class="headline">{{ $objNews['name'] }}</a>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <p>By <a href="#">{{ $objNews->user->name }}</a></p>
                            </div>
                            <p>{!! $objNews['content']!!}</p>
                        </div>
                    </div>

                    <div class="comments-area">
                        <h5>4 Comments</h5>
                        <ol>
                            <!-- Single Comment Area -->
                            <li class="single_comment_area">
                                <div class="comment-wrapper d-flex">
                                    <!-- Comment Meta -->
                                    <div class="comment-author">
                                        <img src="{{ getenv('URL_TEMPLATES_HOUSE') }}/img/blog-img/c-1.jpg" alt="">
                                    </div>
                                    <!-- Comment Content -->
                                    <div class="comment-content">
                                        <div class="comment-meta">
                                            <a href="#" class="comment-author-name">Maria Williams</a> |
                                            <a href="#" class="comment-date">Jan 29, 2018</a> |
                                            <a href="#" class="comment-reply">Reply</a>
                                        </div>
                                        <p>Consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Su spendisse sit amet laoreet neque. Fusce sagittis suscipit sem a consequat.</p>
                                    </div>
                                </div>
                                <ol class="children">
                                    <li class="single_comment_area">
                                        <div class="comment-wrapper d-flex">
                                            <!-- Comment Meta -->
                                            <div class="comment-author">
                                                <img src="{{ getenv('URL_TEMPLATES_HOUSE') }}/img/blog-img/c-2.jpg" alt="">
                                            </div>
                                            <!-- Comment Content -->
                                            <div class="comment-content">
                                                <div class="comment-meta">
                                                    <a href="#" class="comment-author-name">Maria Williams</a> |
                                                    <a href="#" class="comment-date">Jan 29, 2018</a> |
                                                    <a href="#" class="comment-reply">Reply</a>
                                                </div>
                                                <p>Consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Su spendisse sit amet laoreet neque. Fusce sagittis suscipit sem a consequat.</p>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </li>
                            <li class="single_comment_area">
                                <div class="comment-wrapper d-flex">
                                    <!-- Comment Meta -->
                                    <div class="comment-author">
                                        <img src="{{ getenv('URL_TEMPLATES_HOUSE') }}/img/blog-img/c-3.jpg" alt="">
                                    </div>
                                    <!-- Comment Content -->
                                    <div class="comment-content">
                                        <div class="comment-meta">
                                            <a href="#" class="comment-author-name">Maria Williams</a> |
                                            <a href="#" class="comment-date">Jan 29, 2018</a> |
                                            <a href="#" class="comment-reply">Reply</a>
                                        </div>
                                        <p>Consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Su spendisse sit amet laoreet neque. Fusce sagittis suscipit sem a consequat.</p>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </div>

                    <!-- Leave A Comment -->
                </div>

                @include('templates.house.left_bar')
            </div>
        </div>
    </section>

@endsection