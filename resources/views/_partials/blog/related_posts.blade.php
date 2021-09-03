<!--  Card -->
@if($relatedPosts->count() > 0)
    <div class="card-body white-text pb-0">
        <div class="single-post">

            <p class="font-weight-bold  rounded text-center spacing bg-lime-green text-tangaroa py-2 mb-4">
                <strong>{!! __('web/blog.related_posts') !!}</strong>
            </p>

        @foreach($relatedPosts as $relatedPost)
            <!-- Grid row -->
                <div class="row mb-4">
                    <div class="col-5">

                        <!-- Image -->
                        <div class="view overlay">
                            <img src="{{asset('storage/'.$relatedPost->detail_image)}}"
                                 class="img-fluid z-depth-1 rounded-0"
                                 alt="{{$relatedPost->title}}">
                            <a href="{{route('web.blog.show',[$relatedPost->seo->slug])}}">
                                <div class="mask rgba-white-slight waves-effect waves-light"></div>
                            </a>
                        </div>
                    </div>

                    <!-- Excerpt -->
                    <div class="col-7">
                        <h6 class="mt-0 font-small">
                            <a href="{{route('web.blog.show',[$relatedPost->seo->slug])}}"
                               class="font-weight-bold text-lime-green">
                                <strong>{{$relatedPost->title}}</strong>
                            </a>
                        </h6>

                        <div class="post-data">
                            <p class="font-small mb-0">
                                <i class="far fa-clock-o"></i> {{$relatedPost->date_to_publish->format('d/F/Y')}}
                            </p>
                        </div>
                    </div>
                    <!--  Excerpt -->
                </div>
                <!--  Grid row -->
            @endforeach

        </div>

    </div>
@endif
