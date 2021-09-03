@foreach( __('web/investment/events.content') as $index => $event)
    @if($index % 2 === 0)
        <div class="col-sm-4 col-12 pl-sm-0 pl-5  wow fadeInLeft"  data-wow-delay=".4s">
            <ol class="list-changes">
                @endif
                <li>
                    {!! $event["title"] !!}
                    <p class="text-lime-green">{!! $event["date"] !!}</p>
                </li>
                @if($index % 2 ==! 0)
            </ol>
        </div>
    @endif
@endforeach
