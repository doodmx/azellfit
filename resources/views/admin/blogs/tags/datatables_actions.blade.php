<div class="btn-group">
    <button type="button" class="btn-floating btn-sm  btn-light  dropdown-toggle py-0 my-0"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-v text-dark"></i>
    </button>
    <div class="dropdown-menu">
        @if(auth()->user()->hasPermissionTo('edit_tag') || auth()->user()->hasRole('Super Admin'))
            <a class="dropdown-item edit-tag mb-2" data-id="{{$id}}">
                <i class="fas fa-edit"></i>
                Editar
            </a>
            @if(empty($deleted_at))
                <a class="dropdown-item deactivate-tag" href="#" data-id="{{$id}}">
                    <i class="fas fa-trash"></i> Eliminar
                </a>
            @else
                <a class="dropdown-item activate-tag" href="#" data-id="{{$id}}">
                    <i class="fas fa-sync"></i> Restaurar
                </a>
            @endif

        @endif
    </div>
</div>


