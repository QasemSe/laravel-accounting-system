@extends('dashboard.layouts.app')

@section('title', __('Invoices __ Create Invoice'))

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ __('Create Invoice') }}</h5>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard.sales.invoices.index') }}" class="text-muted">{{ __('Invoices') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">{{ __('Create Invoice') }}</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
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
                        <form method="post" id="create_invoice_form" data-action="{{ route('dashboard.sales.invoices.store') }}">
                            <div class="card card-custom">
                                <div class="card-header">
                                    <div class="card-title">
                                        <span class="svg-icon svg-icon-primary card-icon">
                                            <span class="svg-icon menu-icon">
                                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Clothes\Briefcase.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M5.84026576,8 L18.1597342,8 C19.1999115,8 20.0664437,8.79732479 20.1528258,9.83390904 L20.8194924,17.833909 C20.9112219,18.9346631 20.0932459,19.901362 18.9924919,19.9930915 C18.9372479,19.9976952 18.8818364,20 18.8264009,20 L5.1735991,20 C4.0690296,20 3.1735991,19.1045695 3.1735991,18 C3.1735991,17.9445645 3.17590391,17.889153 3.18050758,17.833909 L3.84717425,9.83390904 C3.93355627,8.79732479 4.80008849,8 5.84026576,8 Z M10.5,10 C10.2238576,10 10,10.2238576 10,10.5 L10,11.5 C10,11.7761424 10.2238576,12 10.5,12 L13.5,12 C13.7761424,12 14,11.7761424 14,11.5 L14,10.5 C14,10.2238576 13.7761424,10 13.5,10 L10.5,10 Z" fill="#000000"></path>
                                                        <path d="M10,8 L8,8 L8,7 C8,5.34314575 9.34314575,4 11,4 L13,4 C14.6568542,4 16,5.34314575 16,7 L16,8 L14,8 L14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 C10.4477153,6 10,6.44771525 10,7 L10,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <h3 class="card-label">{{ __('Create Invoice') }}</h3>
                                        <div id="loading" class="spinner spinner-primary mx-4 d-none"></div>

                                    </div>
                                    <div class="card-toolbar">
                                        <button id="ajax-submit" class="btn btn-primary font-weight-bold">
                                            <span class="svg-icon">
                                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Clothes\Briefcase.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                                        <path d="M17,4 L6,4 C4.79111111,4 4,4.7 4,6 L4,18 C4,19.3 4.79111111,20 6,20 L18,20 C19.2,20 20,19.3 20,18 L20,7.20710678 C20,7.07449854 19.9473216,6.94732158 19.8535534,6.85355339 L17,4 Z M17,11 L7,11 L7,4 L17,4 L17,11 Z" fill="#000000" fill-rule="nonzero"/>
                                                        <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="5" rx="0.5"/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            {{ __('Save Data') }}</button>

                                        <a href="{{ route('dashboard.products.index') }}" class="btn btn-light font-weight-bold ml-2">
                                            <span class="svg-icon">
                                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Clothes\Briefcase.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                                            <rect x="0" y="7" width="16" height="2" rx="1"/>
                                                            <rect opacity="0.3" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            {{ __('Cancel') }}
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!--alert-->
                                    <div class="row justify-content-center">
                                        <div class="col-xl-9">
                                            <div class="my-5">
                                                <!--begin::Group-->
                                                <div class="form-group row fv-plugins-icon-container">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        {{ __('Invoice Number') }}
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input id="invoice_number" class="form-control form-control-solid form-control-lg" value="{{ $next_invoice_number }}"
                                                               type="text" placeholder="{{ __('Invoice Number') }}" disabled required>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <!--end::Group-->

                                                <div class="form-group row fv-plugins-icon-container">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        {{ __('Customer Name') }}
                                                    </label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <select class="form-control form-control-solid form-control-lg" name="customer_id">
                                                            <option value="">{{ __('--Undefined--') }}</option>
                                                            @foreach($customers as $customer)
                                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div id="customer_id_error" class="invalid-feedback"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group row fv-plugins-icon-container">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        {{ __('Product Name') }}
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <select class="form-control form-control-solid form-control-lg" name="product_id">
                                                            <option value="">{{ __('--Undefined--') }}</option>
                                                            @foreach($products as $product)
                                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div id="product_id_error" class="invalid-feedback"></div>
                                                    </div>
                                                </div>

                                                <!--begin::Group-->
                                                <div class="form-group row fv-plugins-icon-container">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        {{ __('Product Price') }}
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-solid form-control-lg"
                                                               id="price" name="price" type="number" required>
                                                        <div id="price_error" class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <!--end::Group-->

                                                <!--begin::Group-->
                                                <div class="form-group row fv-plugins-icon-container">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        {{ __('Quantity') }}
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-solid form-control-lg"
                                                               id="quantity" name="quantity" type="number" required>
                                                        <div id="quantity_error" class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <!--end::Group-->

                                                <!--begin::Group-->
                                                <div class="form-group row fv-plugins-icon-container">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        {{ __('Invoice Date') }}
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-solid form-control-lg" data-time-zone="{{ config('timezone') }}"
                                                               type="datetime-local" value="{{ date('Y-m-d\TH:i:00') }}" id="invoiced_at" name="invoiced_at">
                                                        <div id="invoiced_at_error" class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <!--end::Group-->

                                                <!--begin::Group-->
                                                <div class="form-group row fv-plugins-icon-container">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        {{ __('Due Date') }}
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-solid form-control-lg"
                                                               type="datetime-local" value="{{ date('Y-m-d\TH:i:00') }}" id="due_at" name="due_at">
                                                        <div id="due_at_error" class="invalid-feedback"></div>
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
    <script>
        $(document).ready(function () {

            // real time date
            // var interval = setInterval(function() {
            //     $('#invoiced_at').val(new Date().toJSON().slice(0,19));
            // }, 100);

            $('#ajax-submit').click(function (event) {
                event.preventDefault();

                var form = $('#create_invoice_form')

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
                                text: response.data.product_name,
                                showConfirmButton: false,
                                timer: 2000,
                                customClass: {
                                    content: "mb-5"
                                }
                            })

                            // Make inputs empty
                            $('#create_invoice_form')[0].reset()
                            // or
                            // $('input').val('')

                            // reset invoice number
                            $('#invoice_number').val(response.data.next_invoice_number)
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
