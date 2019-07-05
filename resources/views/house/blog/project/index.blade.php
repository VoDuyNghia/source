@extends('templates.house.master')
@section('content')

@include('templates.house.banner')
<!-- ##### Hero Area End ##### -->

<!-- ##### Advance Search Area Start ##### -->
<div class="south-search-area">
    @include("templates.house.fitter")
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
            @forelse ($objNews as $value)
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <a href="{{ route('house.blog.project.detail',[ 'id' => $value->id,'name' => str_slug($value->name) ]) }}">
                                <img src="{{asset('storage/app/public/files/show_news/'.$value->image)}}" alt="{{ $value->name }}">
                            </a>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <a href="{{ route('house.blog.project.detail',[ 'id' => $value->id,'name' => str_slug($value->name) ]) }}"><h5>@if(session::get('locale') == "en"){{ $value->name }}@else{{ $value->name_vn }}@endif</h5></a>
                            <p class="location"><img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/location.png" alt="">{{ $value->address }}</p>
                            <p>@if(session::get('locale') == "en"){{ $value->detail }}@else{{ $value->detail_vn }}@endif</p>
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
