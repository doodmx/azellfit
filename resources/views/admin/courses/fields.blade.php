@csrf


<div id="smartwizard" class="bg-black-pearl mt-5">
    <ul id="myHeader">
        <li>
            <a href="#step-1" class="text-dark">Información General</a>
        </li>
        <li>
            <a href="#step-2" class="text-dark">SEO</a>
        </li>
        <li>
            <a href="#step-3" class="text-dark">Confirmación</a>
        </li>

    </ul>

    <div class="p-1 p-lg-5">

        <!--STEP 1 --->
        <div id="step-1">



            <div class="step-content-container">
                @include('_partials/course/steps/general')
            </div>

        </div>
        <!-- END STEP 1-->


        <!-- STEP 2 -->
        <div id="step-2" class="">
            <div class="step-content-container">
                @include('_partials/course/steps/seo')
            </div>
        </div>
        <!-- END STEP 2-->

        <!-- STEP 3-->
        <div id="step-3" class="">
            <div class="step-content-container">
                @include('_partials/course/steps/confirmation')
            </div>
        </div>
        <!-- END STEP 3-->


    </div>
</div>
