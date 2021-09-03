<form data-action="" method="POST" id="categoryForm" autocomplete="off">
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModal"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-tangaroa white-text" >
                <div class="modal-header">
                    <h5 class="modal-title text-ce-soir" id="modalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{Form::hidden('_method',null)}}

                    <div class="md-form form-group form-lg">
                        {{ Form::text('category', null, [
                            'class' => 'form-control',
                            'id'=> 'txtCategory',
                            'placeholder' => 'Título de la Categoría.',
                            'required'=>true,
                        ]) }}
                        <label for="txtCategory">Categoría</label>
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-sm btn-tangaroa btn waves-effect" data-dismiss="modal">
                        <i class="fas fa-times"></i> Cancelar
                    </button>
                    <button type="submit" class="btn btn-sm btn-lime-green waves-effect text-dark">
                        <i class="fas fa-save text-dark"></i> Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
