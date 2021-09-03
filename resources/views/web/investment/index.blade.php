@extends('layouts.web.app')

@section('intro')
    <section class="view intro">
        <div class="mask">
            <div class="row d-flex justify-content-center align-items-center h-100 mx-0 mx-sm-5">
                <div class="col-lg-8 col-xl-8  px-sm-2 mt-5 pt-5">
                    <h1 class="h4-responsive text-uppercase spacing-6 white-text wow  text-center text-sm-center fadeInLeft"
                        data-wow-delay="0.3s">
                        {!!__('web/investment/events.title')!!}
                    </h1>
                    <h5 class="subheading white-text  text-center text-sm-center font-weight-bold mb-xl-4 pb-xl-0 mb-md-3 pb-md-3 mb-4 wow fadeIn"
                        data-wow-delay=".4s">
                        {!!__('web/investment/events.subtitle')!!}
                    </h5>
                    <div class="row white-text">
                        <div class="d-sm-flex mobile-carousel">
                            @include('web.investment.events')
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4 pt-lg-4">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe data-src="https://player.vimeo.com/video/392076340?title=0&byline=0&portrait=0"
                                class="embed-responsive-item" frameborder="0" allow="autoplay; fullscreen"
                                allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section>
        <div class="row d-flex justify-content-center align-items-center h-100 pt-4 mt-4">
            <div class="col-md-7 col-sm-12 px-2 text-left">
                <h2 class="h4-responsive text-uppercase spacing-6 text-lime-green wow fadeInLeft"
                    data-wow-delay="0.3s">
                    {!!__('web/investment/index.smart_investment')!!}
                </h2>
            </div>
            <div class="col-md-5 col-sm-12">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe data-src="https://player.vimeo.com/video/408560107?title=0&byline=0&portrait=0"
                            class="embed-responsive-item" frameborder="0" allow="autoplay; fullscreen" allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </section>
    <section class="my-5 py-5">
        <h2 class="h4-responsive text-uppercase text-center spacing-6 text-lime-green wow fadeInLeft"
            data-wow-delay="0.3s">
            {!!__('web/investment/index.how_we_operate')!!}
        </h2>
        <div class="row d-flex justify-content-center align-items-center h-100 pt-4 mt-4">
            <div class="col-sm-12 col-md-7">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe data-src="https://player.vimeo.com/video/411654172?title=0&byline=0&portrait=0"
                            class="embed-responsive-item" frameborder="0" allow="autoplay; fullscreen" allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Broker's -->
    <section>
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <h4 class="mt-0 mb-1 text-lime-green text-uppercase spacing-6 text-sm-center ">
                    {!! __('web/investment/index.asset_manager') !!}
                </h4>
            </div>
            <div class="col-sm-12 col-md-4 text-center my-3 mt-sm-0">
                <img src="https://cdn.azellft.com/img/equiti.png" class="ml-3" width="250" alt="">
            </div>
            <div class="col-sm-12 col-md-4 text-sm-center text-md-center">
                <a href="https://www.equiti.com" target="_blank"
                   class="btn btn-lime-green btn-lg btn-rounded text-dark">
                    {!! __('web/investment/index.about_our_broker') !!}
                </a>
            </div>
        </div>
    </section>
    <!-- Section: Broker's -->

    <!-- Section: Product's -->
    <section>
        <div class="row">
            <div class="col-sm-6">
                <h5 class="text-center text-md-left text-lime-green  py-4 text-uppercase spacing-6"> {!! __('web/investment/products.title') !!}</h5>
                <div class="row">
                    <div class="col-12 mobile-carousel">
                        @each('web.investment.product', __('web/investment/products.content'), 'product')
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <h5 class="text-center text-md-right text-lime-green  py-4 text-uppercase spacing-6">Realmente
                    global</h5>
                <div class="row d-flex justify-content-center align-items-center h-100 mx-2  my-2 my-sm-0">
                    <div class="col-10 ">
                        <img src="https://cdn.azellft.com/img/world.png" class="img-fluid img-zoom" alt="smaple image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Product's -->


    <!-- Section: Testimonials -->
    <section>
        <div class="row align-items-center w-100 justify-content-center pt-5 mt-5 pt-sm-0 mt-sm-0">
            <div class="col-12 col-sm-6 ">
                @each('web.investment.testimonial', __('web/investment/testimonials'), 'testimonial')
            </div>
        </div>

    </section>
    <!-- Section: Testimonials -->

    {{-- Section: Constact Forms --}}
    @include("web.contact.forms")
    {{-- Section: Constact Forms --}}
@endsection


@section('scripts')
    <script defer src="{{ asset(mix('js/web/investment.js')) }}"></script>
    <script defer src="{{ asset(mix('js/web/contact.js')) }}"></script>


    <script type="text/javascript">

        function init() {
            var vidDefer = document.getElementsByTagName('iframe');
            for (var i = 0; i < vidDefer.length; i++) {
                if (vidDefer[i].getAttribute('data-src')) {
                    vidDefer[i].setAttribute('src', vidDefer[i].getAttribute('data-src'));
                }
            }
        }

        window.onload = init;
    </script>
@endsection
