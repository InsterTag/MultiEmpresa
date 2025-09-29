<!-- Address (Multiple Addresses) -->
<div id="address-content" class="tab-content hidden">
    <div class="grid gap-6">
        <div class="custom-bg-white rounded-2xl card-shadow p-6 scale-hover">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-semibold custom-text-primary">Mis Direcciones</h3>
                <button id="add-address-btn" 
                    class="custom-primary-bg text-white px-6 py-3 rounded-xl hover:custom-primary-dark-bg transition-colors font-medium">
                    <i class="fas fa-plus mr-2"></i>Agregar Dirección
                </button>
            </div>

            <!-- Address List -->
            <div id="address-list" class="space-y-6">
                @forelse(Auth::user()->addresses as $address)
                    <div class="p-6 border custom-border rounded-2xl relative">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="flex items-center space-x-3 mb-3">
                                    <div class="w-12 h-12 custom-primary-bg rounded-xl flex items-center justify-center">
                                        <i class="fas fa-home text-white"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold custom-text-primary">
                                            {{'Dirección Principal'}}
                                        </h4>
                                        @if($address->is_default)
                                            <span class="px-3 py-1 bg-green-100 text-green-800 text-sm rounded-lg font-medium">Activa</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="ml-15 space-y-1">
                                    <p class="custom-text-primary font-medium">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</p>
                                    <p class="custom-text-secondary">{{ $address->address }}</p>
                                    <p class="custom-text-secondary">{{ $address->department }} - {{ $address->city }}</p>
                                    <p class="custom-text-secondary">Código Postal: {{ $address->postal_code }}</p>
                                    <p class="custom-text-secondary">{{ Auth::user()->phone }}</p>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="flex flex-col space-y-2 ml-4">
                                <button type="button" 
                                    data-id="{{ $address->id }}"
                                    data-address="{{ $address->address }}"
                                    data-department="{{ $address->department }}"
                                    data-city="{{ $address->city }}"
                                    data-postal="{{ $address->postal_code }}"
                                    class="edit-address-btn px-4 py-2 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 transition">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('addresses.destroy', $address) }}" method="POST" onsubmit="return confirm('¿Eliminar esta dirección?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center">No tienes direcciones guardadas.</p>
                @endforelse
            </div>

            <!-- Address Form (Hidden by default) -->
            <form id="address-form" method="POST" 
                  class="hidden mt-6 p-6 border custom-border rounded-2xl">
                @csrf
                <input type="hidden" name="_method" id="form_method" value="POST">
                <input type="hidden" name="address_id" id="address_id">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium custom-text-primary mb-2">Dirección Completa</label>
                        <input type="text" name="address" id="form_address"
                            class="w-full px-4 py-3 border custom-border rounded-xl focus:border-blue-500 focus:outline-none transition-colors" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium custom-text-primary mb-2">Ciudad</label>
                        <input type="text" name="city" id="form_city"
                            class="w-full px-4 py-3 border custom-border rounded-xl focus:border-blue-500 focus:outline-none transition-colors">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label class="block text-sm font-medium custom-text-primary mb-2">Departamento</label>
                        <input type="text" name="department" id="form_department"
                            class="w-full px-4 py-3 border custom-border rounded-xl focus:border-blue-500 focus:outline-none transition-colors">
                    </div>
                    <div>
                        <label class="block text-sm font-medium custom-text-primary mb-2">Código Postal</label>
                        <input type="text" name="postal_code" id="form_postalcode"
                            class="w-full px-4 py-3 border custom-border rounded-xl focus:border-blue-500 focus:outline-none transition-colors">
                    </div>
                </div>

                <div class="flex justify-end space-x-4 mt-6">
                    <button type="button" id="cancel-address-btn"
                        class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors font-medium">
                        Cancelar
                    </button>
                    <button type="submit" class="custom-primary-bg text-white px-6 py-3 rounded-xl hover:custom-primary-dark-bg transition-colors font-medium">
                        <i class="fas fa-save mr-2"></i>Guardar Dirección
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const addBtn = document.getElementById("add-address-btn");
    const form = document.getElementById("address-form");
    const cancelBtn = document.getElementById("cancel-address-btn");
    const methodInput = document.getElementById("form_method");
    const addressIdInput = document.getElementById("address_id");

    const formAddress = document.getElementById("form_address");
    const formCity = document.getElementById("form_city");
    const formDepartment = document.getElementById("form_department");
    const formPostal = document.getElementById("form_postalcode");

    // Nueva dirección
    addBtn.addEventListener("click", () => {
        form.reset();
        addressIdInput.value = "";
        form.action = "{{ route('addresses.store') }}";
        methodInput.value = "POST";
        form.classList.remove("hidden");
    });

    // Cancelar
    cancelBtn.addEventListener("click", () => {
        form.classList.add("hidden");
    });

    // Editar dirección
    document.querySelectorAll(".edit-address-btn").forEach(btn => {
        btn.addEventListener("click", () => {
            const id = btn.dataset.id;
            form.action = `/addresses/${id}`;
            methodInput.value = "PUT";
            addressIdInput.value = id;

            // Rellenar datos
            formAddress.value = btn.dataset.address;
            formCity.value = btn.dataset.city;
            formDepartment.value = btn.dataset.department;
            formPostal.value = btn.dataset.postal;

            form.classList.remove("hidden");
        });
    });
});
</script>
