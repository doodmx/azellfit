@extends('layouts.web.app')



@section('styles')
    {{Html::style(asset(mix('css/web/welcome.css')))}}
@endsection

@section('intro')

    <div class="d-flex justify-content-center align-items-center welcome">
        <div class="welcome-card text-white d-flex flex-column align-items-center justify-content-between bg-white rounded bg-dark  mx-5 mx-md-0">

            <img class="logo d-block mx-auto mt-4" src="{{asset('img/azell_logo.png')}}"
                 alt="AzellFt Inversiones Inteligentes">

            <div class="px-5 text-center">
                <h1 class="font-weight-bold mt-2">Cursos en construcción</h1>
                <p class="green-text lead font-weight-bold mt-1 text-center">
                    Nos encontramos preparando los mejores cursos de capacitación para certificarte como promotor de
                    <strong>Azell</strong> .
                </p>

            </div>

            <a href="https://api.whatsapp.com/send?phone=524271822721&text=Informes%20Capacitacion%20Azell"
               target="_blank"
               class="btn btn-lg btn-block btn-green mt-4"
            >
                <i class="fab fa-whatsapp"></i> Comunicarme
            </a>

        </div>
    </div>

@endsection
