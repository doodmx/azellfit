@extends('layouts.admin.app')
@section('content')
    {{ Form::open([
          'id' => 'frmRole',
          'data-parsley-validate'=>true,
          'data-action'=>route('roles.store')
      ])
   }}

    <div class="container px-0 bg-tangaroa white-text rounded">

        <div class="row mt-3">
            <div class="col-12 px-5">
                @include('_partials/breadcrumb',[
                  'routes' =>[
                      [
                          'description' => 'Roles',
                          'url' => route('roles.index')
                      ],
                      [
                          'description' =>'Nuevo ',

                      ]
                  ]
                ])
            </div>
        </div>
        <div class="p-3 px-lg-5 d-flex flex-column flex-md-row justify-content-between align-items-center rounded bg-tangaroa"
             id="myHeader">


            <h1 class="font-weight-bolder">
                Crear Rol
            </h1>


            <button type="button" class="btn btn-lime-green text-tangaroa btn-medium" id="btnSaveRole">
                <i class="fa fa-save text-tangaroa"></i> Guardar
            </button>


        </div>

        <div class="row">
            <div class="col-12 p-0 m-0">
                <!--Card -->
                <div class="px-5 m-0" id="roleCard">
                    <!--Card content -->
                    <div class="card-body p-0">
                        <!-- Role  form -->

                    {{ Form::hidden('_method','POST') }}
                    @include('admin.roles.fields')



                    <!-- Role form -->
                    </div>
                </div>
                <!--Card -->
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection

@section('scripts')
    <script src="{{ asset(mix('js/admin_panel/role/app.js')) }}"></script>
@endsection()
