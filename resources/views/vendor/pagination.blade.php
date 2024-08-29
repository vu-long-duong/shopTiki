@if ($paginator->hasPages())
    <ul class="pagination" style="padding-right: 8px;">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled page-item" style="margin-left: auto;"><span class="page-link" aria-hidden="true">&laquo;</span></li>
        @else
            <li class="page-item" style="margin-left: auto;"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><span
                        aria-hidden="true">&laquo;</span></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled page-item"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active page-item"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><span
                        aria-hidden="true">&raquo;</span></a></li>
        @else
            <li class="disabled page-item"><span class="page-link" aria-hidden="true">&raquo;</span></li>
        @endif
    </ul>
@endif
