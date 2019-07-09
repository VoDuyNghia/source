<div class="col-12 col-lg-4">
    <div class="blog-sidebar-area">

        <!-- Search Widget -->
        <div class="search-widget-area mb-70">
            <form action="{{route('house.blog.search')}}" method="get">
                <input type="search" name="search" value="{{ $key_word }}" id="search" placeholder="{{ __('message.SEARCH_BLOG') }}">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="featured-properties-slides owl-carousel">
            @foreach ($SliderProduct as $value)
            @php
                $arr = [
                    'name' => str_slug($value->product->name),
                    'id'   => $value->product->id,
                ];
            @endphp
            <div class="single-featured-property">
                <!-- Property Thumbnail -->
                <div class="property-thumb">
                    <a href="{{ route('house.product.index',$arr) }}"><img src="{{ asset('image/files/slider_product/'.$value->image) }}" alt="{{ $value->product->name }}"></a>
                    
                    <div class="tag">
                        <span>{{ $value->product->choose->name }}</span>
                    </div>
                <div class="status">
                    <span>@if (session::get('locale') == "en"){{ $value->product->status->name }}@else{{ $value->product->status->name }}@endif</span>
                </div>
                    <div class="list-price">
                        <p>${{$value->product->price}}</p>
                    </div>
                </div>
                <!-- Property Content -->
                <div class="property-content">
                    <a href="{{ route('house.product.index',$arr) }}"><h5>{{$value->product->name}}</h5></a>
                    <p class="location"><img src="{{ getenv('URL_TEMPLATES_HOUSE') }}/img/icons/location.png" alt="">{{ $value->product->address }}</p>
                    <p>{{$value->product->detail}}</p>
                    <div class="property-meta-data d-flex align-items-end justify-content-between">
                        <div class="bathroom">
                            <img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/bathtub.png" alt="">
                            <span>{{ $value->product->bathrooms}}</span>
                        </div>
                        <div class="garage">
                            <img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/garage.png" alt="">
                            <span>{{ $value->product->bedrooms}}</span>
                        </div>
                    
                        <div class="space">
                            <img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/space.png" alt="">
                            <span>{{ $value->product->sqrt}} {{ __('message.S') }}</span>
                        </div> 
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>