<!-- Payments -->
<div id="payments-content" class="tab-content hidden">
    <div class="grid gap-6">
        <div class="custom-bg-white rounded-2xl card-shadow p-6 scale-hover">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold custom-text-primary">💳 Métodos de Pago</h3>
                <button id="openModalBtn" 
                        class="custom-primary-bg text-white px-6 py-3 rounded-xl hover:scale-105 hover:custom-primary-dark-bg transition transform duration-200 font-semibold shadow-md">
                    <i class="fas fa-plus mr-2"></i>Agregar Método
                </button>
            </div>

            <!-- Mensajes de estado -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 transition-opacity duration-300">
                    {{ session('success') }}
                </div>
            @endif
            
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 transition-opacity duration-300">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 transition-opacity duration-300">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- LISTADO DE TARJETAS -->
            <div class="space-y-4">
                @forelse($cards as $card)
                    <div class="flex items-center justify-between p-6 border custom-border rounded-2xl hover:shadow-lg transition-all duration-300 hover:-translate-y-1 bg-gradient-to-r 
                        {{ $card->card_type === 'visa' ? 'from-blue-50 to-blue-100' : 'from-red-50 to-orange-100' }}">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-12 
                                {{ $card->card_type === 'visa' ? 'bg-gradient-to-r from-blue-600 to-purple-600' : 'bg-gradient-to-r from-red-600 to-orange-600' }}
                                rounded-lg flex items-center justify-center shadow-md">
                                <i class="fab fa-cc-{{ strtolower($card->card_type) }} text-white text-2xl"></i>
                            </div>
                            <div>
                                <p class="font-bold text-lg custom-text-primary">
                                    •••• •••• •••• {{ substr($card->card_number, -4) }}
                                </p>
                                <p class="custom-text-secondary text-sm">Expira {{ $card->expiry }}</p>
                                <p class="text-green-600 font-semibold">
                                    Saldo: ${{ number_format($card->balance, 2) }}
                                </p>
                            </div>
                        </div>
                        <form action="{{ route('payments.destroy', $card) }}" method="POST" class="delete-card-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 transition transform hover:scale-110 p-2">
                                <i class="fas fa-trash-alt text-lg"></i>
                            </button>
                        </form>
                    </div>
                @empty
                    <p class="text-gray-500 italic py-4 text-center">No tienes tarjetas guardadas.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- MODAL AGREGAR TARJETA -->
<div id="addCardModal" class="fixed inset-0 hidden items-center justify-center z-50 transition-opacity duration-300">
    <div id="modalOverlay" class="absolute inset-0 bg-black bg-opacity-0 transition-opacity duration-300"></div>

    <div id="modalContent" class="relative bg-white rounded-2xl shadow-2xl p-6 md:p-8 w-11/12 max-w-md transform scale-95 transition-transform duration-300">
        <button id="closeModalBtn" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <i class="fas fa-times text-xl"></i>
        </button>
        
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Agregar Tarjeta</h2>
        <form id="cardForm" action="{{ route('payments.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block mb-2 font-semibold text-gray-700">Número de tarjeta</label>
                <input type="text" name="card_number" maxlength="19" required 
                       class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-colors duration-200" 
                       placeholder="1234 5678 9012 3456"
                       pattern="[0-9\s]{13,19}">
                <p class="text-xs text-gray-500 mt-1">Ingresa solo números. Se formateará automáticamente.</p>
            </div>
            <div>
                <label class="block mb-2 font-semibold text-gray-700">Titular</label>
                <input type="text" name="holder_name" required 
                       class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-colors duration-200" 
                       placeholder="Nombre del titular">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 font-semibold text-gray-700">Expira (MM/AA)</label>
                    <input type="text" name="expiry" required 
                           class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-colors duration-200" 
                           placeholder="MM/AA"
                           pattern="(0[1-9]|1[0-2])\/([0-9]{2})"
                           maxlength="5">
                </div>
                <div>
                    <label class="block mb-2 font-semibold text-gray-700">CVV</label>
                    <input type="text" name="cvv" maxlength="4" required 
                           class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-colors duration-200" 
                           placeholder="123">
                </div>
            </div>
            <div>
                <label class="block mb-2 font-semibold text-gray-700">Tipo</label>
                <select name="card_type" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-colors duration-200">
                    <option value="visa">Visa</option>
                    <option value="mastercard">MasterCard</option>
                </select>
            </div>
            <div>
                <label class="block mb-2 font-semibold text-gray-700">Saldo inicial</label>
                <input type="number" name="balance" step="0.01" min="0" 
                       class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-colors duration-200" 
                       placeholder="Ej: 500.00">
            </div>
            <div class="flex justify-end space-x-3 pt-2">
                <button type="button" id="cancelBtn" 
                        class="px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-100 transition-colors duration-200">Cancelar</button>
                <button type="submit" 
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-200 transform hover:scale-105 shadow-md">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Elementos DOM
const modal = document.getElementById('addCardModal');
const overlay = document.getElementById('modalOverlay');
const content = document.getElementById('modalContent');
const openModalBtn = document.getElementById('openModalBtn');
const closeModalBtn = document.getElementById('closeModalBtn');
const cancelBtn = document.getElementById('cancelBtn');
const cardForm = document.getElementById('cardForm');
const cardNumberInput = document.querySelector('input[name="card_number"]');
const expiryInput = document.querySelector('input[name="expiry"]');
const cvvInput = document.querySelector('input[name="cvv"]');
const deleteForms = document.querySelectorAll('.delete-card-form');

// Funcionalidad del modal
function toggleModal(show) {
    if (show) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => {
            overlay.classList.remove('bg-opacity-0');
            overlay.classList.add('bg-opacity-60');
            content.classList.remove('scale-95');
            content.classList.add('scale-100');
        }, 50);
        document.body.style.overflow = 'hidden';
    } else {
        overlay.classList.remove('bg-opacity-60');
        overlay.classList.add('bg-opacity-0');
        content.classList.remove('scale-100');
        content.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }, 300);
    }
}

// Event listeners
openModalBtn.addEventListener('click', () => toggleModal(true));
closeModalBtn.addEventListener('click', () => toggleModal(false));
cancelBtn.addEventListener('click', () => toggleModal(false));
overlay.addEventListener('click', () => toggleModal(false));

// Formatear número de tarjeta
cardNumberInput.addEventListener('input', function(e) {
    let value = e.target.value.replace(/\s+/g, '');
    let formattedValue = '';
    
    for (let i = 0; i < value.length; i++) {
        if (i > 0 && i % 4 === 0) formattedValue += ' ';
        formattedValue += value[i];
    }
    
    e.target.value = formattedValue;
});

// Validar solo números
cardNumberInput.addEventListener('keypress', function(e) {
    const charCode = (e.which) ? e.which : e.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        e.preventDefault();
    }
});

// Formatear fecha de expiración
expiryInput.addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    
    if (value.length > 0) {
        value = value.match(/.{1,2}/g).join('/');
    }
    
    if (value.length > 5) value = value.substring(0, 5);
    e.target.value = value;
});

// Validar CVV (solo números)
cvvInput.addEventListener('keypress', function(e) {
    const charCode = (e.which) ? e.which : e.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        e.preventDefault();
    }
});

// Validar formulario antes de enviar
cardForm.addEventListener('submit', function(e) {
    // Limpiar número de tarjeta
    cardNumberInput.value = cardNumberInput.value.replace(/\s/g, '');
    
    // Validar formato de fecha
    if (!/^(0[1-9]|1[0-2])\/([0-9]{2})$/.test(expiryInput.value)) {
        e.preventDefault();
        alert('Por favor, ingresa una fecha de expiración válida en formato MM/AA');
        expiryInput.focus();
        return false;
    }
    
    // Validar que la fecha no esté expirada
    const [month, year] = expiryInput.value.split('/');
    const expiryDate = new Date(2000 + parseInt(year), parseInt(month), 0);
    if (expiryDate < new Date()) {
        e.preventDefault();
        alert('La tarjeta está expirada');
        expiryInput.focus();
        return false;
    }
    
    // Validar CVV
    if (!/^[0-9]{3,4}$/.test(cvvInput.value)) {
        e.preventDefault();
        alert('El CVV debe tener 3 o 4 dígitos');
        cvvInput.focus();
        return false;
    }
});

// Confirmar eliminación de tarjetas
deleteForms.forEach(form => {
    form.addEventListener('submit', function(e) {
        if (!confirm('¿Estás seguro de que quieres eliminar esta tarjeta?')) {
            e.preventDefault();
        }
    });
});

// Cerrar modal con tecla Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
        toggleModal(false);
    }
});
</script>