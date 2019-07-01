@extends('templates.house.master')
@section('content')

<!-- ##### Hero Area End ##### -->
@include('templates.house.banner')
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
<!-- ##### Call To Action Area Start ##### -->
    <section class="listings-content-wrapper section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="listings-top-meta d-flex justify-content-between mb-100">
                        <div class="view-area d-flex align-items-center">
                        </div>
                        <div class="order-by-area d-flex align-items-center">
                            <span class="mr-15">Order by:</span>
                            <select id="status" onchange="callAjax()" id="choose">
                              <option selected>Default</option>
                              <option value="1">Mới nhất</option>
                              <option value="2">Mua</option>
                              <option value="3">Cho Thuê</option>
                              <option value="4">Price from high to low</option>
                              <option value="5">Price from low to high</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div id="content" class="row">
            	@forelse ($objProduct as $value)
	            @php
	                $arr = [
	                    'name' => str_slug($value->title),
	                    'id'   => $value->id_title,
	                ]
	            @endphp
	                @include('house.cat.ajax_product')
	            @empty
	                <div class="col-12 col-md-6 col-xl-4">
	                    Không có sản phẩm
	                </div>
	            @endforelse

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="south-pagination d-flex justify-content-end">
                        <nav aria-label="Page navigation">
                            {{$objProduct->links()}}
                        </nav>
                    </div>
                </div>
            </div>

			<script>
			  	$.ajaxSetup({
			        headers: {
			          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }
			  	});
        		function callAjax() {
	            	var status = $('#status').val();
		            $.ajax({
		                url: '{{ route('ajax_product') }}',
		                type: 'GET',
		                data: {
		                    status: status
		                },
		                success: function (data) {
		                    $('#content').html(data.view);
		                }
		            });
	        	};
			</script>



        </div>
    </section>
@endsection
