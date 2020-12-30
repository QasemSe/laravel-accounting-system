@if ($paginator->hasPages())
    <div class="card card-custom">
        <div class="card-body py-7">
            <!--begin::Pagination-->
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="d-flex flex-wrap mr-3">
                    {{-- Previous Page Links --}}
                    @if($paginator->onFirstPage())
                        <a  class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <i class="ki ki-bold-double-arrow-{{ app()->getLocale() == 'ar' ? 'next' : 'back' }} icon-xs"></i>
                        </a>
                        <a class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <i class="ki ki-bold-arrow-{{ app()->getLocale() == 'ar' ? 'next' : 'back' }} icon-xs"></i>
                        </a>
                    @else
                        <a href="{{ $paginator->url(1) }}" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1" rel="prev" aria-label="@lang('pagination.previous')">
                            <i class="ki ki-bold-double-arrow-{{ app()->getLocale() == 'ar' ? 'next' : 'back' }} icon-xs"></i>
                        </a>
                        <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1" rel="start" aria-label="@lang('pagination.previous')">
                            <i class="ki ki-bold-arrow-{{ app()->getLocale() == 'ar' ? 'next' : 'back' }} icon-xs"></i>
                        </a>
                    @endif

                    @foreach($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <a class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">{{ $element }}</a>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <a aria-current="page" class="btn btn-icon btn-sm border-0 btn-hover-primary active mr-2 my-1">{{ $page }}</a>
                                @else
                                    <a href="{{ $url }}" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">{{ $page }}</a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                            <i class="ki ki-bold-arrow-{{ app()->getLocale() == 'ar' ? 'back' : 'next' }} icon-xs"></i>
                        </a>
                        <a href="{{ $paginator->url($paginator->lastPage()) }}" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                            <i class="ki ki-bold-double-arrow-{{ app()->getLocale() == 'ar' ? 'back' : 'next' }} icon-xs"></i>
                        </a>
                    @else
                        <a class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <i class="ki ki-bold-arrow-{{ app()->getLocale() == 'ar' ? 'back' : 'next' }} icon-xs"></i>
                        </a>
                        <a class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <i class="ki ki-bold-double-arrow-{{ app()->getLocale() == 'ar' ? 'back' : 'next' }} icon-xs"></i>
                        </a>
                    @endif
                </div>

                <div class="d-flex align-items-center">
                    <span class="text-muted">
                        {!! __('pagination.showing') !!}
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('pagination.to') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                        {!! __('pagination.of') !!}
                        <span class="font-medium">{{ $paginator->total() }}</span>
                        {!! __('pagination.results') !!}
                    </span>
                </div>
            </div>
            <!--end::Pagination-->
        </div>
    </div>
@endif
