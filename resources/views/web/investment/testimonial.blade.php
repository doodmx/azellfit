<div class="card">
    <!-- Card image -->
    <div class="card-img-top">
        {{--
        <img class="img-fluid rounded" src="https://picsum.photos/280/150?date={{rand()}}"
             alt="Card image cap">
        --}}
        <div class="embed-responsive embed-responsive-16by9 img-fluid">
            <iframe src="{{$testimonial['video']}}" frameborder="0"
                    class="embed-responsive-item"
                    height="200"></iframe>
        </div>

    </div>
    <!-- Card content -->
    <div class="card-body text-center">
        <div class="orange-text">
            <i class="fas fa-star"> </i>
            <i class="fas fa-star"> </i>
            <i class="fas fa-star"> </i>
            <i class="fas fa-star"> </i>
            <i class="fas fa-star"> </i>
        </div>
    </div>
</div>
