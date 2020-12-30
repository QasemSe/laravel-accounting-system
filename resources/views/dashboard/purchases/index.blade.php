@extends('dashboard.layouts.app')
@section('title'){{ __('Categories __ Index') }}@endsection
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ __('Purchases') }}</h5>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard.index') }}" class="text-muted">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted">{{ __('Purchases') }}</a>
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

            @include('dashboard.partials.messages')

            <!--begin::Row-->
                <div class="card card-custom gutter-b">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title">
                            <h3 class="card-label">{{ __('Purchases') }}
                                <span class="d-block text-muted pt-2 font-size-sm">{{ __('All Purchases Deals') }}</span></h3>
                        </div>
                        <div class="card-toolbar">
                            <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.purchases.index', ['sort' => 'month']) }}" class="nav-link py-2 px-4 {{ request()->sort == 'month' ? 'active' : null }}">{{ __('Month') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.purchases.index') }}" class="nav-link py-2 px-4 {{ request()->sort ? null : 'active' }}">{{ __('Week') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.purchases.index', ['sort' => 'day']) }}" class="nav-link py-2 px-4 {{ request()->sort == 'day' ? 'active' : null }}">{{ __('Day') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vertical-center" id="kt_advance_table_widget_2">
                                <thead class="text-light-dark">
                                <tr class="text-uppercase">
                                    <th class="pl-0" style="width: 40px">
                                        <label class="checkbox checkbox-lg checkbox-inline mr-2">
                                            <input type="checkbox" value="1">
                                            <span></span>
                                        </label>
                                    </th>
                                    <th style="min-width: 120px">{{ __('Purchase Name') }}</th>
                                    <th style="min-width: 150px">{{ __('Seller Name') }}</th>
                                    <th style="min-width: 150px">{{ __('Product Name') }}</th>
                                    <th style="min-width: 150px">{{ __('Total Price') }}</th>
                                    <th class="pr-0 text-right" style="min-width: 160px">{{ __('Actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($purchases as $purchase)
                                    <tr>
                                        <td class="pl-0 py-6">
                                            <label class="checkbox checkbox-lg checkbox-inline">
                                                <input type="checkbox" value="1">
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $purchase->name }}</span>
                                            <span class="text-muted font-weight-bold" title="{{ $purchase->created_at }}">
                                                {{ \Carbon\Carbon::parse($purchase->created_at)->diffForHumans() }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $purchase->seller->name }}</span>
                                        </td>

                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $purchase->product->name }}</span>
                                        </td>

                                        <td>
                                            <span class="label label-xl label-light-primary label-inline font-weight-bold">{{ $purchase->getTotalPrice() }}</span>
                                        </td>

                                        <td class="pr-0 text-right">
                                            <a href="{{ route('dashboard.categories.edit', $purchase->id) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3" title="{{ __('Edit') }}">
                                                <span class="svg-icon svg-icon-md svg-icon-primary">
                                                    <!--begin::Svg Icon-->
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409)"></path>
                                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </a>
                                            <form class="d-inline" action="{{ route('dashboard.purchases.destroy', $purchase->id) }}" method="post">
                                                @csrf
                                                @method('delete')

                                                <button type="button" data-purchase-name="{{ $purchase->name }}"
                                                        class="confirm-category-delete btn btn-icon btn-light btn-hover-danger btn-sm" title="{{ __('Delete') }}">

                                                        <span class="svg-icon svg-icon-md svg-icon-danger">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>

                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if(count($purchases) == 0)
                            <div class="alert alert-custom alert-light-warning fade show mb-10" role="alert">
                                <div class="alert-icon">
                                    <span class="svg-icon svg-icon-3x svg-icon-warning">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Info-circle.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"></circle>
                                                <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1"></rect>
                                                <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1"></rect>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <div class="alert-text font-weight-bold">{{ __('No records') }}</div>
                            </div>
                        @endif
                    </div>
                </div>
                <!--end::Card-->

                {{ $purchases->onEachSide(1)->links() }}
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection

@section('page-scripts')
    <script>
        $('.confirm-category-delete').click(function () {

            var form = $(this).closest('form');
            var name = $(this).data('purchase-name');

            Swal.fire({
                title: '{{ __('Are you sure delete') }} ' + name + '{{ __('?') }}',
                icon: 'warning',
                confirmButtonText: '{{ __('Confirm Delete') }}',
                cancelButtonText: '{{ __('Cancel') }}',
                showCancelButton: true,
                buttonsStyling: false,
                customClass: {
                    confirmButton: "btn btn-danger font-weight-bolder",
                    cancelButton: "btn btn-light font-weight-bolder",
                    content: "mt-0"
                }

            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
    </script>
@endsection
