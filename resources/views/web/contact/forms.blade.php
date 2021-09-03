<!-- Section: Contact -->
<section class="py-5">
    <div class="row">
        <div class="col-sm-6 col-12 py-4">
            <h2 class="h4-responsive text-uppercase spacing-6 text-lime-green wow fadeInLeft"
                data-wow-delay="0.3s">
                {!! __('web/forms.contact_investment.title') !!}
            </h2>
            <!--Card -->
            <div class="card bg-black-pearl rounded" id="cardContactSimulator">
                <!--Card content -->
                <div class="card-body ">
                    <!-- contact simulator form -->
                    <form id="frmContactSimulator" data-parsley-validate="true" autocomplete="false" method="post"
                          data-action="create">
                        @csrf
                        <input name="_method" type="hidden" value="POST">
                        <div class="md-form">
                            <i class="fas fa-envelope prefix white-text"></i>
                            <input type="email" name="email" id="txtEmail" class="form-control"
                                   data-parsley-type="email"
                                   data-parsley-required-message="{!! __('web/forms.schedule.fields.email.validate_msg.required') !!}"
                                   data-parsley-type-message="{!! __('web/forms.schedule.fields.email.validate_msg.type') !!}"
                                   data-parsley-required="true">
                            <label for="txtEmail">{!! __('web/forms.schedule.fields.email.placeholder') !!}</label>
                        </div>
                        <div class="md-form">
                            <i class="fab fa-whatsapp prefix white-text"></i>
                            <input type="tel" name="whatsapp" id="txtWhatsApp" class="form-control"
                                   data-parsley-minlength="10"
                                   data-parsley-minlength-message="{!! __('web/forms.schedule.fields.whatsapp.validate_msg.minlength') !!}"
                                   data-parsley-required-message="{!! __('web/forms.schedule.fields.whatsapp.validate_msg.required') !!}"
                                   data-parsley-required="true">
                            <label for="txtWhatsApp">{!! __('web/forms.schedule.fields.whatsapp.placeholder') !!}</label>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit"
                                    class="btn btn-lime-green btn-rounded font-weight-bold text-uppercase">
                                {!! __('web/forms.contact_investment.action') !!}
                            </button>
                        </div>
                    </form>
                    <!-- contact simulator form -->
                </div>
            </div>
            <!--Card -->
        </div>
        <div class="col-sm-6 col-12">
            <div class="card bg-black-pearl rounded" id="cardContactSchedule">
                <!--Card content -->
                <div class="card-body">
                    <h4 class="card-title white-text">{!! __('web/forms.schedule.title') !!}</h4>
                    <!-- contact schedule form -->
                    <form id="frmContactSchedule" data-parsley-validate="true" autocomplete="false" method="post"
                          data-action="create">
                        @csrf
                        <input name="_method" type="hidden" value="POST">
                        <div class="md-form">
                            <i class="fa fa-user prefix white-text"></i>
                            <input type="text" name="name" id="txtName" class="form-control"
                                   data-parsley-required-message="{!! __('web/forms.schedule.fields.name.validate_msg.required') !!}"
                                   data-parsley-required="true">
                            <label for="txtName">{!! __('web/forms.schedule.fields.name.placeholder') !!}</label>
                        </div>
                        <div class="md-form">
                            <i class="fas fa-user-friends prefix white-text"></i>
                            <input type="text" name="lastname" id="txtLastname" class="form-control"
                                   data-parsley-required-message="{!! __('web/forms.schedule.fields.lastname.validate_msg.required') !!}"
                                   data-parsley-required="true">
                            <label for="txtLastname">{!! __('web/forms.schedule.fields.lastname.placeholder') !!}</label>
                        </div>
                        <div class="md-form">
                            <i class="fas fa-envelope prefix white-text"></i>
                            <input type="email" name="email" id="txtSEmail" class="form-control"
                                   data-parsley-type="email"
                                   data-parsley-required-message="{!! __('web/forms.schedule.fields.email.validate_msg.required') !!}"
                                   data-parsley-type-message="{!! __('web/forms.schedule.fields.email.validate_msg.type') !!}"
                                   data-parsley-required="true">
                            <label for="txtSEmail">{!! __('web/forms.schedule.fields.email.placeholder') !!}</label>
                        </div>
                        <div class="md-form">
                            <i class="fab fa-whatsapp prefix white-text"></i>
                            <input type="tel" name="whatsapp" id="txtSWhatsApp" class="form-control"
                                   data-parsley-minlength="10"
                                   data-parsley-minlength-message="{!! __('web/forms.schedule.fields.whatsapp.validate_msg.minlength') !!}"
                                   data-parsley-required-message="{!! __('web/forms.schedule.fields.whatsapp.validate_msg.required') !!}"
                                   data-parsley-required="true">
                            <label for="txtSWhatsApp">{!! __('web/forms.schedule.fields.whatsapp.placeholder') !!}</label>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit"
                                    class="btn btn-lime-green btn-rounded font-weight-bold text-uppercase">
                                {!! __('web/forms.schedule.action') !!}
                            </button>
                        </div>
                    </form>
                    <!-- contact schedule form -->
                </div>
            </div>
            <!--Card -->
        </div>
    </div>
</section>
<!-- Section: Contact -->
