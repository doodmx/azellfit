@extends('layouts.web.app')



@section('intro')
    <section>
        <div style="height: 500px;">
            <img src="{{asset('storage/'.$blog->detail_image)}}"
                 style="height:100%; width: 100%;object-fit:cover; object-position: center" alt="{{$blog->title}}">
        </div>
    </section>
@endsection


@section('content')

    <div class="container-fluid mt-md-0 mt-5 mb-5">

        <div class="card pb-5 bg-transparent" style="margin-top: -100px;">

            <div class="card-body bg-black-pearl white-text p-0">
                <!-- Grid row -->
                <div class="row no-gutters position-relative">

                    <!-- Blog Content -->
                    <div class="col-lg-8 col-12">
                        <!-- Card -->
                        <div class=" pb-5">
                            <div class="card-body">

                                <div class="container">

                                    <!-- Section heading -->
                                    <h1 class="text-center h1 pt-4 mb-3">
                                        <strong>{{$blog->title}}</strong>
                                    </h1>

                                    <div class="row">
                                        <div class="col-md-12 col-xl-12 d-flex justify-content-center">
                                            <p class="font-small  mb-1">
                                                <strong>{!! __('web/blog.written_by') !!}</strong> {{$blog->author}}</p>
                                            <p class="font-small grey-text mb-0 ml-3">
                                                <i class="far fa-clock-o dark-grey-text"></i> {{$blog->date_to_publish->format('d F Y')}}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            @include('_partials/blog/tag_list')
                                        </div>
                                    </div>

                                    <!-- Grid row -->
                                    <div class="row pt-lg-5 pt-3">
                                        <div class="col-md-12 col-xl-12">
                                            {!! $blog->content !!}
                                        </div>
                                    </div>
                                    <!-- Grid row -->

                                </div>
                            </div>

                        </div>
                        <!-- Card -->
                    </div>
                    <!-- Grid column -->


                    <!-- Blog Sidebar -->
                    <div class="col-lg-4 col-12 shadow" >

                        <div class="container">

                            <!-- Section: Search Input -->
                            <section class="section mb-5">
                                @include('_partials/blog/search_input')
                            </section>
                            <!--  Section: Search input -->

                            <!-- Section: Related posts -->
                            <section class="section widget-content">
                                @include('_partials/blog/related_posts')
                            </section>
                            <!--  Section: Related posts -->


                            <!-- Section: Categories -->
                            <section class="section mb-5">
                                @include('_partials/blog/category_list')
                            </section>
                            <!-- Section: Categories -->

                            <!-- Section: Tags -->
                            <section class="section mb-5">
                                @include('_partials/blog/tag_list')
                            </section>
                            <!-- Section: Tags -->

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Grid row -->
    @include('web.contact.forms')
@endsection()

@section('styles')
    {{Html::style(asset(mix('css/web/blog.detail.css')))}}
@endsection

@section('scripts')
    <script src="{{ asset(mix('js/web/contact.js')) }}"></script>
@endsection





