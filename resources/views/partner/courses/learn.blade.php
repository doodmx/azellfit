@extends('layouts.web.app')

@section('content')



    <div class="main-content">


        @include('_partials/breadcrumb',[
            'routes' =>[
                [
                    'description' => 'Mis Cursos',
                    'url' => route('web.enrolls')
                ],
                [
                    'description' => $enroll->course->name
                ]
            ]
        ])


        @if(request()->session()->has('enroll_success'))

            <div class="alert alert-lime-green" role="alert">
                {{session('enroll_success')}}
            </div>

        @endif

        @if(request()->session()->has('enroll_error'))

            <div class="alert alert-danger" role="alert">
                {{session('enroll_error')}}
            </div>

        @endif


        <div class="card bg-tangaroa">
            >
            <div class="card-body px-0">

                <div class="px-5">
                    <h1 class="text-lime-green d-flex flex-column flex-lg-row justify-content-between ">
                        {{$enroll->course->name}}



                        @if($enroll->approval_certificate === null)
                            <a href="{{route('web.enrolls.quiz',$enroll->id)}}"
                               class="btn btn-lime-green text-tangaroa mt-3 mt-lg-0 {{$enroll->chapter_progress < 100 ? 'd-none':''}} btn-cert">
                                <i class="fas fa-file-pdf mr-2"></i>
                                {{__('courses/learn.certificate')}}
                            </a>
                        @endif

                        @if(!empty($enroll->approval_certificate))
                            <a href="{{asset($enroll->approval_certificate)}}"
                               download="{{clean_file_name(auth()->user()->profile->lastname.' '.auth()->user()->profile->name)}}"
                               class="btn btn-lime-green text-tangaroa mt-3 mt-lg-0">
                                <i class="fas fa-download mr-2"></i>
                                {{__('courses/learn.download_certificate')}}

                            </a>

                        @endif


                    </h1>


                    <div class="my-3">
                        <div class="progress">
                            <div class="progress-bar bg-lime-green progress-bar-striped progress-bar-animated"
                                 role="progressbar"
                                 aria-valuenow="{{$enroll->chapter_progress}}"
                                 aria-valuemin="0"
                                 aria-valuemax="100"
                                 style="width: {{$enroll->chapter_progress}}%;">
                            </div>
                        </div>
                        <p class="text-small text-right white-text mt-0">
                            <span class="progress-percentage">{{$enroll->chapter_progress}}%</span>
                        </p>
                    </div>


                    <p class="lead white-text mt-3">
                        {{$enroll->course->excerpt}}
                    </p>
                </div>


                <div class="row mt-5 no-gutters">
                    <div class="col-12">
                        <div class="embed-responsive embed-responsive-16by9 video-container">
                            <iframe src="https://player.vimeo.com/video/392076340?title=0&byline=0&portrait=0"
                                    class="embed-responsive-item w-100 video"
                                    frameborder="0"
                                    allow="autoplay; fullscreen"
                                    webkitallowfullscreen
                                    mozallowfullscreen
                                    allowfullscreen
                            >
                            </iframe>

                            <div class="video-controls">

                                <div class="title bg-lime-green text-tangaroa font-weight-bold p-2 m-1 m-lg-3">

                                </div>

                                <div class="controls">
                                    <div class="control control-prev">
                                        <i class="fa fas fa-step-backward"></i>
                                    </div>
                                    <div class="control play-control">
                                        <i class="fa fas fa-play-circle"></i>
                                    </div>

                                    <div class="control control-next">
                                        <i class="fa fas fa-step-forward"></i>
                                    </div>
                                </div>


                            </div>

                            <div class="next-video d-none">

                                <h3 class="text-lime-green title">

                                </h3>
                                <div class="next-progress">
                                    <div class="circle">
                                        <i class="fas fa-step-forward text-lime-green"></i>
                                    </div>
                                </div>

                                <button class="btn btn-outline btn-lime-green btn-sm mt-3">
                                    {{__('courses/learn.cancel')}}

                                </button>

                            </div>

                        </div>
                    </div>

                </div>

                @include('_partials/course/detail/content',['course'=> $enroll->course])
            </div>
        </div>


    </div>
    <a href="#"
       id="localData"
       data-enroll="{{$enroll->id}}"
       data-chapters="{{$enroll->course->chapters_tree}}"
    ></a>
@endsection


@section('styles')
    {{Html::style(asset(mix('css/web/course/learn.css')))}}
@endsection


@section('scripts')
    <script src="{{ asset(mix('js/web/course/learn/app.js')) }}"></script>
@endsection
