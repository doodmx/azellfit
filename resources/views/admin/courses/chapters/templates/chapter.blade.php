<!-- Accordion card -->
<div id="chapter{{$chapter->id}}"
     class="chapter card bg-tangaroa white-text mb-0"
     data-id="{{$chapter->id}}"
>

    <!-- Card header -->
    <div class="card-header d-flex justify-content-between align-items-center w-100 px-0 py-2" role="tab"
         id="headingChapter{{$chapter->id}}">
        <!-- Collapse -->
        <div class="w-20">
            <a class="btn-floating btn-sm stylish-color align-items-start"
               data-toggle="collapse"
               data-parent="#accordionChapters" href="#collapseChapter{{$chapter->id}}" aria-expanded="false"
               aria-controls="collapseChapter{{$chapter->id}}">
                <i class="fas fa-angle-down rotate-icon"></i>
            </a>
        </div>
        <!--Title-->
        <div class="w-100 btn-edit-chapter cursor-pointer my-3 ml-3">


            @if(app()->getLocale() === 'es')
                <h4 class="font-weight-bold">{{$chapter->original_title}}</h4>
            @else
                <h4 class="font-weight-bold"> {{$chapter->localized_title ? $chapter->localized_title : 'Sin traducción'}}</h4>
                <div class="mt-2">
                    <div class="d-inline-block iti-flag mx"></div>
                    <div class="d-inline-block">{{$chapter->original_title}}</div>
                </div>
            @endif


        </div>

        <!--Options-->
        <h5>
            <span class="badge bg-black-pearl">
                <span class="count" id="count{{$chapter->id}}">{{$chapter->nodes->count()}}</span> Secciones
            </span>
        </h5>


        <div class="btn-group align-items-end">
            <button type="button" class="btn-floating btn-sm  btn-light  dropdown-toggle py-0 my-0"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v text-dark"></i>
            </button>
            <div class="dropdown-menu">
                @if(app()->getLocale() ==='es')
                    <a
                            class="dropdown-item btn-add-chapter"
                            href="#"
                            data-id="{{$chapter->id}}"
                            data-parent_node="{{$chapter->id}}"
                            data-chapters_container="#collapseChapterBody{{$chapter->id}}"
                    >
                        <i class="fas fa-plus"></i> Añadir Sección
                    </a>
                @endif

                <a
                        class="dropdown-item btn-edit-chapter"
                        href="#"
                        data-id="{{$chapter->id}}"
                        data-parent_node="{{$parentNode}}"
                        data-chapter_element="#chapter{{$chapter->id}}"
                >
                    <i class="fas fa-edit"></i> Editar
                </a>
                <a
                        class="dropdown-item btn-delete-chapter"
                        href="#"
                        data-id="{{$chapter->id}}"
                        data-count_node="{{$chapter->id}}"
                        data-chapter_element="#chapter{{$chapter->id}}"
                >
                    <i class="fas fa-trash"></i>Eliminar
                </a>
            </div>
        </div>
    </div>
    <!-- Card body -->
    <div id="collapseChapter{{$chapter->id}}" class="collapse" role="tabpanel"
         aria-labelledby="headingChapter{{$chapter->id}}"
         data-parent="#accordionChapters">
        <div class="card-body py-0" id="collapseChapterBody{{$chapter->id}}">

            @foreach($chapter->nodes as $chapterNode)
                @include('admin.courses.chapters.templates.chapter_node',['chapterNode'=>$chapterNode,'parentNode'=>$chapter->id])
            @endforeach

        </div>
    </div>
</div>
<!-- Accordion card -->
