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
                    'description' => $enroll->course->name,
                    'url' => route('web.enrolls.course', [$enroll->id])
                ],
                [
                    'description' => 'Mapa General'
                ]
            ]
        ])

        <div class="container-fluid">
        <section class="section ">
            <div class="row canvas">
            @foreach($enroll->course->chapters_tree as $chapter)
                <!--Grid column-->
                    <div class="col-lg-4 col-md-12 mb-4 ">
                        <!--Card-->
                        <div class="object">
                            <div class="avatar mx-auto p-3">
                                <img src="{{ asset($chapter->icon) }}"
                                     alt="avatar mx-auto white" class="img-fluid">
                            </div>
                            {{--
                            <div class="avatar mx-auto  text-center ">
                                <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(27).jpg" alt="avatar mx-auto white" class="rounded-circle img-fluid" width="90">
                            </div>
                            --}}
                            <div class="card testimonial-card bg-transparent white-text mt-0">
                                <!--Avatar-->
                                <div class="card-body m-3">
                                    <!--Name-->
                                    <h5 class="card-title">{{$chapter->title}}</h5>
                                    <div class="card-footer text-muted text-center py-0 my-0">
                                        <a class="px-2 fa-lg li-ic   " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-chevron-down text-lime-green"></i>
                                        </a>
                                        <div class="dropdown-menu  dropdown-menu-center">
                                            @foreach($chapter->nodes as $children)
                                                <a class="dropdown-item btn-account-verification">
                                                    <i class="fas fa-check"></i> {{$children->title}}
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
    {{--Html::style('https://www.jqueryscript.net/demo/Flow-Chart-Plugin-jQuery-Bootstrap/css/simple-flow.min.css')--}}
    {{Html::style(mix('css/plugins/simple-flow/simple-flow.css'))}}
    {{Html::style(mix('css/web/course/progress.css'))}}
@endsection
@section('scripts')
    {{ Html::script(mix('js/plugins/simple-flow/simple-flow.js')) }}
    {{ Html::script(mix('js/web/course/progress/app.js')) }}
@endsection
