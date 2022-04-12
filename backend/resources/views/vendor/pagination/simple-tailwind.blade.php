@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
    <div class="my-auto">
        <p id="page" class="text-lg text-gray-700 leading-5">
            {!! __('検索結果') !!}
            <span class="text-red-400 font-bold">{{ $paginator->total() }}</span>
            {!! __('件') !!}
            @if ($paginator->firstItem())
            <span class="font-medium">{{ $paginator->firstItem() }}</span>
            {!! __('〜') !!}
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
            {!! __('件を表示') !!}
            @else
            {{ $paginator->count() }}
            @endif
        </p>
    </div>

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}#page" rel="next"
        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
        {!! __('次の10件を表示') !!}
    </a>
    @else
    <span
        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
        {!! __('次の10件を表示') !!}
    </span>
    @endif
</nav>
@endif
