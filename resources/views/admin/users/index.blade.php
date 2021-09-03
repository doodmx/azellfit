@extends('layouts.admin.app')
@section('content')

    @include('admin.users.modals.profile')
    @include('admin.users.modals.account_verification')
    @include('admin.users.modals.reset_password')
    @include('admin.users.modals.change_role')


    <div class="container bg-tangaroa white-text p-5 rounded">
        <div class="row">
            <div class="col-12">
                <h2 class="text-ce-soir mb-3">
                    Usuarios
                </h2>
            </div>
        </div>

        <div class="row justify-content-end">
            <div class="col-sm-4">
                {{ Form::select('role',$roleSelect, 'Partner',[
                    'id' =>'selectRole',
                    'class' => 'mdb-select md-form dropdown-success pt-2 my-0'
                ]) }}
                <label class="mdb-main-label" for="selectRole">Status:</label>
            </div>
            <div class="col-sm-4">
                {{ Form::select('partner',$partners, null,[
                    'id' =>'selectPartner',
                    'class' => 'mdb-select md-form dropdown-success pt-2 my-0',
                    'placeholder'=>'Ver todos',
                    'searchable' => 'Buscar partner...'
                ]) }}
                <label class="mdb-main-label" for="selectRole">Partner:</label>
            </div>
        </div>
        {!! $dataTable->table(['width' => '100%']) !!}
    </div>

@endsection

@section('styles')
    {{Html::style('https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.9.2/jquery.contextMenu.min.css')}}
@endsection
@section('scripts')
    {{ Html::script("https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.9.2/jquery.contextMenu.min.js") }}
    {{ Html::script("https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.9.2/jquery.ui.position.min.js") }}

    {!! $dataTable->scripts() !!}
    <script type="text/javascript" src="{{asset(mix('js/admin_panel/user/index/app.js'))}}"></script>
@endsection
