

@extends('templates.house.master')
@section('content')
<!-- ##### Hero Area End ##### -->
@include('templates.house.banner')
<!-- ##### Advance Search Area Start ##### -->
<div class="south-search-area">
    @include("templates.house.fitter")
</div>
<!-- ##### Featured Properties Area Start ##### -->
<section class="listings-content-wrapper section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-breadcrumbs">
                    <nav class="property-breadcrumbs">
                        <ul>
                            <li>
                                <a href="{{ route('house.index.index') }}">{{ __('message.HOME') }}&nbsp;</a>
                                <i class="breadcrumbs-separator fa fa-angle-right">&nbsp;</i>
                            </li>
                            <li>
                                <a href="{{ route('house.cat.choose_product',strtolower($objProducts->choose->name)) }}" class="parent_cate">@if (session::get('locale') == "en"){{ $objProducts->choose->name }}@else{{ $objProducts->choose->name_vn }}@endif&nbsp;</a>
                                <i class="breadcrumbs-separator fa fa-angle-right">&nbsp;</i>
                            </li>
                            <li>
                                @if(session::get('locale') == "en"){{ $objProducts['name'] }}@else{{ $objProducts['name_vn'] }}@endif
                            </li>            
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-12">
                @if ($errors->any() or Session::has('fail') )
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }} </li>
                                <li> {{ Session::get('fail') }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ Session::get('success') }}</li>
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-12">
                <!-- Single Listings Slides -->
                <div class="single-listings-sliders owl-carousel">
                    @foreach ($objImage as $value)
                    	<img src="{{asset('storage/app/public/files/detail_image/'.$value->image_detail)}}" alt="{{ $objProducts['name'] }}">
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="listings-content">
                    <!-- Price -->
                    <div class="list-price">
                        <p>${{ $objProducts['price'] }}</p>
                        <div class="fb-share-button" 
                            data-href="{{ URL::current() }}" 
                            data-layout="button_count">
                        </div>
                        <div style="line-height: 2em;" class="fb-like" 
                            data-href="{{ URL::current() }}" 
                            data-layout="standard" 
                            data-action="like" 
                            data-show-faces="true">
                        </div>
                    </div>
                    <h5>{{ $objProducts['name'] }}</h5>
                    <p class="location"><img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/location.png" alt="">{{ $objProducts['address'] }}</p>
                    
                    <!-- Meta -->
                    <div class="property-meta-data d-flex align-items-end">
                       <div class="bathroom">
                            <img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/bathtub.png" alt="">
                            <span>{{ $objProducts['bathrooms']}}</span>
                        </div>
                        <div class="garage">
                            <img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/garage.png" alt="">
                            <span>{{ $objProducts['bedrooms']}}</span>
                        </div>
                    
                        <div class="space">
                            <img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/space.png" alt="">
                            <span>{{ $objProducts['sqrt']}} {{ __('message.S') }}</span>
                        </div>
                        
                    </div>
                    <!-- Core Features -->
                    @if ($objProducts['configuration'] <> null)
                    <ul class="listings-core-features d-flex align-items-center">
                        @if(json_decode($objProducts['configuration'], true))
                        <?php
                          $configurations = json_decode($objProducts['configuration'], true);
                          ?>
                        @endif

                    	@forelse($configurations as $key => $value)
                    			<li><i class="fa fa-check" aria-hidden="true"></i> {{ $value }}</li>
                       	@empty
                        @endforelse
                    </ul>
                    @endif

                    <p style="word-break: break-all;">{!! $objProducts['content'] !!}</p>
                    <!-- Listings Btn Groups -->
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="contact-realtor-wrapper">
                    <div class="realtor-info">
                        <img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/bg-img/listing.jpg" alt="">
                        <div class="realtor---info">
                            <h2>Jeremy Scott</h2>
                            <p>Realtor</p>
                            <h6><img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/phone-call.png" alt=""> 0905.972.521</h6>
                            <h6><img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/envelope.png" alt=""> danangresidence@gmail.com</h6>
                        </div>
                        <div class="realtor--contact-form">
                            @php
                                $arr = [
                                    'name' => str_slug($objProducts['name']),
                                    'id'   =>$objProducts['id'],
                                ];
                            @endphp
                            <form action="{{ route('contact', $arr) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" required="" class="form-control" name="username" value="{{old('username')}}" id="contact-name" placeholder="{{ __('message.NAME') }}">
                                </div>
                                <div class="form-group">
                                    <input type="number" required=""  class="form-control" name="phone" value="{{old('phone')}}"  id="contact-number" placeholder="{{ __('message.PHONE') }}">
                                </div>
                                <div class="form-group">
                                    <input type="email" required=""  required="" class="form-control" name="email" value="{{old('email')}}"  id="contact-email" placeholder="{{ __('message.EMAIL') }}">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control"  required="" name="message" id="message" cols="30" rows="10" placeholder="{{ __('message.MESSAGE') }}">{{old('message')}}</textarea>
                                </div>
                                <button type="submit" class="btn south-btn">{{ __('message.SUBMIT') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Listing Maps -->
        <div class="row">
            <div class="col-12">
                <div class="listings-maps mt-100">
                    <address>
                        {{ $objProducts['address']}} , {{ $objProducts->district->name }}, Thành Phố Đà Nẵng
                    </address>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ##### Editor Area Start ##### -->
<section class="south-editor-area d-flex align-items-center">
    <!-- Editor Content -->
    <div class="editor-content-area">
        <!-- Section Heading -->
        <div class="section-heading wow fadeInUp" data-wow-delay="250ms">
            <img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/prize.png" alt="">
            <h2>TRUONG DINH HOANG</h2>
            <p>{{ __('message.REALTOR') }}</p>
        </div>
        <p class="wow fadeInUp" data-wow-delay="500ms">Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odiomattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna. Curabitur rhoncus auctor eleifend. Fusce venenatis diam urna, eu pharetra arcu varius ac. Etiam cursus turpis lectus, id iaculis risus tempor id. Phasellus fringilla nisl sed sem scelerisque, eget aliquam magna vehicula.</p>
        <div class="address wow fadeInUp" data-wow-delay="750ms">
            <h6><img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/phone-call.png" alt=""> 0905.972.521</h6>
            <h6><img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/envelope.png" alt="">danangresidence@gmail.com</h6>
        </div>
        <div class="signature mt-50 wow fadeInUp" data-wow-delay="1000ms">
            <img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/core-img/signature.png" alt="">
        </div>
    </div>

    <!-- Editor Thumbnail -->
    <div class="editor-thumbnail">
        <img src="{{ asset('/public/templates/house/img/bg-img/2.jpg') }}" alt="">
    </div>
</section>
@endsection
