@extends('templates.house.master')
@section('content')
    <section class="breadcumb-area bg-img" style="background-image: url(/public/templates/house/img/bg-img/hero1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">{{ __('message.SEARCH') }}</h3>
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
	                    <h2>{{ __('message.SEARCH') }}</h2>
	                    <p>{{ __('message.RESULT', ['result' => count($objProducts)]) }}</p>
	                </div>
	            </div>
	        </div>

	        <div id="content" class="row">
           		@include('house.cat.ajax_product')
	        </div>
	    </div>
	</section>
@endsection