@extends('layouts.admin.app')

@section('content')
    <div class="container bg-tangaroa white-text p-5 rounded">
        <div class="row">
            <div class="col-12">
                <h1 class="d-flex justify-content-between align-items-center">

                    <div>Roles</div>

                    @if(auth()->user()->hasPermissionTo('create_role') || auth()->user()->hasRole('Super Admin'))
                        <a href="{{route('roles.create')}}"
                           class="btn btn-lime-green text-tangaroa mt-3 mt-lg-0"
                        >
                            <i class="fas fa-plus text-tangaroa"></i> Nuevo
                        </a>
                    @endif
                </h1>
            </div>
        </div>


        <div class="row mb-3 justify-content-end mt-5 ">

            <div class="col-4 text-left">
                {{Form::select('',$statusSelect,'',['class'=>'mdb-select md-form dropdown-success pt-2','id'=>"roleStatus"])}}
                <label class="mdb-main-label" for="roleeStatus">Status</label>
            </div>
        </div>

        {!! $dataTable->table(['width' => '100%']) !!}
    </div>

@endsection

@section('scripts')

    {!! $dataTable->scripts() !!}
    <script type="text/javascript" src="{{asset(mix('js/admin_panel/role/index.js'))}}"></script>

@endsection()
