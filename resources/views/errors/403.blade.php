@extends('layouts.errors')
@section('content')

    <div class="card bg-dark rounded mx-5 mx-md-0">
        <div class="card-body p-0 text-center">

            <img class="logo mt-5" src="{{asset('img/azell_logo.png')}}" alt="AzellFt Inversiones Inteligentes">
            <div class="px-5">
                <h1 class="mt-3 orange-text font-weight-bold display-1">403</h1>
                <h3 class="orange-text">
                    @if(!empty($exception->getMessage()))
                        {{$exception->getMessage()}}
                    @else
                        No tienes autorización para acceder a esta característica del sistema
                    @endif
                </h3>


            </div>

            <a href="{{route('home')}}" class="btn btn-lg btn-block btn-green mt-5">
                <i class="fas fa-home"></i> Ir a Inicio
            </a>

        </div>
    </div>
@endsection
