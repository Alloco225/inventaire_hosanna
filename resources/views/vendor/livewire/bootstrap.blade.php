<div class="d-flex justify-content-end">
    @if ($paginator->hasPages())
    <div class="d-flex justify-content-between align-items-center flex-wrap">

        <div class="d-flex flex-wrap py-2 mr-3">
            @if ($paginator->onFirstPage())
                <button class="btn btn-icon btn-sm btn-light mr-2 my-1 disabled">
                    <i class="ki ki-bold-arrow-back icon-xs"></i>
                </button>
            @else
                <button  class="btn btn-icon btn-sm btn-light mr-2 my-1"
                   wire:click="previousPage" wire:loading.attr="disabled"
                >
                    <i class="ki ki-bold-arrow-back icon-xs"></i>
                </button>
            @endif

            @foreach ($elements as $element)

                @if (is_string($element))
                    <button class="btn btn-icon btn-sm border-0 btn-light mr-2 my-1 disabled">{{ $element }}</button>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <button wire:key="paginator-page-{{ $page }}"
                               class="btn btn-icon btn-sm border-0 btn-light btn-hover-primary active mr-2 my-1 "
                            >{{ $page }}</button>
                        @else
                            <button wire:key="paginator-page-{{ $page }}" wire:click="gotoPage({{ $page }})"
                               class="btn btn-icon btn-sm border-0 btn-light mr-2 my-1">{{ $page }}
                            </button>
                        @endif
                    @endforeach
                @endif
            @endforeach


            @if ($paginator->hasMorePages())
                <button class="btn btn-icon btn-sm btn-light mr-2 my-1"
                   wire:click="nextPage" wire:loading.attr="disabled"
                ><i class="ki ki-bold-arrow-next icon-xs"></i></button>
            @else
                <button class="btn btn-icon btn-sm btn-light mr-2 my-1 disabled"><i class="ki ki-bold-arrow-next icon-xs"></i></button>
            @endif

        </div>
    </div>
    @endif
</div>

<!--end:: Pagination-->

