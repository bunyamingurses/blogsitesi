@if ($paginator->hasPages())
    <nav>
        
        <ul class="page-nav list-style text-center mt-5">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="flaticon-arrow-left disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo; Geri</span>
                </li>
            @else
                <li class="flaticon-arrow-left">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo; Geri</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="flaticon-arrow-right">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">İleri &rsaquo;</a>
                </li>
            @else
                <li class="flaticon-arrow-right disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">İleri &rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
