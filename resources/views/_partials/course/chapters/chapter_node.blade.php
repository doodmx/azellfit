<!-- Chapter Node -->
<section id="chapterNode{{$chapterNode->id}}"
         class="chapter-node d-flex justify-content-between align-items-center w-100 p-0 py-3"
         data-chapter_node="{{json_encode($chapterNode)}}">
    <div class="d-flex align-items-center btn-edit-chapter-node py-3">
        <div class="col">
            <a class="btn-floating btn-sm stylish-color d-none d-sm-inline-flex">
                <i class="fab fa-vimeo-square fa-2x"></i>
            </a>
        </div>
        <div class="flex-grow-1">

            <div class="d-flex chapter-link">

                @if(isset($chapterNode->is_done))
                    <div class="form-check d-inline-block">
                        <input
                                type="checkbox"
                                id="{{$chapterNode->title}}-{{$chapterNode->id}}"
                                class="form-check-input chapter-done"
                                {{$chapterNode->is_done ? 'checked':''}}
                                data-chapter="{{$chapterNode->id}}"

                        >
                        <label class="form-check-label"
                               for="{{$chapterNode->title}}-{{$chapterNode->id}}"></label>
                    </div>
                @endif

                <div class="white-text cursor-pointer description"
                     data-chapter="{{$chapterNode->id}}">

                    @if(app()->getLocale() === 'es')
                        <h5 class="font-weight-bold">{{$chapterNode->original_title}}</h5>
                    @else
                        <h5 class="font-weight-bold mb-1"> {{$chapterNode->localized_title}}</h5>
                    @endif


                </div>
            </div>


            <div class="mt-3 text-justify text-lime-green ml-3">
                @if(app()->getLocale() === 'es')
                    {{$chapterNode->original_description}}
                @else
                    {{$chapterNode->localized_description   }}
                @endif
            </div>
        </div>
    </div>
</section>
<!-- Chapter Node -->

