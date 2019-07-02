@extends('templates.house.master')
@section('content')
    <section class="breadcumb-area bg-img" style="background-image: url(/public/templates/house/img/bg-img/hero1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Contact</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->
    <section class="south-blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div id="content" class="col-12 col-lg-8">
                    <!-- Single Blog Area -->
                    @forelse ($objNews as $value)
                    @php
                        $arr = [
                            'name' => str_slug($value->name),
                            'id'   => $value->id
                        ]
                    @endphp
                        <div class="single-blog-area mb-50">
                            <!-- Post Thumbnail -->
                            <div class="blog-post-thumbnail">
                                <img src="{{asset('storage/app/public/files/show_news/'.$value->image)}}" alt="{{ $value->name }}">
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <!-- Date -->
                                <div class="post-date">
                                    <a href="#">{{ Carbon\Carbon::createFromTimestamp(strtotime($value->created_at))->diffForHumans() }} </a>
                                </div>
                                <!-- Headline -->
                                <a href="#" class="headline">{{ $value->name }}</a>
                                <!-- Post Meta -->
                                <div class="post-meta">
                                    <p>By <a href="#">{{$value->user->name}}</a> | <a href="#">2 Comments</a></p>
                                </div>
                                <p>{{ $value->detail }}</p>
                                <!-- Read More btn -->
                                <a href="{{ route('house.blog.detail',$arr) }}" class="btn south-btn">Read More</a>
                            </div>
                        </div>
                    @empty
                        <div class="single-blog-area mb-50">
                            Không có bài viết bạn cần tìm
                        </div>
                    @endforelse
                </div>
                @include('templates.house.left_bar')
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Pagination -->
                    <div class="south-pagination mt-100 d-flex">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                {{ $objNews->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
  

    <!-- Google Maps -->
    <div class="map-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="googleMap" class="googleMap"></div>
                </div>
            </div>
        </div>
	</div>
@endsection