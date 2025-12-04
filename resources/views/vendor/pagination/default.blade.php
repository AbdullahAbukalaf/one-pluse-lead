@if ($paginator->hasPages())
    <div class="pagination_wrap">
        <ul class="pagination_nav unordered_list">

            {{-- Previous Page --}}
            @if ($paginator->onFirstPage())
                <li class="disabled">
                    <span class="pagination_btn">
                        <i class="fa-regular fa-angle-left"></i>
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="pagination_btn">
                        <i class="fa-regular fa-angle-left"></i>
                    </a>
                </li>
            @endif

            {{-- Page Numbers --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="disabled"><span class="pagination_btn">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active">
                                <span class="pagination_btn active">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="pagination_btn">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="pagination_btn">
                        <i class="fa-regular fa-angle-right"></i>
                    </a>
                </li>
            @else
                <li class="disabled">
                    <span class="pagination_btn">
                        <i class="fa-regular fa-angle-right"></i>
                    </span>
                </li>
            @endif

        </ul>
    </div>
@endif
