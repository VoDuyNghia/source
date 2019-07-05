@forelse ($objProduct as $value)
@php
    $arr = [
        'name' => str_slug($value->title),
        'id'   => $value->id_title,
    ]
@endphp
<div class="col-12 col-md-6 col-xl-4">
	<div class="single-featured-property mb-50">
	    <!-- Property Thumbnail -->
	    <div class="property-thumb">
	    	<a href="{{ route('house.product.index',$arr) }}">
	            <img src="{{asset('storage/app/public/files/show_image/'.$value->image)}}" alt="{{ $value->name }}">
	        </a>
	        <div class="tag">
	            <span>@if (session::get('locale') == "en"){{ $value->choose->name }}@else{{ $value->choose->name_vn }}@endif</span>
	        </div>
            <div class="status">
                <span>@if (session::get('locale') == "en"){{ $value->status->name }}@else{{ $value->status->name_vn }}@endif</span>
            </div>
	        <div class="list-price">
	            <p>${{ $value->price }}</p>
	        </div>
	    </div>
	    <!-- Property Content -->
	    <div class="property-content">
	    	<a href="{{ route('house.product.index',$arr) }}"><h5>@if(session::get('locale') == "en"){{$value->name }}@else{{ $value->name_vn }}@endif</h5></a>
	        <p class="location"><img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/location.png" alt="">{{ $value->address }}</p>
	        <p>@if (session::get('locale') == "en"){{ $value->detail }}@else{{ $value->detail_vn }}@endif</p>
	        <div class="property-meta-data d-flex align-items-end justify-content-between">
				<div class="bathroom">
				    <img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/bathtub.png" alt="">
				    <span>{{ $value->bathrooms}}</span>
				</div>
				<div class="garage">
				    <img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/garage.png" alt="">
				    <span>{{ $value->bedrooms}}</span>
				</div>

				<div class="space">
				    <img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/space.png" alt="">
				    <span>{{ $value->sqrt}} {{ __('message.S') }}</span>
				</div> 
	        </div>
	    </div>
	</div>
</div>
@empty
    <div class="col-12 col-md-6 col-xl-4">
        Không có sản phẩm
    </div>
@endforelse


