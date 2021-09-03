{{Form::open([
'url'=> null,
'id'=>'frmReview',
'data-parsley-validate'=>true,
'data-parsley-excluded'=>"input[type=button], input[type=submit], input[type=reset], [disabled]"
])}}
<!-- Frame Modal Top -->
<div class="modal fade" id="rateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">

    <!-- Add class .modal-frame and then add class .modal-bottom (or other classes from list above) to set a position to the modal -->
    <div class="modal-dialog modal-dialog-centered" role="document">


        <div class="modal-content bg-tangaroa white-text">
            <div class="modal-header">
                <h4 id="modalCourseTitle"></h4>
            </div>
            <div class="modal-body text-center py-3">

                <div class="container">


                    <input type="hidden" name="rate" required data-parsley-required="true"/>
                    <p class="lead white-text">
                        {{__('courses/review.review_copy')}}
                    </p>

                    <div id="rating-course" class="d-block mx-auto mt-4"></div>

                    <div class="md-form mt-3">
                          <textarea class="md-textarea form-control"
                                    length="150"
                                    name="comment"
                                    required
                                    data-parsley-maxlength="150"
                          ></textarea>

                        <label for="form1" class="">
                            {{__('courses/review.comment')}}
                        </label>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" id="cancelReview" class="btn btn-danger">
                    {{__('courses/review.cancel_button')}}
                </button>
                <button type="submit" class="btn btn-lime-green text-tangaroa font-weight-bold ">
                    {{__('courses/review.accept_button')}}
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Frame Modal Top -->
{{Form::close()}}
