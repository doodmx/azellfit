@extends('layouts.web.app')

@section('content')

    @include('_partials/course/rate_modal')

    <div class="main-content">

        @if(session()->has('learning_success'))
            <div class="alert alert-success">
                {{session()->get('learning_success')}}
            </div>
        @endif
        <h1 class="text-lime-green font-weight_bolder">
            {{__('courses/enrolls_index.my_courses')}}
        </h1>


        @if($enrolls->count() === 0)

            <div class="mt-5 text-center text-lime-green main-content">
                <i class="fas fa-book fa-5x"></i>
                <h2 class="mt-3">
                    {{__('courses/enrolls_index.enroll_copy')}}
                </h2>
                <a href="{{route('web.courses.all')}}"
                   class="btn btn-lime-green text-tangaroa font-weight-bold btn-lg mt-3">
                    {{__('courses/enrolls_index.enroll_button')}}

                </a>
            </div>
        @endif
        <div class="row wrap">
            @foreach($enrolls as $enroll)


                <div class="col-12 col-md-6 col-xl-4 my-3">
                    @include('_partials/course/card',[
                     'course'=>$enroll->course,
                     'rate' => $enroll->rate,
                     'progress' => $enroll->chapter_progress,
                     'route' =>route('web.enrolls.course.map',$enroll->id)
                    ])
                </div>
            @endforeach
        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{ asset(mix('js/web/course/index.js')) }}"></script>
@endsection
