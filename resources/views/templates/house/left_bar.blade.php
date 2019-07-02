<div class="col-12 col-lg-4">
    <div class="blog-sidebar-area">

        <!-- Search Widget -->
        <div class="search-widget-area mb-70">
            <form action="{{route('house.blog.search')}}" method="get">
                <input type="search" name="search" value="{{ $key_word }}" id="search" placeholder="Search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>

        <div class="featured-properties-slides owl-carousel">
            <!-- Single Slide -->
            <div class="single-featured-property">
                <!-- Property Thumbnail -->
                <div class="property-thumb">
                    <img src="{{ getenv('URL_TEMPLATES_HOUSE') }}/img/bg-img/feature1.jpg" alt="">
                    <div class="tag">
                        <span>For Sale</span>
                    </div>
                    <div class="list-price">
                        <p>$945 679</p>
                    </div>
                </div>
                <!-- Property Content -->
                <div class="property-content">
                    <h5>Villa in Los Angeles</h5>
                    <p class="location"><img src="{{ getenv('URL_TEMPLATES_HOUSE') }}/img/icons/location.png" alt="">Upper Road 3411, no.34 CA</p>
                    <p>Integer nec bibendum lacus. Suspendisse dictum enim sit amet libero malesuada.</p>
                    <div class="property-meta-data d-flex align-items-end justify-content-between">
                        <div class="new-tag">
                            <img src="{{ getenv('URL_TEMPLATES_HOUSE') }}/img/icons/new.png" alt="">
                        </div>
                        <div class="bathroom">
                            <img src="{{ getenv('URL_TEMPLATES_HOUSE') }}/img/icons/bathtub.png" alt="">
                            <span>2</span>
                        </div>
                        <div class="garage">
                            <img src="{{ getenv('URL_TEMPLATES_HOUSE') }}/img/icons/garage.png" alt="">
                            <span>2</span>
                        </div>
                        <div class="space">
                            <img src="{{ getenv('URL_TEMPLATES_HOUSE') }}/img/icons/space.png" alt="">
                            <span>120 sq ft</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Slide -->
            <div class="single-featured-property">
                <!-- Property Thumbnail -->
                <div class="property-thumb">
                    <img src="{{ getenv('URL_TEMPLATES_HOUSE') }}/img/bg-img/feature2.jpg" alt="">

                    <div class="tag">
                        <span>For Sale</span>
                    </div>
                    <div class="list-price">
                        <p>$945 679</p>
                    </div>
                </div>
                <!-- Property Content -->
                <div class="property-content">
                    <h5>Town House in Los Angeles</h5>
                    <p class="location"><img src="{{ getenv('URL_TEMPLATES_HOUSE') }}/img/icons/location.png" alt="">Upper Road 3411, no.34 CA</p>
                    <p>Integer nec bibendum lacus. Suspendisse dictum enim sit amet libero malesuada.</p>
                    <div class="property-meta-data d-flex align-items-end justify-content-between">
                        <div class="new-tag">
                            <img src="{{ getenv('URL_TEMPLATES_HOUSE') }}/img/icons/new.png" alt="">
                        </div>
                        <div class="bathroom">
                            <img src="{{ getenv('URL_TEMPLATES_HOUSE') }}/img/icons/bathtub.png" alt="">
                            <span>2</span>
                        </div>
                        <div class="garage">
                            <img src="{{ getenv('URL_TEMPLATES_HOUSE') }}/img/icons/garage.png" alt="">
                            <span>2</span>
                        </div>
                        <div class="space">
                            <img src="{{ getenv('URL_TEMPLATES_HOUSE') }}/img/icons/space.png" alt="">
                            <span>120 sq ft</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>