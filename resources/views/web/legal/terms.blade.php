@extends('layouts.web.app')

@section('content')
    <section class="main-content">
        <div class="mask">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-flex mx-5">
                    <h1 class="heading font-weight-bold text-white">
                        {!! __('terms.title') !!}
                    </h1>
                </div>

            </div>
        </div>
    </section>
    <div class="accordion mb-4" id="accordion" role="tablist" aria-multiselectable="true">
        @foreach(__('terms.content') as $key => $term)
            @include('_partials/term_section',[
            'index' => $key,
            'title' => $term['title'],
            'content' => $term['content']
            ])
        @endforeach
    </div>

@endsection
