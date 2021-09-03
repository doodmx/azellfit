{{ Form::open([
    'id' => 'frmResetPassword',
    'data-parsley-validate'=>true,
    'autocomplete' => 'off'
]) }}

@method('PATCH')

<div
        class="modal fade right modal-right modal-notify reset-password-modal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="chapterModal"
        aria-hidden="true">

    <div class="modal-dialog modal-full-height modal-right modal-lg" role="document">
        <div class="modal-content white-text  bg-tangaroa">
            <div class="modal-header">
                <h5 class="modal-title text-ce-soir" id="textModalTitleAccount">Cambio de Contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- EMAIL -->
                <div class="md-form form-group form-lg">
                    {{ Form::text('email', null, [
                        'class' => 'form-control',
                        'placeholder' => 'company@mail',
                        'data-parsley-required' => true,
                        'data-parsley-type' => 'email',
                    ]) }}
                    <label for="txtEmail" class="d-none d-sm-block">Correo Electrónico</label>
                </div>
                <!-- EMAIL -->

                <!-- PASSWORD -->
                <div class="md-form form-group form-lg">
                    {{ Form::password('password', [
                        'id'=>'password',
                        'class' => 'form-control',
                        'placeholder' => '*****',
                        'data-parsley-required' => true,
                        'data-parsley-minlength'=>8,

                    ]) }}
                    <label for="txtEmail" class="d-none d-sm-block">Contraseña</label>
                </div>
                <!-- PASSWORD -->

                <!-- PASSWORD CONFIRMATION -->
                <div class="md-form form-group form-lg">
                    {{ Form::password('password_confirmation', [
                        'id'=>'confirmPassword',
                        'class' => 'form-control',
                        'placeholder' => '*****',
                        'data-parsley-required' => true,
                        'data-parsley-minlength'=>8,
                        'data-parsley-equalto'=>'#password',
                        'data-parsley-error-message'=>'Las contraseñas no coinciden'
                    ]) }}
                    <label for="txtEmail" class="d-none d-sm-block">Confirmar Contraseña</label>
                </div>
                <!-- PASSWORD CONFIRMATION -->
            </div>
            <div class="modal-footer bg-dark">
                <button type="button" class="btn btn-sm btn-tangaroa btn waves-effect" data-dismiss="modal">
                    <i class="fas fa-times"></i> Cerrar
                </button>
                <button type="submit" class="btn btn-sm btn-lime-green waves-effect text-dark">
                    <i class="fas fa-check text-dark"></i> Enviar
                </button>
            </div>
        </div>
    </div>
</div>

{{ Form::close() }}
