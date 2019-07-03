<section class="hero-area">
    <div class="hero-slides owl-carousel">
        <!-- Single Hero Slide -->
        @foreach ($SliderIndex as $value)
        @php
            $image = "/storage/app/public/files/slider_index/".$value->image;
            $arr = [
                'name' => str_slug($value->product->name),
                'id'   => $value->product->id
            ]
        @endphp
        
        <div class="single-hero-slide bg-img" style="background-image: url({{ $image }});">
            <a href="{{ route('house.product.index',$arr) }}">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">{{ $value->product->name }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        @endforeach
    </div>
</section>