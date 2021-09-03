@extends('layouts.admin.app')





@section('content')

    @include('admin.blogs.tags.modal')



    <div class="container bg-tangaroa white-text p-5 rounded">

        <cite class="lead italic">


        </cite>
        <div class="row">
            <div class="col-12">
                <h1 class=" d-flex justify-content-between mb-3">
                    <div>
                        <div>Etiquetas</div>
                        <div class="font-small mt-1 font-italic font-weight-bold">
                            (Contenido en {{$languages[app()->getLocale()]}})
                        </div>
                    </div>
                    @if(auth()->user()->hasPermissionTo('create_tag') || auth()->user()->hasRole('Super Admin') && app()->getLocale() === 'es ')
                        <button class="btn btn-lime-green text-tangaroa waves-effect waves-light float-right clearfix"
                                id="openTagModal">
                            <i class="fas fa-plus text-tangaroa"></i> Nueva
                        </button>
                    @endif
                </h1>
            </div>

        </div>

        <div class="row mb-3 justify-content-end mt-5 ">


            <div class="col-4 text-left">
                {{Form::select('',$statusSelect,'',['class'=>'mdb-select md-form dropdown-success pt-2','id'=>"tagStatus"])}}
                <label class="mdb-main-label" for="tagStatus">Status</label>
            </div>
        </div>


        {!! $dataTable->table(['class'=>'table table-striped dataTable','width' => '100%']) !!}
    </div>

@endsection

@section('scripts')


    {!! $dataTable->scripts() !!}

    <script type="text/javascript" src="{{asset(mix('js/admin_panel/tag/app.js'))}}"></script>
@endsection()
