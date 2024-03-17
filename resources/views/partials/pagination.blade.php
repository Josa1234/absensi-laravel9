<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">

        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">Previous</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">Previous</a>
            </li>
        @endif

        <li class="page-item disabled">
            <span class="page-link">{{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}</span>
        </li>

        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="page-link">Next</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">Next</span>
            </li>
        @endif

    </ul>
</nav>
