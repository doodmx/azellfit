{{ Form::open([
    'id' => 'frmAccountVerification',
    'data-parsley-validate'=>true,
    'autocomplete' => 'off',
]) }}

<div
        class="modal fade right modal-right modal-notify verification-modal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="chapterModal"
        aria-hidden="true"
>
    <!--MODAL -->
    <div class="modal-dialog modal-full-height modal-right modal-lg" role="document">
        <div class="modal-content white-text bg-tangaroa">
            <!--MODAL HEADER-->
            <div class="modal-header">
                <h5 class="modal-title text-ce-soir">Verificación de Cuenta Partner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--MODAL HEADER-->

            <!-- MODAL BODY -->
            <div class="modal-body">
                <div class="container">

                    @include('admin/users/fields')

                    <div class="pl-2 row" id="chkAccountVerification">
                        <div class="col">
                            <div class="md-form ">
                                <div class="form-check pl-0">
                                    <input type="checkbox" name="terms" class="form-check-input" id="chkVerification"
                                           data-parsley-required-message="Es necesario verificar la información del Partner."
                                           data-parsley-errors-container="#errorTerms"
                                           data-parsley-required="true">
                                    <label class="form-check-label" for="chkVerification">
                                        He verificado que la información proporcionada por el Partner es válida.
                                    </label>
                                </div>
                            </div>
                            <div class="red-text font-small pt-2" role="alert" id="errorTerms">
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!-- MODAL BODY -->

            <!-- MODAL HEADER -->
            <div class="modal-footer bg-dark">
                <button type="button" class="btn btn-sm btn-tangaroa btn waves-effect" data-dismiss="modal">
                    <i class="fas fa-times"></i> Cerrar
                </button>
                <button type="submit" class="btn btn-sm btn-lime-green waves-effect text-dark">
                    <i class="fas fa-check text-dark"></i> Enviar credenciales de acceso
                </button>
            </div>
            <!--MODAL HEADER -->

        </div>
    </div>
    <!--MODAL-->
</div>

{{ Form::close() }}
