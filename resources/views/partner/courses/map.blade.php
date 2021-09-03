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
        <h1 class="text-lime-green d-flex flex-column flex-lg-row justify-content-between ">
            {{$enroll->course->name}}
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
        <div class="container-fluid">
            <section class="section ">
                <div class="row canvas">
                @foreach($enroll->course->chapters_tree as $chapter)
                    <!--Grid column-->
                        <div class="col-lg-4 col-md-12 mb-4 ">
                            <!--Card-->
                            <div class="object">
                                <div class="avatar mx-auto p-3">
                                    <img src="{{ asset('storage/'.$chapter->icon) }}"
                                         alt="avatar mx-auto white" class="img-fluid">
                                </div>

                                <div class="card testimonial-card bg-transparent white-text mt-0 position-relative">
                                    <!--Avatar-->
                                    <div class="card-body m-3">
                                        <!--Name-->
                                        <h5 class="card-title">
                                            @if(app()->getLocale() === 'es')
                                                {{$chapter->original_title}}
                                            @else
                                                {{$chapter->localized_title}}
                                            @endif
                                        </h5>

                                        <div class="card-footer text-muted text-center py-0 my-0">
                                            <a class="px-2 fa-lg li-ic"
                                               data-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false"
                                            >
                                                <i class="fas fa-chevron-down text-lime-green"></i>
                                            </a>
                                            <div class="dropdown-menu  dropdown-menu-center">
                                                <a href="{{route('web.enrolls.course',[$enroll->id]).'#chapterId='.$chapter->id}}"
                                                   class="dropdown-item btn-account-verification"
                                                >
                                                    <i class="fas fa-check"></i>
                                                    @if(app()->getLocale() === 'es')
                                                        {{$chapter->original_title}}
                                                    @else
                                                        {{$chapter->localized_title}}
                                                    @endif
                                                </a>
                                                @foreach($chapter->nodes as $children)
                                                    <a href="{{route('web.enrolls.course',[$enroll->id]).'#chapterId='.$children->id}}"
                                                       class="dropdown-item btn-account-verification">
                                                        <i class="fas fa-check"></i>

                                                        @if(app()->getLocale() === 'es')
                                                            {{$children->original_title}}
                                                        @else
                                                            {{$children->localized_title}}
                                                        @endif

                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Card-->
                        </div>
                        <!--Grid column-->
                    @endforeach
                </div>
            </section>
        </div>
    </div>
@endsection

@section('styles')
    {{Html::style(mix('css/plugins/simple-flow/simple-flow.css'))}}
    {{Html::style(mix('css/web/course/progress.css'))}}
@endsection
@section('scripts')
    {{--
    icons for later:
        https://www.flaticon.com/free-icon/lock_2913133?term=secure&page=1&position=73
        https://www.flaticon.com/free-icon/checked_214353

    See:
     https://www.jqueryscript.net/chart-graph/Flow-Chart-Plugin-jQuery-Bootstrap.html
     http://tutorials.jenkov.com/svg/marker-element.html

     Demo:
        https://www.jqueryscript.net/demo/Flow-Chart-Plugin-jQuery-Bootstrap
    --}}
    {{ Html::script(mix('js/plugins/simple-flow/simple-flow.js')) }}
    {{ Html::script(mix('js/web/course/progress/app.js')) }}
@endsection
