@extends('layouts.admin.app')


@section('content')
    <div class="container bg-tangaroa white-text p-5 rounded">
        <div class="row">
            <div class="col-12">
                <h1 class="d-flex justify-content-between align-items-center">

                    <div>
                        <div>Categorías de Cursos</div>
                        <div class="font-small mt-1 font-italic font-weight-bold">
                            (Contenido en {{$languages[app()->getLocale()]}})
                        </div>
                    </div>

                    @if(auth()->user()->hasPermissionTo('create_course_category') || auth()->user()->hasRole('Super Admin') && app()->getLocale() === 'es')
                        <a href="{{route('course_types.create')}}"
                           class="btn btn-lime-green text-tangaroa mt-3 mt-lg-0"
                        >
                            <i class="fas fa-plus text-tangaroa"></i> Nueva
                        </a>
                    @endif
                </h1>
            </div>
        </div>

        <div class="row mb-3 justify-content-end">
            <div class="col-4 text-left">

                <label class="mdb-main-label" for="courseTypeStatus">Categoría</label>
                {{ Form::select('',$statusSelect, null,[
                    'id' =>'courseTypeStatus',
                    'class' => 'mdb-select md-form dropdown-success pt-2'
                ]) }}
            </div>
        </div>

        {!! $dataTable->table(['width' => '100%']) !!}
    </div>



@endsection

@section('scripts')

    {!! $dataTable->scripts() !!}
    <script type="text/javascript" src="{{asset(mix('js/admin_panel/course_type/index.js'))}}"></script>

@endsection
