<!--  Card -->
<div class="card-body justify-content-center">
    <div class="single-post">

        <p class="font-weight-bold rounded text-center spacing bg-lime-green text-tangaroa py-2 mb-4">
            <strong>{!! __('web/blog.tags') !!}</strong>
        </p>


        @foreach($tags as $tag)

            <a href="{{route("web.blog.index",['tag'=>$tag->tag])}}"
               class="badge badge-tangaroa p-2 d-inline-block m-1">
               <span class="text-lime-green font-medium"> <i class="fas fa-tag"></i> {{$tag->tag }}</span>
            </a>
        @endforeach


    </div>

</div>
