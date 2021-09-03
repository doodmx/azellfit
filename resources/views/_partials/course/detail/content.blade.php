<div class="row no-gutters">
    <div class="col-12">

        <!-- NAV -->
        <ul class="nav md-tabs bg-lime-green nav-justified mx-0">
            <li class="nav-item waves-effect waves-light">
                <a class="nav-link active" data-toggle="tab" href="#course-content" role="tab">
                    {{__('courses/detail.abstract')}}
                </a>
            </li>
            <li class="nav-item waves-effect waves-light">
                <a class="nav-link" data-toggle="tab" href="#course-chapters" role="tab">
                    {{__('courses/detail.chapters')}}
                </a>
            </li>

        </ul>
        <!-- END NAV -->


        <!-- NAV CONTENT -->
        <div class="tab-content text-zircon p-0 module-content" id="pills-tabContent">

            <!--COURSE CONTENT -->
            <div class="tab-pane fade bg-black-pearl shadow show active  lead" id="course-content"
                 role="tabpanel" aria-labelledby="course-content-tab">

                <img src="{{asset('storage/'.$course->thumbnail)}}" alt="{{$course->seo->image_alt}}" class="w-100" style="object-fit: cover;object-position: center;">
                <div class="row">
                    <div class="col-12 text-wrap text-break text-justify p-5">
                        {!! $course->description !!}
                    </div>
                </div>

            </div>
            <!-- END COURSE CONTENT-->

            <!-- CHAPTERS -->
            <div class="tab-pane fade show bg-black-pearl shadow p-2 p-lg-5 lead" id="course-chapters"
                 role="tabpanel" aria-labelledby="course-chapters-tab">


                @if(count($course->chapters_tree) == 0)
                    <div class="text-center mt-3">
                        <i class="fas fa-wrench fa-3x d-block mx-auto"></i>
                        <p class="lead white-text mt-3 text-muted">
                            {{__('courses/detail.coming_soon')}}
                        </p>
                    </div>
                @endif

                <!--Accordion wrapper-->
                <div class="accordion md-accordion accordion-blocks " id="accordionChapters" role="tablist"
                     aria-multiselectable="true">
                    @each('_partials/course/chapters/chapter', $course->chapters_tree, 'chapter')
                </div>
                <!--/.Accordion wrapper-->


            </div>
        </div>
    </div>
</div>
