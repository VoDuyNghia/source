<div class="col-12 col-md-6 col-xl-4">
	<div class="single-featured-property mb-50">
	    <!-- Property Thumbnail -->
	    <div class="property-thumb">
	    	<a href="{{ route('house.product.index',$arr) }}">
	            <img src="{{asset('storage/app/public/files/show_image/'.$value->image)}}" alt="{{ $value->name }}">
	        </a>
	        <div class="tag">
	            <span>{{ $value->choose->name }}</span>
	        </div>
	        <div class="list-price">
	            <p>${{ $value->price }}</p>
	        </div>
	    </div>
	    <!-- Property Content -->
	    <div class="property-content">
	    	<a href="{{ route('house.product.index',$arr) }}"><h5>{{ $value->title }}</h5></a>
	        <p class="location"><img src="{{getenv('URL_TEMPLATES_HOUSE')}}/img/icons/location.png" alt="">{{ $value->address }}</p>
	        <p>{{ $value->detail }}</p>
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