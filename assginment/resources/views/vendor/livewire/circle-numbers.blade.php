@if ($paginator->hasPages())
    <ul class="pagination circle-pagination justify-content-center">
        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span class="page-link rounded-circle">&laquo;</span></li>
        @else
            <li class="page-item"><a class="page-link rounded-circle" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        {{-- Page Numbers --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled"><span class="page-link rounded-circle">{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><span class="page-link rounded-circle">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link rounded-circle" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link rounded-circle" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
            <li class="page-item disabled"><span class="page-link rounded-circle">&raquo;</span></li>
        @endif
    </ul>
@endif
