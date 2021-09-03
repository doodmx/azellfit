@extends('layouts.web.app')

@section('title')
    <title>Azell FT | Registro</title>
@endsection

@section('intro')

@endsection

@section('content_without_section')
    <div class="main-content d-flex justify-content-center align-items-center mb-5">

        <div class="container-fluid px-5">
            <div class="row align-items-center justify-content-between register">
                <!-- LEAD TEXT -->
                <div class="col-12 col-lg-6 text-center text-md-left lead-container p-3">
                    @if(auth()->guest())
                        <h1 class="text-lime-green font-weight-bold wow fadeInLeft" data-wow-delay=".3s">
                            {!! __('web/register.title') !!}
                        </h1>
                        <h4 class="mt-2 white-text wow fadeInLeft" data-wow-delay="0.3s">
                            {!! __('web/register.note') !!}
                        </h4>

                        <p class="mt-5 lead white-text font-weight-bold wow fadeIn"
                           data-wow-delay="0.4s">
                            {!! __('web/register.description') !!}
                        </p>
                    @endif
                    <div class="text-center wow fadeIn">
                        <img src="{{asset('img/gacela.png')}}" class="img-fluid text-center" width="450px"
                             alt="Forma parte de nuestro equipo.">
                    </div>
                </div>
                <!-- END LEAD TEXT -->

                <!-- REGISTER FORM -->
                <div class="col-12 col-lg-5 mt-5 mt-lg-0 px-0 px-sm-5">

                    <div class="card bg-black-pearl shadow-md white-text">
                        <div class="card-body py-5 px-4 px-sm-5">

                            @if(session()->has('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{session('error')}}
                                </div>
                            @endif

                            <div id="leadInfo"
                                 data-sent="{{session()->has('success')}}"
                                 data-lead="{{session()->has('lead') ? session()->get('lead'): null}}">
                            </div>

                            {{Form::open(['url' => route('lead'),'id'=>'leadForm','class'=>'register-form', 'enctype'=>'multipart/form-data'] )}}
                            @csrf
                            @if(!auth()->check())
                                <h3 class="text-center">
                                    {!! __('web/forms.register.title') !!}
                                </h3>
                            @else
                                <h3 class="text-center">
                                        <span class="d-block">
                                              {!! __('web/forms.register.copy') !!}
                                        </span>
                                </h3>
                            @endif
                            @include('_partials/register/fields')

                            <button type="submit"
                                    class="btn btn-lime-green btn-lg btn-block text-tangaroa font-weight-bold waves-effect mt-5">
                                {!! __('web/forms.register.action') !!}
                            </button>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
                <!-- END REGISTER FORM -->
            </div>
        </div>
    </div>
    @include('auth.modals.terms')
@endsection


@section('styles')
    {{Html::style(asset(mix('css/web/register.css')))}}
@endsection

@section('scripts')
    {{Html::script(asset(mix('js/web/register/app.js')))}}
@endsection

