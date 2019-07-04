@extends('templates.house.master')
@section('content')
    <section class="breadcumb-area bg-img" style="background-image: url(/public/templates/house/img/bg-img/hero1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">TÌM KIẾM TỪ KHÓA NÂNG CAO</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<div class="south-search-area">
	    @include("templates.house.fitter")
	</div>
	<section class="featured-properties-area section-padding-100-50">
	    <div class="container">
	        <div class="row">
	            <div class="col-12">
	                <div class="section-heading wow fadeInUp">
	                    <h2>TÌM KIẾM NÂNG CAO</h2>
	                    <p>Có {{ count($objProducts) }} kết quả phù hợp ! </p>
	                </div>
	            </div>
	        </div>

	        <div class="row">

	            <!-- Single Featured Property -->
	            @forelse ($objProducts as $value)
	            @php
	                $arr = [
	                    'name' => str_slug($value->name),
	                    'id'   => $value->id,
	                ]
	            @endphp
	                <div class="col-12 col-md-6 col-xl-4">
	                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
	                        <!-- Property Thumbnail -->
	                        <div class="property-thumb">
	                            <a href="{{ route('house.product.index',$arr) }}">
	                                <img src="{{asset('storage/app/public/files/show_image/'.$value->image)}}" alt="{{ $value->name }}">
	                            </a>
	                            <div class="tag">
	                                <span>@if (session::get('locale') == "en"){{ $value->choose->name }}@else{{ $value->choose->name_vn }}@endif</span>
	                            </div>
	                            <div class="list-price">
	                                <p>${{$value->price}}</p>
	                            </div>
	                        </div>
	                        <!-- Property Content -->
	                        <div class="property-content">
	                            <a href="{{ route('house.product.index',$arr) }}"><h5>{{ $value->name }}</h5></a>
	                            <p class="location"><img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/location.png" alt="">{{ $value->address}}</p>
	                            <p>{{  $value->detail }}</p>
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
	                </div>
	            @empty
	                <div class="col-12 col-md-6 col-xl-4">
	                    Không có sản phẩm
	                </div>
	            @endforelse
	        </div>
	    </div>
	</section>
@endsection