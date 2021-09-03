@extends('layouts.web.app')

@section('content')

    <section class="main-content">
        <div class="mask">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-flex text-center py-4">
                    <h1 class="heading h2 font-weight-bold text-white">
                        {!! __('polices.title') !!}
                    </h1>
                </div>

            </div>
        </div>
    </section>

    <div class="container white-text">
        <div class="row d-flex justify-content-center">
            <div class="col-12 text-grey-suit lead text-justify">
                {!! __('polices.description') !!}
                @each('_partials/police_section', __('polices.content'), 'police')
            </div>
        </div>
    </div>


@endsection
