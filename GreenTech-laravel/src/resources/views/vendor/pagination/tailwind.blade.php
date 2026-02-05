@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between px-4 py-8">
        <!-- Mobile Pagination -->
        <div class="flex flex-1 justify-between sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 cursor-not-allowed leading-5 rounded-lg">
                    Précédent
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-green-600 leading-5 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition">
                    Précédent
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-white bg-green-600 border border-green-600 leading-5 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition">
                    Suivant
                </a>
            @else
                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 cursor-not-allowed leading-5 rounded-lg">
                    Suivant
                </span>
            @endif
        </div>

        <!-- Desktop Pagination -->
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-start">
            <div>
<span class="relative z-0 inline-flex items-center shadow-lg rounded-2xl overflow-hidden border border-gray-300">
                    {{-- Previous Button --}}
                    @if ($paginator->onFirstPage())
                        <span class="relative inline-flex items-center px-4 py-3 text-sm font-semibold text-gray-400 bg-gray-100 cursor-not-allowed border border-gray-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-3 text-sm font-semibold text-white bg-green-600 hover:bg-green-700 focus:z-10 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span class="relative inline-flex items-center px-4 py-3 text-sm font-semibold text-gray-700 bg-white border border-gray-300">
                                {{ $element }}
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span class="relative inline-flex items-center px-4 py-3 text-sm font-bold text-white bg-gradient-to-r from-green-600 to-green-700 border-2 border-green-600 z-10 shadow-md">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-3 text-sm font-semibold text-gray-700 bg-white hover:bg-green-50 hover:text-green-600 border border-gray-300 focus:z-10 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Button --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-3 text-sm font-semibold text-white bg-green-600 hover:bg-green-700 focus:z-10 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    @else
                        <span class="relative inline-flex items-center px-4 py-3 text-sm font-semibold text-gray-400 bg-gray-100 cursor-not-allowed border border-gray-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </span>
                    @endif
                </span>
            </div>
        </div>

        <!-- Pagination Info -->
        <div class="hidden sm:flex sm:items-center sm:justify-end mt-4 sm:mt-0">
            <p class="text-sm text-gray-600 bg-white px-4 py-2 rounded-lg shadow-md border border-gray-200">
                Affichage de
                <span class="font-semibold text-green-600">{{ $paginator->firstItem() }}</span>
                à
                <span class="font-semibold text-green-600">{{ $paginator->lastItem() }}</span>
                sur
                <span class="font-semibold text-green-600">{{ $paginator->total() }}</span>
                résultats
            </p>
        </div>
    </nav>
@endif