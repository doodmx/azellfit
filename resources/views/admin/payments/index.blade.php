@extends('layouts.admin.app')

@section('content')

    @include('admin.payments.email')

    <div class="container bg-tangaroa white-text p-5 rounded">
        <div class="row">
            <div class="col-12">
                <h2 class="text-ce-soir mb-3">
                    Histórico de Pagos
                </h2>
            </div>
        </div>

        <div class="row mb-3 justify-content-end mt-5 ">
            <div class="col-4 text-left">
                {{Form::select('',$currencies,null,['class'=>'mdb-select md-form dropdown-success pt-2','id'=>"currencySelect",'multiple','searchable'=>'Buscar moneda...'])}}
                <label for="courseTypeSelect" class="mdb-main-label">Moneda</label>
            </div>


            <div class="col-4 text-left">
                {{Form::select('',['paid'=>'Pagados','all'=>'pendientes'],null,['class'=>'mdb-select md-form dropdown-success pt-2','id'=>"paymentStatus",'placeholder'=>"Ver todos"])}}
                <label class="mdb-main-label" for="courseStatus">Status</label>
            </div>
        </div>

        {!! $dataTable->table(['width' => '100%']) !!}
    </div>

@endsection

@section('scripts')

    {!! $dataTable->scripts() !!}
    <script type="text/javascript" src="{{asset(mix('js/admin_panel/payments/index.js'))}}"></script>

@endsection()
