<div class="col-12 col-md-6 col-lg-4 my-2">
    <div class="card blog-card border-0">
        <img src="{{asset('storage/'.$blog->detail_image)}}" alt="{{$blog->title}}" class="card-img-top">

        <div class="card-body bg-black-pearl d-flex flex-column justify-content-around">
            <!-- Excerpt -->
            <a href="{{route('web.blog.index',['category'=>$blog->categories[0]->category])}}"
               class="green-text lead">
                <h6 class="pb-1"><strong> {{$blog->categories[0]->category}} </strong></h6>
            </a>
            <h4 class="mb-3"><strong>{{$blog->title}}</strong></h4>
            <p class="text-justify">{{$blog->extract}}</p>
            <p>by <a><strong>{{$blog->author}}</strong></a>, {{$blog->date_to_publish->format('d F Y')}}
            </p>
            <a class="btn btn-lime-green text-tangaroa font-weight-bolder"
               href="{{route('web.blog.show',$blog->seo->slug)}}">

                {!! __('web/blog.read_button') !!}
            </a>
        </div>
    </div>
</div>
