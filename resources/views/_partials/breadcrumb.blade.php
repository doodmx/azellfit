<div class="row justify-content-end">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-tangaroa">

            @foreach($routes as $route)

                <li class="breadcrumb-item">
                    <a href="{{isset($route['url']) ? $route['url'] : '#'}}"
                       class="{{!isset($route['url'])?'white-text':'text-lime-green'}}"
                            {{!isset($route['url'])?'aria-current="page"':''}}
                    >
                        {{$route['description']}}

                    </a>
                </li>
            @endforeach
        </ol>
    </nav>
</div>
