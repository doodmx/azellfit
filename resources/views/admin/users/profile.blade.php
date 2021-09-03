@extends('layouts.'.$layout.'.app')
@section('content')


    {{Form::open(['id'=>'frmProfile','class'=>'main-content','data-parsley-validate'=>true])}}

    @method('PATCH')




    <div class="container bg-tangaroa white-text rounded px-0">
        <div class="d-flex flex-column flex-lg-row wrap justify-content-between align-items-center bg-tangaroa p-2 p-lg-5"
             id="myHeader">

            <h1>
                {{__('my_investors.profile')}}
            </h1>

            <button type="submit" class="mt-3 mt-lg-0 btn btn-lg btn-lime-green waves-effect text-dark">
                <i class="fas fa-save text-dark"></i>
                {{__('my_investors.update')}}
            </button>

        </div>

        <div class="content px-5 pb-5">

            <!-- USER AVATAR -->
            <div class="avatar-container">

                <img id="avatarPreview"
                     src="{{isset($user) && !empty($user->profile->photo) ? asset($user->profile->photo) : asset('img/user.png')}}"
                     alt=""/>

                <!-- FILE PICKER -->
                <div class="file-field position-absolute" style="bottom:0px;right:0px;">
                    <a class="btn-floating btn-lime-green btn-sm">
                        <i class="fas fa-paperclip text-tangaroa font-weight-bold" aria-hidden="true"></i>

                        <input
                                type="file"
                                name="profile[photo]"
                                data-parsley-filemaxmegabytes="2"
                                data-parsley-trigger="change"
                                data-parsley-filemimetypes="image/png,image/jpg,image/bmp,image/gif,image/jpeg"
                                data-parsley-errors-container="#errorAvatar"
                        >
                    </a>
                </div>
                <!--FILE PICKER -->

            </div>
            <!--USER AVATAR -->
            <div class="red-text font-small text-center d-block" role="alert" id="errorAvatar"></div>


            @include('admin/users/fields',[
                'user'=>$user,
                'proofResidence' => $proofResidence,
                'idCard' => $idCard
            ])

        </div>


    </div>
    {{Form::close()}}

    <a href="" id="localData" data-user="{{$user->id}}"></a>

@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset(mix('css/admin_panel/user/profile.css'))}}">
@endsection

@section('scripts')
    <script src="{{asset(mix('js/admin_panel/user/profile.js'))}}"></script>
@endsection
