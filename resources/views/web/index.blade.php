@extends('layouts.web.app')
@section('intro')
    <section class="view view-home intro">
        <div class="mask">
            <div class="row d-flex justify-content-center align-items-center h-100 mx-md-5">
                <div class="col-sm-12 col-md-6 col-lg-5 text-center text-md-right">
                    <h1 class="text-lime-green spacing mb-4 display-4 wow fadeInLeft">
                        Invest better,
                        <br>
                        <span>live better.</span>
                    </h1>
                </div>
                <div class="col-md-6 col-lg-7 px-sm-5">
                    <img src="https://cdn.azellft.com/img/hexagons.png" class="img-fluid img-zoom wow fadeIn" alt="Azell">
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <!-- Section: Ours -->
    <section>
        <!-- Grid row -->
        <div class="row wrap align-items-center">
            <div class="col-lg-5 col-md-12 mb-2 mr-auto wow fadeIn" data-wow-delay=".4s">
                <h2 class="h2 font-weight-bolder white-text text-uppercase wow fadeIn" data-wow-delay=".2s">
                    {!! __('web/index/about_us.title') !!}
                </h2>
                {!! __('web/index/about_us.content') !!}
            </div>
            <!-- Grid column -->
            <div class="col-lg-6 col-md-12 mb-4 wow fadeIn" data-wow-delay=".4s">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe data-src="https://player.vimeo.com/video/416545442?title=0&byline=0&portrait=0"
                            class="embed-responsive-item" frameborder="0" allow="autoplay; fullscreen" allowfullscreen>
                    </iframe>
                </div>
            </div>
            <!-- Grid column -->
        </div>

    </section>
    <!-- Section: Ours -->

    <!-- Section: Our Value Proposal -->
    <section class="my-5">
        <h2 class="h2 font-weight-bolder text-uppercase text-center white-text wow fadeIn" data-wow-delay=".4s">
            {!! __('web/index/proposal.title') !!}
        </h2>
        <div class="row mt-5">
            @each('web.index.proposal', __('web/index/proposal.content'), 'proposal')
        </div>
    </section>
    <!-- Section: Our Value Proposal -->
@endsection

@section('scripts')

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
