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
                    'url' => route('web.enrolls.course',request()->segment(2)),
                    'description' => $quiz->chapter->course->name
                ],
                [
                    'description' =>'Cuestionario de certificación'
                ]
            ]
        ])

        <div class="card">
            <div class="card-header bg-tangaroa p-3" id="myHeader">


                <h1 class="text-lime-green mb-0 d-flex justify-content-between">
                    <div>
                        <div class="d-block">
                            {{$quiz->localized_name}}
                        </div>
                        <div class="d-block lead white-text">
                            {{$quiz->total_credits}} {{__('courses/quiz.points')}}
                        </div>
                    </div>
                    <button type="button" class="btn btn-lime-green text-tangaroa font-weight-bold" id="saveQuiz">
                        {{__('courses/quiz.send')}}
                    </button>
                </h1>

            </div>
            <div class="card-body bg-black-pearl p-5">

                <h3 class="text-lime-green">
                    {{__('courses/quiz.advice_copy')}}  {{$quiz->credits_to_approve}}   {{__('courses/quiz.points')}}
                </h3>
                <p class="lead white-text mt-2">
                    {{__('courses/quiz.briefing')}}: {{$quiz->localized_briefing}}
                </p>

                {{Form::open(['id'=>'frmQuiz','url'=>route('web.enrolls.quiz.store',request()->segment(2)),'data-parsley-validate' => true,'class'=>'mt-5'])}}


                @foreach($quiz->questions as $question)
                    <div class="row {{$loop->index > 0 ? 'mt-5':''}}">

                        <div class="col-12">
                            <h5 class="text-lime-green mb-1 d-flex flex-column flex-lg-row justify-content-between align-items-center">
                                <div>
                                    {{$loop->index+1}}.- {{$question->localized_name}}
                                </div>

                                <div class="bg-lime-green text-tangaroa font-weight-bold rounded p-1 mt-3 mt-lg-0">
                                    {{$question->credits}} {{__('courses/quiz.points')}}
                                </div>
                            </h5>


                            @if($question->type === 'radio')
                                @foreach($question->options as $option)

                                    <label class="has-error" id="error{{$question->id}}radio-a{{$option->id}}"></label>
                                    <div class="form-check mt-3">
                                        <input
                                                id="q{{$question->id}}radio-a{{$option->id}}"
                                                name="answers[{{$question->id}}][]"
                                                data-question="{{$question->id}}"
                                                data-answer="{{$option->id}}"
                                                class="form-check-input question-option"
                                                type="radio"
                                                value="true"
                                                data-parsley-required="true"
                                                data-parsley-errors-container="#error{{$question->id}}radio-a{{$option->id}}"
                                        >
                                        <label class="form-check-label white-text"
                                               for="q{{$question->id}}radio-a{{$option->id}}">
                                            {{$option->localized_option}}
                                        </label>
                                    </div>
                                @endforeach
                            @endif


                            @if($question->type === 'checkbox')
                                @foreach($question->options as $option)
                                    <label class="has-error" id="error{{$question->id}}check-a{{$option->id}}"></label>
                                    <div class="form-check mt-3">
                                        <input
                                                id="q{{$question->id}}check-a{{$option->id}}"
                                                name="answers[{{$question->id}}][]"
                                                data-question="{{$question->id}}"
                                                data-answer="{{$option->id}}"
                                                class="form-check-input question-option"
                                                type="checkbox"
                                                value="true"
                                                data-parsley-required="true"
                                                data-parsley-errors-container="#error{{$question->id}}check-a{{$option->id}}"
                                        >
                                        <label class="form-check-label white-text"
                                               for="q{{$question->id}}check-a{{$option->id}}">
                                            {{$option->localized_option}}
                                        </label>
                                    </div>
                                @endforeach
                            @endif

                        </div>


                        <hr class="bg-zircon">

                    </div>


                @endforeach
                {{Form::close()}}
            </div>
        </div>

    </div>
    <a href="#"
       id="localData"
       data-quiz="{{$quiz}}"
       data-enroll="{{request()->segment(2)}}">
    </a>
@endsection

@section('scripts')
    <script src="{{asset(mix('js/web/course/quiz/app.js'))}}"></script>
@endsection
