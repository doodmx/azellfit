@extends('layouts.errors')
@section('content')

    <div class="row justify-content-center align-items-center  p-5">
        <div class="col-sm-6 text-left">
            <h1 class="display-2 white-text">Oops!
            </h1>


            <h3 class="white-text">
                Vaya, parece que no podemos encontrar la página que estás buscando.</h3>

            <p class="h6 white-text">Error 404</p>
            <a href="{{route('index')}}" type="button"
               class="btn btn-outline-success btn-rounded waves-effect">
                Ir a Inicio
            </a>
        </div>
        <div class="col-sm-6">
            <img src="{{asset('img/empty_404.svg')}}" class="img-fluid" alt="404 error">
        </div>
    </div>

{{--
    <div class="card bg-dark rounded mx-5 mx-md-0">
        <div class="card-body p-0 text-center">

            <img class="logo mt-5" src="{{asset('img/azell_logo.png')}}" alt="AzellFt Inversiones Inteligentes">
            <div class="px-5">
                <h1 class="mt-3 red-text font-weight-bold display-1">404</h1>
                <h3 class="red-text">
                    La página solicitada no se ha encontrado.
                </h3>

            </div>

            <a href="{{route('index')}}" class="btn btn-lg btn-block btn-green mt-5">
                <i class="fas fa-home"></i> Ir a Inicio
            </a>

        </div>
    </div>
    --}}
@endsection
