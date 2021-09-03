{{ Form::open([
    'id' => 'frmProfile',
    'data-parsley-validate'=>true,
    'autocomplete' => 'off',
]) }}

@method('PATCH')

<div
        class="modal fade right modal-right modal-notify profile-modal"
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
                <h5 class="modal-title">
                    {{__('my_investors.user_information')}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--MODAL HEADER-->

            <!-- MODAL BODY -->
            <div class="modal-body">
                <div class="container">

                    @include('admin/users/fields')

                </div>
            </div>
            <!-- MODAL BODY -->

            <!-- MODAL HEADER -->
            <div class="modal-footer bg-dark">
                <button type="button" class="btn btn-sm btn-tangaroa btn waves-effect" data-dismiss="modal">
                    <i class="fas fa-times"></i>
                    {{__('my_investors.cancel')}}
                </button>
                <button type="submit" class="btn btn-sm btn-lime-green waves-effect text-dark">
                    <i class="fas fa-check text-dark"></i>

                    {{__('my_investors.update')}}
                </button>
            </div>
            <!--MODAL HEADER -->

        </div>
    </div>
    <!--MODAL-->
</div>

{{ Form::close() }}
