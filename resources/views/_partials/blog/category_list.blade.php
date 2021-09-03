<!--  Card -->
<div class="card-body pb-0">
    <div class="single-post">

        <p class="font-weight-bold  rounded text-center spacing bg-lime-green text-tangaroa py-2 mb-4">
            <strong>{!! __('web/blog.categories') !!}</strong>
        </p>

        <ul class="list-group  my-4">
            @foreach($categories as $category)

                @if($category->relatedPosts->count() > 0)
                    <li class="list-group-item border-bottom  bg-transparent d-flex justify-content-between align-items-center">
                        <a href="{{route('web.blog.index',['category'=> $category->category])}}"
                           class="text-lime-green ">
                            <p class="mb-0">{{$category->category}}</p>
                        </a>
                        <span class="badge badge-lime-green  font-small p-2">
                            <b class="text-tangaroa">{{$category->relatedPosts->count()}}</b>
                        </span>
                    </li>
                @endif

            @endforeach

        </ul>
    </div>

</div>
