<form id="frmSendPayment" action="" data-parsley-validate="true">


    <!-- Central Modal Small -->
    <div class="modal fade"
         id="paymentEmailModal"
         tabindex="-1"
         role="dialog"
         aria-labelledby="myModalLabel"
         aria-hidden="true">

        <!-- Change class .modal-sm to change the size of the modal -->
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">


            <div class="modal-content bg-tangaroa white-text">
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModalLabel">Envio de Pago por Correo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">

                        <p class="text-lime-green">Recibo</p>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-file-pdf fa-2x d-inline-block mr-2"></i>
                            <div id="receiptName" class="d-inline-block">Ejemplo</div>
                        </div>

                        <!-- Subject -->
                        <div class="md-form form-group form-lg">
                            {{ Form::text('subject',
                                null, [
                                'class' => 'form-control',
                                'placeholder'=>'¿Porque envio este recibo?',
                                'data-parsley-required' => true
                            ]) }}
                            <label for="txtName" class="active">
                                Asunto
                            </label>
                        </div>
                        <!-- Subject -->

                        <!-- Email -->
                        <div class="md-form form-group form-lg">
                            {{ Form::text('email',
                                null, [
                                'class' => 'form-control',
                                'data-parsley-required' => true
                            ]) }}
                            <label for="txtName" class="active">
                                Destinatario
                            </label>
                        </div>
                        <!-- Subject -->


                        <!-- Copies -->
                        <div class="md-form form-group form-lg">
                            {{ Form::text('bcc',
                                null, [
                                'class' => 'form-control',
                                'placeholder'=>'Copias'

                            ]) }}
                            <label for="txtName" class="active">
                                CC:
                            </label>
                        </div>
                        <!-- Subject -->

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-lime-green text-tangaroa btn-sm">Enviar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Central Modal Small -->
</form>
