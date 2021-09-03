@extends('layouts.admin.app')
@section('content')
    <div class="container bg-tangaroa white-text p-5 rounded">
        <div class="row">
            <div class="col-12 p-0 m-0">
                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center">
                    <h2 class="text-ce-soir">Nuevo Curso</h2>

                    <div class="mt-3 mt-lg-0">
                        @include('_partials/breadcrumb',[
                           'routes' =>[
                               [
                                   'description' => 'Cursos',
                                   'url' => route('courses.index')
                               ],
                               [
                                   'description' => 'Nuevo'
                               ]
                           ]
                         ])
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 p-0 m-0">


                <!--Card -->
                <div class="bg-tangaroa  p-0 m-0" id="cardCourse">
                    <!--Card content -->
                    <div class="card-body p-0">
                        <!-- course  form -->
                    {{ Form::open([
                        'id' => 'frmCourse',
                        'data-parsley-validate'=>true,
                        'data-action'=>route('courses.store')
                    ]) }}

                    {{ Form::hidden('_method','POST') }}
                    @include('admin.courses.fields')

                    {{ Form::close() }}
                    <!-- course form -->
                    </div>
                </div>
                <!--Card -->
            </div>
        </div>
        @endsection

        @section('scripts')
            <script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
            <script src="{{ asset(mix('js/admin_panel/course/app.js')) }}"></script>
@endsection()
