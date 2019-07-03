@extends('templates.house.master')
@section('content')

<!-- ##### Hero Area End ##### -->
@include('templates.house.banner')
<!-- ##### Advance Search Area Start ##### -->
<div class="south-search-area">
    @include("templates.house.fitter")
</div>
<!-- ##### Advance Search Area End ##### -->

<!-- ##### Featured Properties Area Start ##### -->
<section class="listings-content-wrapper section-padding-100">
    <div class="container">
        <div class="row">
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
                    </div>
                    <h5>{{ $objProducts['name'] }}</h5>
                    <p class="location"><img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/location.png" alt="">{{ $objProducts['address'] }}</p>
                    <p style="word-break: break-all;">{!! $objProducts['content'] !!}</p>
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
                            <span>{{ $objProducts['sqrt']}} sq ft</span>
                        </div> 
                    </div>
                    <!-- Core Features -->
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
                            <h6><img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/phone-call.png" alt=""> +45 677 8993000 223</h6>
                            <h6><img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/envelope.png" alt=""> office@template.com</h6>
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

<script>
    $(document).ready(function(){
      $("address").each(function(){                         
        var embed ="<iframe id='google_map'frameborder='0' scrolling='no'  marginheight='0' marginwidth='0'   src='https://maps.google.com/maps?&amp;q="+ encodeURIComponent( $(this).text() ) +"&amp;output=embed'></iframe>";
        $(this).html(embed);
       });
    });
</script>

<section class="south-testimonials-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="testimonials-slides owl-carousel wow fadeInUp" data-wow-delay="500ms">
                    <!-- Single Testimonial Slide -->
                    <div class="single-testimonial-slide text-center">
                        <h5>Perfect Home for me</h5>
                        <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.</p>

                        <div class="testimonial-author-info">
                            <img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/bg-img/feature6.jpg" alt="">
                            <p>Daiane Smith, <span>Customer</span></p>
                        </div>
                    </div>

                    <!-- Single Testimonial Slide -->
                    <div class="single-testimonial-slide text-center">
                        <h5>Perfect Home for me</h5>
                        <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.</p>

                        <div class="testimonial-author-info">
                            <img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/bg-img/feature6.jpg" alt="">
                            <p>Daiane Smith, <span>Customer</span></p>
                        </div>
                    </div>

                    <!-- Single Testimonial Slide -->
                    <div class="single-testimonial-slide text-center">
                        <h5>Perfect Home for me</h5>
                        <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.</p>

                        <div class="testimonial-author-info">
                            <img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/bg-img/feature6.jpg" alt="">
                            <p>Daiane Smith, <span>Customer</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Testimonials Area End ##### -->

<!-- ##### Editor Area Start ##### -->
<section class="south-editor-area d-flex align-items-center">
    <!-- Editor Content -->
    <div class="editor-content-area">
        <!-- Section Heading -->
        <div class="section-heading wow fadeInUp" data-wow-delay="250ms">
            <img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/prize.png" alt="">
            <h2>jeremy Scott</h2>
            <p>Realtor</p>
        </div>
        <p class="wow fadeInUp" data-wow-delay="500ms">Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odiomattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna. Curabitur rhoncus auctor eleifend. Fusce venenatis diam urna, eu pharetra arcu varius ac. Etiam cursus turpis lectus, id iaculis risus tempor id. Phasellus fringilla nisl sed sem scelerisque, eget aliquam magna vehicula.</p>
        <div class="address wow fadeInUp" data-wow-delay="750ms">
            <h6><img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/phone-call.png" alt=""> +45 677 8993000 223</h6>
            <h6><img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/envelope.png" alt=""> office@template.com</h6>
        </div>
        <div class="signature mt-50 wow fadeInUp" data-wow-delay="1000ms">
            <img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/core-img/signature.png" alt="">
        </div>
    </div>

    <!-- Editor Thumbnail -->
    <div class="editor-thumbnail">
        <img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/bg-img/editor.jpg" alt="">
    </div>
</section>
@endsection
