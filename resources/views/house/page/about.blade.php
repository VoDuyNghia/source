@extends('templates.house.master')
@section('content')

<!-- ##### Hero Area End ##### -->
@include('templates.house.banner')
<!-- ##### Advance Search Area Start ##### -->
<div class="south-search-area">
    @include("templates.house.fitter")
</div>
<!-- ##### Call To Action Area Start ##### -->
    <section class="listings-content-wrapper section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="section-heading text-left wow fadeInUp" data-wow-delay="250ms">
                        <h2>@if (session::get('locale') == "en"){{ $objPages['name'] }}@else{{ $objPages['name_vn'] }}@endif</h2>
                    </div>
                    <div class="about-content">
                    @if (session::get('locale') == "en"){!! $objPages['content'] !!}@else{!! $objPages['content_vn'] !!}@endif
                    </div>
                </div>
                @include('templates.house.left_bar')
            </div>
        </div>
    </section>

    <section class="meet-the-team-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h2>Meet The Team</h2>
                        <p>Suspendisse dictum enim sit amet libero</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- Single Team Member -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-team-member mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Team Member Thumb -->
                        <div class="team-member-thumb">
                            <img src="{{ asset('/public/templates/house/img/bg-img/1.jpg') }}" alt="">
                        </div>
                        <!-- Team Member Info -->
                        <div class="team-member-info">
                            <div class="section-heading">
                                <img src="img/icons/prize.png" alt="">
                                <h2>Jeremy Scott</h2>
                                <p>Realtor</p>
                            </div>
                            <div class="address">
                                <h6><img src="img/icons/phone-call.png" alt=""> 0905.972.521</h6>
                                <h6><img src="img/icons/envelope.png" alt=""> danangresidence@gmail.com</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Team Member -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-team-member mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <!-- Team Member Thumb -->
                        <div class="team-member-thumb">
                            <img style="height: 460px" src="{{ asset('/public/templates/house/img/bg-img/2.jpg') }}" alt="">
                        </div>
                        <!-- Team Member Info -->
                        <div class="team-member-info">
                            <div class="section-heading">
                                <img src="img/icons/prize.png" alt="">
                                <h2>Maria Williams</h2>
                                <p>Realtor</p>
                            </div>
                            <div class="address">
                                <h6><img src="img/icons/phone-call.png" alt=""> 0905.972.521</h6>
                                <h6><img src="img/icons/envelope.png" alt=""> danangresidence@gmail.com</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-team-member mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <!-- Team Member Thumb -->
                        <div class="team-member-thumb">
                            <img style="height: 460px" src="{{ asset('/public/templates/house/img/bg-img/2.jpg') }}" alt="">
                        </div>
                        <!-- Team Member Info -->
                        <div class="team-member-info">
                            <div class="section-heading">
                                <img src="img/icons/prize.png" alt="">
                                <h2>Maria Williams</h2>
                                <p>Realtor</p>
                            </div>
                            <div class="address">
                                <h6><img src="img/icons/phone-call.png" alt=""> 0905.972.521</h6>
                                <h6><img src="img/icons/envelope.png" alt=""> danangresidence@gmail.com</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
