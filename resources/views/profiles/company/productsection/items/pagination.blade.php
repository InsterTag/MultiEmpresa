<!-- Pagination -->
                    <div class="flex flex-col lg:flex-row justify-between items-center mt-6 pt-6 border-t border-gray-200">
                    <!-- Contador -->
                    <p class="text-gray-600 text-sm mb-4 lg:mb-0">
                        Mostrando {{ $products->firstItem() }}-{{ $products->lastItem() }} de {{ $products->total() }} productos
                    </p>
                    
                    <!-- Botones de paginación -->
                    <div class="flex gap-2">
                        @if($products->onFirstPage())
                        <span class="px-3 py-2 border border-gray-300 rounded-lg text-gray-400 cursor-not-allowed">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                        @else
                        <a href="{{ $products->previousPageUrl() }}" class="px-3 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        @endif
                        
                        @foreach($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        @if($page == $products->currentPage())
                        <span class="px-3 py-2 bg-primary text-white rounded-lg">{{ $page }}</span>
                        @else
                        <a href="{{ $url }}" class="px-3 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">{{ $page }}</a>
                        @endif
                        @endforeach
                        
                        @if($products->hasMorePages())
                        <a href="{{ $products->nextPageUrl() }}" class="px-3 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                        @else
                        <span class="px-3 py-2 border border-gray-300 rounded-lg text-gray-400 cursor-not-allowed">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                        @endif
                    </div>
                </div>
                
            </div>
        </div>