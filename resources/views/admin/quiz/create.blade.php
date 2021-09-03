@extends('layouts.admin.app',['addRightSidebar' => true,'rightSidebarTitle'=>'Orden de las Preguntas'])


@section('right_sidebar_items')
    <ul class="collapsible collapsible-accordion" id="questions-menu"></ul>
@endsection

@section('content')



    <div class="container px-0 bg-tangaroa white-text rounded" id="quiz-wrapper">

        <div class="row mt-3">
            <div class="col-12 px-5">
                @include('_partials/breadcrumb',[
                  'routes' =>[
                      [
                          'description' => 'Cursos',
                          'url' => route('courses.index')
                      ],
                      [
                          'description' => $course->name,
                          'url' => route('courses.edit',$course->id)
                      ],
                      [
                          'description' => 'Cuestionario',
                      ]
                  ]
                ])
            </div>
        </div>

        <div class="p-3 px-lg-5 d-flex flex-column flex-md-row justify-content-between align-items-center rounded bg-tangaroa"
             id="myHeader">

            <div>
                <h1 class="font-weight-bolder">
                    @if(request()->route()->getName() === 'quiz.create') NUEVO @else EDITAR @endif CUESTIONARIO
                    <div class="font-small mt-1 font-italic font-weight-bold">
                        (Contenido en {{$languages[app()->getLocale()]}})
                    </div>
                </h1>

                <p class="mt-2">
                   <span class="bg-lime-green text-tangaroa font-weight-bold p-2 rounded d-block d-md-inline-block mr-md-3">
                     <i class="fas fa-bookmark text-tangaroa"></i>  {{$course->name}}
                   </span>
                    <span class="lead d-block d-md-inline-block mt-2 mt-md-0 pl-3 pl-md-0">
                      {{$chapter->title}}
                    </span>
                </p>
            </div>

            <div>
                @if(app()->getLocale() === 'es')
                    <button
                            type="button"
                            class="btn btn-lime-green text-tangaroa"
                            data-toggle="modal"
                            data-target="#addQuestionModal"
                    >
                        <i class="fas fa-question mr-2 text-tangaroa"></i> Nueva Pregunta
                    </button>
                @endif

                <button type="button"
                        id="btnSaveQuiz"
                        class="btn btn-lime-green text-tangaroa mt-2"
                >
                    <i class="fas fa-save mr-2 text-tangaroa"></i>Guardar
                </button>
            </div>

        </div>


        <!-- Modal -->
        <form id="addQuestionForm">
            <div class="modal fade" id="addQuestionModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="z-index: 99999;">
                <div class="modal-dialog " role="document">
                    <div class="modal-content bg-black-pearl">
                        <div class="modal-header">
                            <h3 class="modal-title font-weight-bold">Nuevo Reactivo</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">


                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="md-form">
                                        <input type="text"
                                               name="question"
                                               class="form-control white-text"
                                               data-parsley-required="true"

                                        >
                                        <label for="question">Pregunta</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="md-form">
                                        <input type="text"
                                               name="question_credits"
                                               class="form-control white-text"
                                               data-parsley-required="true"
                                               data-parsley-type="number"
                                        >
                                        <label for="question">Nº de puntos</label>
                                    </div>
                                </div>
                                <div class="col-12">


                                    {{Form::select('question_type',[
                                      'radio' =>'Radio',
                                      'checkbox' => 'Casillas de Verificación'
                                      ],
                                      null,
                                      [
                                      'class'=>'select-wrapper mdb-select md-form colorful-select dropdown-success',
                                      'placeholder'=>"Tipo de pregunta",
                                      'data-parsley-required' => true
                                      ])}}


                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-red" data-dismiss="modal">Cancelar</button>
                            <button type="submit"
                                    class="btn btn-lime-green text-tangaroa">
                                Agregar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <form id="frmSaveQuiz">
            <div class="module-content p-5">

                <section id="general">
                    <h2 class="font-weight-bold">GENERALES</h2>
                    <hr class="my-3 bg-white">


                    <div id="quiz-general"></div>


                </section>

                <section id="questionsSection" class="mt-5">


                    <h1 class="font-weight-bolder">PREGUNTAS</h1>
                    <hr class="my-3 bg-white">
                    <div id="questions"></div>

                </section>

            </div>
        </form>

    </div>

@endsection




@section('scripts')
    <script type="text/javascript" src="{{asset(mix('js/admin_panel/quiz/app.js'))}}"></script>
@endsection()
