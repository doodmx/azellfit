@extends('layouts.web.app')
@section('content')


    @include('admin.users.modals.profile')

    <div class="container bg-tangaroa white-text pt-5  mt-5 rounded">
        <div class="row">
            <div class="col-12">
                <h2 class="text-ce-soir mb-3">
                    {{__('my_investors.list')}}
                    <a href="{{route('investments.create')}}"
                       class="btn btn-lime-green text-tangaroa waves-effect waves-light float-right clearfix">
                        <i class="fas fa-plus text-tangaroa"></i>
                        {{__('my_investors.add')}}
                    </a>
                </h2>
            </div>
        </div>

        <div class="row pb-5">
            <div class="col">
                {!! $dataTable->table(['width' => '100%']) !!}
            </div>
        </div>
    </div>

    <a href="#" id="localData" data-role="{{auth()->user()->roles[0]->name}}"></a>
@endsection

@section('styles')
    {{Html::style('https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css')}}
    {{Html::style('https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.9.2/jquery.contextMenu.min.css')}}
@endsection
@section('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    {{ Html::script("https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.9.2/jquery.contextMenu.min.js") }}
    {{ Html::script("https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.9.2/jquery.ui.position.min.js") }}

    {!! $dataTable->scripts() !!}


    <script type="text/javascript" src="{{asset(mix('js/admin_panel/user/index/app.js'))}}"></script>

@endsection
