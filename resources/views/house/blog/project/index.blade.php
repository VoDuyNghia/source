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
                    <h2>{{ __('message.TITLE_PROJECT') }}</h2>
                </div>
            </div>
        </div>
            @forelse ($objNews as $value)
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <a href="{{ route('house.blog.project.detail',[ 'id' => $value->id,'name' => str_slug($value->name) ]) }}">
                                <img src="{{asset('/image/files/show_news/'.$value->image)}}" alt="{{ $value->name }}">
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
                    {{ __('message.RESULT', ['result' => count($objNews)]) }}
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- ##### Featured Properties Area End ##### -->

<!-- ##### Editor Area Start ##### -->
@include('templates.house.describe')
@endsection
