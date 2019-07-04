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
               		@include('house.cat.ajax_product')
	            @empty
	                <div class="col-12 col-md-6 col-xl-4">
	                    Không có sản phẩm
	                </div>
	            @endforelse
	        </div>
	    </div>
	</section>
@endsection