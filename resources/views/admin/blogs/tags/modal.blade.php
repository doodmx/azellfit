<form data-action="" method="POST" id="tagForm" autocomplete="off">
    <div class="modal fade" id="tagModal" tabindex="-1" role="dialog" aria-labelledby="tagModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content white-text bg-tangaroa">
                <div class="modal-header">
                    <h5 class="modal-title text-ce-soir" id="modalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    {{Form::hidden('_method',null)}}

                    <div class="md-form form-group form-lg">
                        {{ Form::text('tag', null, [
                            'class' => 'form-control',
                            'id'=> 'txtTag',
                            'placeholder' => 'Título de la Etiqueta.',
                            'required'=>true,
                        ]) }}
                        <label for="txtTag">Etiqueta</label>
                    </div>

                </div>
                <div class="modal-footer bg-dark">
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
