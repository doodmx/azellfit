<div class="col-12 col-sm-6 wow fadeIn"  data-wow-delay=".4s">
    <div class="row mb-5  text-center text-md-left">
        <!-- Image column -->
        <div class="col-sm-3 col-12 mb-3 text-center">
            <img class="icon-64" src="{!! $proposal['img'] !!}" alt="">
        </div>
        <!-- Image column -->
        <!-- Content column -->
        <div class="col-sm-9 col-12">
            <h3 class="h3 font-weight-bolder user-name white-text text-uppercase">{{$proposal['title']}}</h3>
            <p class="white-text article lead mt-3">
                {!! $proposal['description'] !!}
            </p>
        </div>
        <!-- Content column -->
    </div>
</div>
