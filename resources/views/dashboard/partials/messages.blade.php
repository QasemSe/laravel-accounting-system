@if($errors->any())
    <div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
        <div class="alert-icon">
            <span class="svg-icon svg-icon-3x svg-icon-danger">
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
        <div class="alert-text">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li class="text-left">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="ki ki-close"></i>
                </span>
            </button>
        </div>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-custom alert-success fade show mb-5" role="alert">
        <div class="alert-icon">
            <span class="svg-icon svg-icon-3x svg-icon-white">
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
        <div class="alert-text">
            {{ session()->get('success') }}
        </div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="ki ki-close"></i>
                </span>
            </button>
        </div>
    </div>
@endif
