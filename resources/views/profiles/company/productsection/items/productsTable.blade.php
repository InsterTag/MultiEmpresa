                <div class="glass-effect rounded-2xl p-6 animate-fade-in" style="animation-delay: 0.5s;">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-200">
                                    <th class="text-left py-3 px-4 font-semibold text-gray-800">Producto</th>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-800 hidden md:table-cell">SKU</th>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-800 hidden lg:table-cell">Categoría</th>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-800">Precio</th>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-800 hidden sm:table-cell">Stock</th>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-800">Estado</th>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-800">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr class="border-b border-gray-200 hover:bg-white/30 transition-colors">
                            <td class="py-4 px-4">
                            <div class="flex items-center">
                                @if($product->media)
                                    <img src="{{ asset('storage/' . $product->media) }}" alt="{{ $product->name }}" class="w-12 h-12 rounded-lg mr-3">
                                @else
                                    <img src="https://via.placeholder.com/50x50/3b82f6/ffffff?text=IMG" alt="Producto" class="w-12 h-12 rounded-lg mr-3">
                                @endif
                                <div>
                                    <h4 class="font-semibold text-gray-800">{{ $product->name }}</h4>
                                    <p class="text-sm text-gray-600 hidden sm:block">{{ $product->description }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4 text-gray-600 hidden md:table-cell">{{ $product->barcode ?? '-' }}</td>
                        <td class="py-4 px-4 text-gray-600 hidden lg:table-cell">{{ $product->category ?? 'General' }}</td>
                        <td class="py-4 px-4 font-semibold text-gray-800">${{ number_format($product->unit_price, 2) }}</td>
                        <td class="py-4 px-4 text-gray-600 hidden sm:table-cell">
                            {{ $product->stock ?? '0' }}
                        </td>
                        <td class="py-4 px-4">
                            @if($product->state === 'available')
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">En Stock</span>
                            @else
                                <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm">No Disponible</span>
                            @endif
                        </td>
                        <td class="py-4 px-4">
                            <div class="flex gap-2">
                                <button onclick="openViewModal({{ $product->id }}, '{{ addslashes($product->name) }}', '{{ $product->barcode }}', '{{ $product->category }}', {{ $product->unit_price }}, '{{ $product->stock }}', '{{ $product->state }}', '{{ addslashes($product->description) }}', '{{ $product->media }}')" 
                                    class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition-colors" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button onclick="openEditModal({{ $product->id }}, '{{ addslashes($product->name) }}', '{{ $product->barcode }}', '{{ $product->category }}', {{ $product->unit_price }}, '{{ $product->stock }}', '{{ $product->state }}', '{{ addslashes($product->description) }}', '{{ $product->media }}')" 
                                    class="p-2 text-yellow-600 hover:bg-yellow-100 rounded-lg transition-colors" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="openDeleteModal({{ $product->id }}, '{{ addslashes($product->name) }}')" 
                                    class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition-colors" title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
</table>
</div>