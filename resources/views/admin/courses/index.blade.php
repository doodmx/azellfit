@extends('layouts.admin.app')





@section('content')
    <div class="container bg-tangaroa white-text p-5 rounded">
        <div class="row">
            <div class="col-12">
                <h1 class="d-flex justify-content-between align-items-center">

                    <div>
                        <div>Cursos</div>
                        <div class="font-small mt-1 font-italic font-weight-bold">
                            (Contenido en {{$languages[app()->getLocale()]}})
                        </div>
                    </div>

                    @if(auth()->user()->hasPermissionTo('create_course') || auth()->user()->hasRole('Super Admin') && app()->getLocale() === 'es')
                        <a href="{{route('courses.create')}}"
                           class="btn btn-lime-green text-tangaroa mt-3 mt-lg-0"
                        >
                            <i class="fas fa-plus text-tangaroa"></i> Nueva
                        </a>
                    @endif
                </h1>
            </div>
        </div>

        @if(session()->has('course_error'))
            <div class="alert alert-danger mb-5">
                {{session()->get('course_error')}}
            </div>
        @endif

        <div class="row mb-3 justify-content-end mt-5 ">
            <div class="col-4 text-left">
                {{Form::select('',$courseTypeSelect,null,['class'=>'mdb-select md-form dropdown-success pt-2','id'=>"courseTypeSelect",'multiple','searchable'=>'Buscar categoría...'])}}
                <label for="courseTypeSelect" class="mdb-main-label">Categorías</label>
            </div>


            <div class="col-4 text-left">
                {{Form::select('',$statusSelect,'',['class'=>'mdb-select md-form dropdown-success pt-2','id'=>"courseStatus"])}}
                <label class="mdb-main-label" for="courseStatus">Status</label>
            </div>
        </div>

        {!! $dataTable->table(['width' => '100%']) !!}
    </div>

    <a href="" id="localData" data-quiz_stored="{{request()->has('quizSaved')}}"></a>

@endsection

@section('scripts')

    {!! $dataTable->scripts() !!}
    <script type="text/javascript" src="{{asset(mix('js/admin_panel/course/index.js'))}}"></script>

@endsection()
