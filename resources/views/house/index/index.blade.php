@extends('templates.house.master')
@section('content')

@include('templates.house.banner')
<!-- ##### Hero Area End ##### -->

<!-- ##### Advance Search Area Start ##### -->
<div class="south-search-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="advanced-search-form">
                    <!-- Search Title -->
                    <div class="search-title">
                        <p>Search for your home</p>
                    </div>
                    <!-- Search Form -->
                    <form action="#" method="post" id="advanceSearch">
                        <div class="row">

                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <input type="input" class="form-control" name="input" placeholder="Keyword">
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <select class="form-control" id="cities">
                                        <option>All Cities</option>
                                        <option>Riga</option>
                                        <option>Melbourne</option>
                                        <option>Vienna</option>
                                        <option>Vancouver</option>
                                        <option>Toronto</option>
                                        <option>Calgary</option>
                                        <option>Adelaide</option>
                                        <option>Perth</option>
                                        <option>Auckland</option>
                                        <option>Helsinki</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <select class="form-control" id="catagories">
                                        <option>All Catagories</option>
                                        <option>Apartment</option>
                                        <option>Bar</option>
                                        <option>Farm</option>
                                        <option>House</option>
                                        <option>Store</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <select class="form-control" id="offers">
                                        <option>All Offers</option>
                                        <option>100% OFF</option>
                                        <option>75% OFF</option>
                                        <option>50% OFF</option>
                                        <option>25% OFF</option>
                                        <option>10% OFF</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-xl-3">
                                <div class="form-group">
                                    <select class="form-control" id="listings">
                                        <option>All Listings</option>
                                        <option>Listings 1</option>
                                        <option>Listings 2</option>
                                        <option>Listings 3</option>
                                        <option>Listings 4</option>
                                        <option>Listings 5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-xl-2">
                                <div class="form-group">
                                    <select class="form-control" id="bedrooms">
                                        <option>Bedrooms</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5+</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-xl-2">
                                <div class="form-group">
                                    <select class="form-control" id="bathrooms">
                                        <option>Bathrooms</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5+</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-8 col-lg-12 col-xl-5 d-flex">
                                <!-- Space Range -->
                                <div class="slider-range">
                                    <div data-min="120" data-max="820" data-unit=" sq. ft" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="120" data-value-max="820">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    </div>
                                    <div class="range">120 sq. ft - 820 sq. ft</div>
                                </div>

                                <!-- Distance Range -->
                                <div class="slider-range">
                                    <div data-min="10" data-max="1300" data-unit=" mil" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="10" data-value-max="1300">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    </div>
                                    <div class="range">10 mil - 1300 mil</div>
                                </div>
                            </div>

                            <div class="col-12 search-form-second-steps">
                                <div class="row">

                                    <div class="col-12 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <select class="form-control" id="types">
                                                <option>All Types</option>
                                                <option>Apartment <span>(30)</span></option>
                                                <option>Land <span>(69)</span></option>
                                                <option>Villas <span>(103)</span></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <select class="form-control" id="catagories2">
                                                <option>All Catagories</option>
                                                <option>Apartment</option>
                                                <option>Bar</option>
                                                <option>Farm</option>
                                                <option>House</option>
                                                <option>Store</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <select class="form-control" id="Actions">
                                                <option>All Actions</option>
                                                <option>Sales</option>
                                                <option>Booking</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4 col-lg-3">
                                        <div class="form-group">
                                            <select class="form-control" id="city2">
                                                <option>All City</option>
                                                <option>City 1</option>
                                                <option>City 2</option>
                                                <option>City 3</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <select class="form-control" id="Actions3">
                                                <option>All Actions</option>
                                                <option>Sales</option>
                                                <option>Booking</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <select class="form-control" id="city3">
                                                <option>All City</option>
                                                <option>City 1</option>
                                                <option>City 2</option>
                                                <option>City 3</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <select class="form-control" id="city5">
                                                <option>All City</option>
                                                <option>City 1</option>
                                                <option>City 2</option>
                                                <option>City 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-between align-items-end">
                                <!-- More Filter -->
                                <div class="more-filter">
                                    <a href="#" id="moreFilter">+ More filters</a>
                                </div>
                                <!-- Submit -->
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn south-btn">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Advance Search Area End ##### -->

<!-- ##### Featured Properties Area Start ##### -->
<section class="featured-properties-area section-padding-100-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading wow fadeInUp">
                    <h2>Featured Properties</h2>
                    <p>Suspendisse dictum enim sit amet libero malesuada feugiat.</p>
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
                                <span>For Sale</span>
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
<!-- ##### Featured Properties Area End ##### -->

<!-- ##### Call To Action Area Start ##### -->
<section class="call-to-action-area bg-fixed bg-overlay-black" style="background-image: url(public/templates/house/img/bg-img/cta.jpg)">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-12">
                <div class="cta-content text-center">
                    <h2 class="wow fadeInUp" data-wow-delay="300ms">Are you looking for a place to rent?</h2>
                    <h6 class="wow fadeInUp" data-wow-delay="400ms">Suspendisse dictum enim sit amet libero malesuada feugiat.</h6>
                    <a href="#" class="btn south-btn mt-50 wow fadeInUp" data-wow-delay="500ms">Search</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Call To Action Area End ##### -->

<!-- ##### Testimonials Area Start ##### -->
<section class="south-testimonials-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading wow fadeInUp" data-wow-delay="250ms">
                    <h2>Client testimonials</h2>
                    <p>Suspendisse dictum enim sit amet libero malesuada feugiat.</p>
                </div>
            </div>
        </div>

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
