@extends('layouts.admin.app')

@section('content')



    <form id="postForm"
          data-blog_id="{{isset($blog)?$blog->id:null}}"
          data-action="{{isset($blog)?'/admin/blogs/'.$blog->id:'/admin/blogs'}}"
    >

        @csrf

        <div class="container p-5 bg-tangaroa white-text rounded">


            <div class="row">
                <div class="col-12 p-0 m-0">
                    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center">
                        <h2 class="text-ce-soir">{{isset($blog)?'Editar':'Nueva'}} Publicación</h2>

                        <div class="mt-3 mt-lg-0">
                            @include('_partials/breadcrumb',[
                               'routes' =>[
                                   [
                                       'description' => 'Publicaciones',
                                       'url' => route('blogs.index')
                                   ],
                                   [
                                       'description' => isset($blog)? $blog->title:'Nueva'
                                   ]
                               ]
                             ])
                        </div>
                    </div>
                </div>
            </div>


            <div id="smartwizard" class="bg-black-pearl mt-5">
                <ul id="myHeader">
                    <li>
                        <a href="#step-1" class="text-dark">Información General</a>
                    </li>
                    <li>
                        <a href="#step-2" class="text-dark">Artículo</a>
                    </li>
                    <li>
                        <a href="#step-3" class="text-dark">SEO</a>
                    </li>
                    <li>
                        <a href="#step-4" class="text-dark">Confirmación</a>
                    </li>

                </ul>

                <div class="p-1 p-lg-5">

                    <!--STEP 1 --->
                    <div id="step-1">

                        <div class="step-content-container">
                            @include('_partials/blog/steps/general')
                        </div>

                    </div>
                    <!-- END STEP 1-->


                    <!-- STEP 2 -->
                    <div id="step-2" class="">
                        <div class="step-content-container">
                            @include('_partials/blog/steps/article')
                        </div>
                    </div>
                    <!-- END STEP 2-->

                    <!-- STEP 3-->
                    <div id="step-3" class="">
                        <div class="step-content-container">
                            @include('_partials/blog/steps/seo')
                        </div>
                    </div>
                    <!-- END STEP 3-->


                    <!--STEP 4 -->
                    <div id="step-4">
                        <div class="step-content-container">
                            @include('_partials/blog/steps/confirmation')
                        </div>
                    </div>
                    <!--END STEP 3 -->


                </div>


            </div>
        </div>
    </form>


@endsection


@section('scripts')
    <script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
    <script type="text/javascript" src="{{asset(mix('js/admin_panel/blog/app.js'))}}"></script>

@endsection()
