@extends('layouts.admin.app')
@section('content')
    <div class="container bg-tangaroa white-text p-5 rounded">

        <div class="row">
            <div class="col-12 p-0 m-0">
                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center">
                    <h2 class="text-ce-soir">Editar Categoría</h2>

                    <div class="mt-3 mt-lg-0">
                        @include('_partials.breadcrumb',[
                           'routes' =>[
                               [
                                   'description' => 'Categorías',
                                   'url' => route('course_types.index')
                               ],
                               [
                                   'description' => $courseType->name
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
                        <!-- coursetype  form -->
                    {{ Form::open([
                        'id' => 'frmCourseType',
                        'data-parsley-validate'=>true,
                        'data-id'=>request()->segment(3)
                    ]) }}

                    {{ Form::hidden('_method','PATCH') }}
                    @include('admin.courses.course_types.fields')

                    {{ Form::close() }}


                    <!-- courseType form -->
                    </div>
                </div>
                <!--Card -->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset(mix('js/admin_panel/course_type/app.js')) }}"></script>
@endsection()
