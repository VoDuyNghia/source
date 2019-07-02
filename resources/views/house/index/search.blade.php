@extends('templates.house.master')
@section('content')
    <section class="breadcumb-area bg-img" style="background-image: url(/public/templates/house/img/bg-img/hero1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">TÌM KIẾM TỪ KHÓA <br/> {{ $key_word }}</h3>
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
                    <div class="single-blog-area mb-50">
                        Có {{count($objNews)}} blogs cần tìm
                    </div>
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
                            Không tìm thấy tin tức phù hợp
                        </div>
                    @endforelse
                </div>

                <div class="col-12 col-lg-4">
                    <div class="single-blog-area mb-50">
                        Có {{count($objProducts)}} sản phẩm cần tìm
                    </div>
                    <div class="blog-sidebar-area">

                        @forelse ($objProducts as $value)
                        @php
                            $arr = [
                                'name' => str_slug($value->name),
                                'id'   => $value->id,
                            ]
                        @endphp
                        <div class="single-featured-property">
                            <!-- Property Thumbnail -->
                            <div class="property-thumb">
                                <a href="{{ route('house.product.index',$arr) }}">
                                    <img src="{{asset('storage/app/public/files/show_image/'.$value->image)}}" alt="{{ $value->name }}">
                                </a>
                                <div class="tag">
                                    <span>{{ $value->choose->name }}</span>
                                </div>
                                <div class="list-price">
                                    <p>${{ $value->price }}</p>
                                </div>
                            </div>
                            <!-- Property Content -->
                            <div class="property-content">
                                <a href="{{ route('house.product.index',$arr) }}"><h5>{{ $value->name }}</h5></a>
                                <p class="location"><img src="{{ getenv("URL_TEMPLATES_HOUSE") }}/img/icons/location.png" alt="">{{ $value->address }}</p>
                                <p>{{ $value->detail }}</p>
                                <div class="property-meta-data d-flex align-items-end justify-content-between">
                                    @if(json_decode($value->configuration, true))
                                    <?php
                                      $configurations = json_decode($value->configuration, true);
                                      ?>
                                    @endif
                                    @forelse($configurations as $key=>$value)
                                        @if ($key == 0)
                                            <div class="bathroom">
                                                <img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/bathtub.png" alt="">
                                                <span>{{ $key }}</span>
                                            </div>
                                        @elseif($key ==1)
                                            <div class="garage">
                                                <img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/garage.png" alt="">
                                                <span>{{ $key }}</span>
                                            </div>
                                        @elseif($key==2)
                                            <div class="space">
                                                <img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/space.png" alt="">
                                                <span>{{ $key }} sq ft</span>
                                            </div> 
                                        @endif
                                    @empty
                                    @endforelse


                                </div>
                            </div>
                        </div>

                        @empty
                        <div class="single-featured-property">
                            Không tìm thấy sản phẩm phù hợp
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style type="text/css">
        .property-content{
            margin-bottom:2em;
        }

        .mb-50 {
            margin-bottom: 20px;
        }
    </style>

@endsection