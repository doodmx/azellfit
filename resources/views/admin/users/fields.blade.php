<h6 class="py-3 font-weight-bold">
    {{  __('my_investors.contact_information')}}
</h6>

<!-- LASTNAME -->
<div class="md-form form-group form-lg ">
    {{ Form::text('profile[lastname]',
        isset($user) ? $user->profile->lastname:null, [
        'id'=>'txtLastname',
        'class' => 'form-control',
        'data-parsley-required' => true
    ]) }}
    <label for="txtLastName" class="d-none d-sm-block">
        {{  __('my_investors.last_name')}}
    </label>
</div>
<!-- LASTNAME -->

<!-- FIRST NAME -->
<div class="md-form form-group form-lg">
    {{ Form::text('profile[name]',
        isset($user) ? $user->profile->name:null, [
        'id'=>'txtName',
        'class' => 'form-control',
        'data-parsley-required' => true
    ]) }}
    <label for="txtName" class="d-none d-sm-block">
        {{  __('my_investors.first_name')}}
    </label>
</div>
<!-- FIRST NAME -->


<!-- PHONE -->
<label for="txtPhoneNumber" class="d-none d-sm-block text-lime-green mt-3">
    {{  __('my_investors.whatsapp')}}
</label>
<div class="md-form form-group form-lg mt-1">
    <input id="txtPhoneNumber"
           type="tel"
           name="profile[phone_number]"
           class="form-control"
           value="{{ isset($user) ? $user->profile->phone_number:null}}"
           data-parsley-errors-container="#errorPhoneNumber"
           data-parsley-required="true">
</div>

<div class="red-text font-small" role="alert" id="errorPhoneNumber"></div>


<!-- PHONE -->

<!-- EMAIL -->
<div class="md-form form-group form-lg">
    {{ Form::text('email',
         isset($user) ? $user->email:null, [
        'id'=>'txtEmail',
        'class' => 'form-control',
        'data-parsley-required' => true,
        'data-parsley-type' => 'email',
        isset($user) ? 'readonly':''
    ]) }}
    <label for="txtEmail" class="d-none d-sm-block">
        {{  __('my_investors.email')}}
    </label>
</div>
<!-- EMAIL -->


<!-- USER DOCS-->
<h6 class="py-3 font-weight-bold">
    {{  __('my_investors.attachments')}}
</h6>
<div class="row text-center justify-content-start">

    <!-- ID CARD -->
    <div class="col-12 col-lg-5 mt-3 mt-lg-0">
        <div class="card-body bg-black-pearl rounded edit-context-menu"
             style="height: 15rem;"
             id="containerIdCard"
             data-file_id="#fileCardId">

            <div class="card-container d-flex flex-column justify-content-center align-items-center h-100">

                <a href="{{isset($user) ? asset($user->profile->id_card):'#'}}"
                   class="id-card-link"
                   target="_blank"
                >
                    <i class="fas fa-address-card fa-5x text-lime-green"></i>
                    <h4 class="mt-3 mb-0 text-lime-green font-weight-bold">
                        {{  __('my_investors.user_id')}}
                    </h4>
                    <p class="mt-1 white-text text-break font-small id-card-name"
                       id="idCardFilename">
                        {{isset($idCard) ? $idCard:''}}
                    </p>
                </a>

            </div>


            <div class="file-field position-absolute" style="top:0px;right:10px;">
                <a class="btn-floating btn-tangaroa">
                    <i class="fas fa-paperclip" aria-hidden="true"></i>
                    <input
                            id="fileCardId"
                            type="file"
                            name="profile[id_card]"
                            data-parsley-filemaxmegabytes="2"
                            data-parsley-trigger="change"
                            data-parsley-filemimetypes="image/png,image/jpg,image/bmp,image/gif,image/jpeg,application/pdf"
                            data-parsley-errors-container="#errorIdCard"
                    >
                </a>
            </div>


        </div>
        <div class="red-text font-small" role="alert" id="errorIdCard"></div>
    </div>
    <!-- ID CARD -->

    <!--PROOF RESIDENCE-->
    <div class="col-12 col-lg-5 mt-3 mt-lg-0">
        <div class="card-body bg-black-pearl rounded edit-context-menu"
             style="height: 15rem;"
             data-file_id="#fileProofResidence">

            <div class="card-container d-flex flex-column justify-content-center align-items-center h-100">
                <a href="{{isset($user) ? asset($user->profile->proof_residence):'#'}}"
                   class="proof-residence-link"
                   target="_blank"
                >
                    <i class="fas fa-address-card fa-5x text-lime-green"></i>
                    <h4 class="mt-3 mb-0 text-lime-green font-weight-bold">
                        {{  __('my_investors.proof_residency')}}
                    </h4>
                    <p class="mt-1 white-text text-break proof-residence-name">
                        {{isset($proofResidence) ? $proofResidence:''}}
                    </p>

                </a>
            </div>


            <div class="file-field position-absolute" style="top:0px;right:10px;">
                <a class="btn-floating btn-tangaroa">
                    <i class="fas fa-paperclip" aria-hidden="true"></i>

                    <input
                            type="file"
                            name="profile[proof_residence]"
                            data-parsley-filemaxmegabytes="2"
                            data-parsley-trigger="change"
                            data-parsley-filemimetypes="image/png,image/jpg,image/bmp,image/gif,image/jpeg,application/pdf"
                            data-parsley-errors-container="#errorProofResidence"
                    >
                </a>
            </div>
            <div class="red-text font-small" role="alert" id="errorProofResidence"></div>
        </div>

    </div>
    <!--PROOF RESIDENCE -->
</div>

<!-- USER DOCS -->
