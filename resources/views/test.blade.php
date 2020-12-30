@extends('dashboard.layouts.app')

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ __('Managers') }}</h5>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <!--end::Separator-->
                    <!--begin::Search Form-->
                    <div class="d-flex align-items-center" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold"
                              id="kt_subheader_total">{{ __('Total') . ' ' . (\App\Models\Manager::all()->count() - 1) }}</span>
                        <form class="ml-5" action="{{ route('dashboard.managers.index') }}" role="search">
                            <div class="input-group input-group-sm input-group-solid" style="max-width: 175px">
                                <input type="text" class="form-control" name="search" id="kt_subheader_search_form"
                                       placeholder="{{ __('Search') }}" value="{{ request()->search }}">
                                <button type="submit" class="btn btn-clean p-0">
                                    <div class="input-group-append">
                                        <span class="input-group-text p-2">
                                            <span class="svg-icon m-0">
                                                <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/Search.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path
                                                            d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                        <path
                                                            d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                            fill="#000000" fill-rule="nonzero"></path>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <!--<i class="flaticon2-search-1 icon-sm"></i>-->
                                        </span>
                                    </div>
                                </button>
                            </div>
                        </form>
                    </div>
                    <!--end::Search Form-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <!--begin::Col-->
                    <div class="col-12">
                        <form method="post" id="create_manager_form" data-action="{{ url('/test') }}" enctype="multipart/form-data">

                            <div class="card card-custom card-sticky" id="kt_page_sticky_card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <span class="svg-icon svg-icon-primary card-icon">
                                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Add-user.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                    <path
                                                        d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                    <path
                                                        d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <h3 class="card-label">{{ __('Create Manager') }}</h3>
                                        <div id="loading" class="spinner spinner-primary mx-4 d-none"></div>

                                    </div>
                                    <div class="card-toolbar">
                                        <button id="ajax-submit"
                                                class="btn btn-light-primary font-weight-bold">
                                            <i class="icon-xs flaticon2-check-mark"></i>{{ __('Save Data') }}</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--alert-->
                                    <div class="alert alert-custom alert-success fade show mb-5" style="display: none"
                                         role="alert">
                                        <div class="alert-icon">
                                            <span class="svg-icon svg-icon-3x svg-icon-white">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Info-circle.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                r="10"></circle>
                                                        <rect fill="#000000" x="11" y="10" width="2" height="7"
                                                              rx="1"></rect>
                                                        <rect fill="#000000" x="11" y="7" width="2" height="2"
                                                              rx="1"></rect>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                        <div class="alert-text">

                                        </div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">
                                                    <i class="ki ki-close"></i>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-xl-9">
                                            <div class="my-5">
                                                <h3 class="text-dark font-weight-bold mb-10">{{ __('Manager Info') }}</h3>
                                                <!--begin::Group-->
                                                <div class="form-group row">
                                                    <label
                                                        class="col-xl-3 col-lg-3 col-form-label text-left">{{ __('Avatar') }}</label>
                                                    <div class="col-lg-9 col-xl-9">

                                                        <div class="image-input image-input-outline"
                                                             id="kt_user_edit_avatar">
                                                            <div class="image-input-wrapper"
                                                                 style="background-image: url({{ asset('assets/dashboard/media/users/default.jpg') }})"></div>
                                                            <label
                                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                data-action="change" data-toggle="tooltip" title=""
                                                                data-original-title="Change avatar">

                                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                                <input type="file" id="avatar" name="avatar"
                                                                       accept=".png, .jpg, .jpeg">
                                                                <input type="hidden" name="profile_avatar_remove">

                                                            </label>
                                                            <span
                                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                data-action="cancel" data-toggle="tooltip" title=""
                                                                data-original-title="Cancel avatar">
                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                            </span>
                                                        </div>
                                                        <div id="avatar_error" class="invalid-feedback"></div>

                                                    </div>
                                                </div>

                                                <!--end::Group-->
                                                <!--begin::Group-->
                                                <div class="form-group row fv-plugins-icon-container">

                                                    <label
                                                        class="col-xl-3 col-lg-3 col-form-label">{{ __('First Name') }}</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-solid form-control-lg"
                                                               id="first_name" name="first_name" type="text"
                                                               value="{{ old('first_name') }}" required>
                                                        <div id="first_name_error" class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <!--end::Group-->
                                                <!--begin::Group-->
                                                <div class="form-group row fv-plugins-icon-container">
                                                    <label
                                                        class="col-xl-3 col-lg-3 col-form-label">{{ __('Last Name') }}</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-solid form-control-lg"
                                                               id="last_name" name="last_name" type="text"
                                                               value="{{ old('last_name') }}" required>
                                                        <div id="last_name_error" class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <!--end::Group-->
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--end::Col-->
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection

@section('page-scripts')
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('assets/dashboard/js/pages/custom/user/edit-user.js') }}"></script>
<script>
    $(document).ready(function () {

        $('#ajax-submit').click(function (event) {
            event.preventDefault();

            var form = $('#create_manager_form')

            var formData = new FormData(form[0])

            // show spinner
            $('#loading').removeClass('d-none')

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                }
            });

            $.ajax({
                url: form.data('action'),
                method: "POST",
                enctype: "multipart/form-data",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,

                success: function (response) {
                    // remove error messages and classes
                    init()

                    if (response.status) {
                        // Hide spinner
                        $('#loading').addClass('d-none')

                        // Show success message
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: response.message,
                            text: response.name,
                            showConfirmButton: false,
                            timer: 2000,
                            customClass: {
                                content: "mb-5"
                            }
                        })

                        // Make inputs empty
                        $('#create_manager_form')[0].reset()
                        // or
                        // $('input').val('')
                    }
                },

                error: function (reject) {
                    var response = $.parseJSON(reject.responseText)

                    init()

                    $.each(response.errors, function (key, value) {

                        // example: #first_name
                        $("#" + key).addClass("is-invalid")
                        // example: first_name_error
                        $("#" + key + "_error").text(value[0]).show()
                        $('#loading').addClass('d-none')

                    });
                }
            });
        });

        function init() {
            $('input').removeClass('is-invalid')
            $('.invalid-feedback').text('')
        }

    });
</script>
<!--end::Page Scripts-->
@endsection

