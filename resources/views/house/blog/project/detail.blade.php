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
                        <div class="blog-post-thumbnail">
                            <p style="text-transform: uppercase;" class="the-article-category">
                                 <a href="{{ route('house.index.index') }}">{{ __('message.HOME') }}</a>
                                    <span><img src="{{ asset('arrow.png') }}"></span>
                                <a href="{{ route('house.blog.project.index') }}" class="parent_cate">PROJECT</a>
                                    <span><img src="{{ asset('arrow.png') }}"></span>
                                <span>@if (session::get('locale') == "en"){{ $objNews['name'] }}@else{{ $objNews['name_vn'] }}@endif</span>
                            </p> 
                        </div>
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
                            <a href="#" class="headline">@if (session::get('locale') == "en"){{ $objNews['name'] }}@else{{ $objNews['name_vn'] }}@endif</a>
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <p>By <a href="#">{{ $objNews->user->name }}</a></p>
                            </div>
                            <p>@if (session::get('locale') == "en"){!! $objNews['content']!!}@else{!! $objNews['content_vn']!!}@endif </p>
                        </div>
                    </div>

                    <div class="comments-area">
                        <h5>Comments</h5>
                        <ol>
                            <div id="fb-root"></div>
                            <div id='fb-comments' class="fb-comments"
                                 data-href="https://developers.facebook.com/docs/plugins/comments#configurator"
                                 data-width="100%" data-numposts="5"></div>
                            <script>
                                (function (d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0';
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));
                            </script>
                            <script>
                                $(document).ready(function () {
                                    document.getElementById("fb-comments").setAttribute("data-href", window.location.href);
                                });
                            </script>
                        </ol>
                    </div>

                    <!-- Leave A Comment -->
                </div>
                @include('templates.house.left_bar')
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="listings-maps mt-100">
                        <address>
                            {{ $objNews['address']}} 
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection