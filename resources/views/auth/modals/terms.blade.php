<div class="modal fade" id="modalTerms" tabindex="-1" role="dialog" aria-labelledby="termsModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content white-text bg-tangaroa">
            <div class="modal-header">
                <h5 class="modal-title text-ce-soir">{!! __('web/register.terms.title') !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! __('web/register.terms.content') !!}
            </div>
            <div class="modal-footer bg-dark">
                <button type="button" class="btn btn-sm btn-tangaroa btn waves-effect" data-dismiss="modal">
                    <i class="fas fa-times"></i> {!! __('web/register.terms.buttons.close') !!}
                </button>
                <button type="button" class="btn btn-sm btn-lime-green waves-effect text-dark" data-dismiss="modal">
                    <i class="fas fa-check text-dark"></i> {!! __('web/register.terms.buttons.success') !!}
                </button>
            </div>
        </div>
    </div>
</div>
