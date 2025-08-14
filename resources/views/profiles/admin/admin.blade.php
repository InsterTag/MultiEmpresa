<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
 <script src="https://cdn.jsdelivr.net/npm/lucide@latest/dist/umd/lucide.js"></script>

    @vite('resources/css/admin.css')
</head>
<body class="custom-bg-light min-h-screen">
    <!-- Header -->
    @include('profiles.admin.items.header')

    <!-- Navigation Tabs -->
    @include('profiles.admin.items.navegation')

    <!-- Main Content -->
    @include('profiles.admin.items.mainContent')

    <!-- register company  -->
<div id="createCompanyModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50 p-4">
    <div class="custom-bg-white rounded-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto slide-in">
        <!-- HEADER -->
        <div class="sticky top-0 custom-bg-white rounded-t-lg border-b border-gray-200 p-6 pb-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <h3 id="modalTitle" class="text-lg font-semibold custom-text-primary">Registro Usuario</h3>
                    <!-- Stepper indicator -->
                    <div class="flex items-center space-x-2">
                        <span id="step1Indicator" class="flex items-center justify-center w-6 h-6 rounded-full bg-blue-600 text-white text-xs font-bold">1</span>
                        <span class="text-gray-400">→</span>
                        <span id="step2Indicator" class="flex items-center justify-center w-6 h-6 rounded-full bg-gray-200 text-gray-600 text-xs font-bold">2</span>
                    </div>
                </div>
                <button onclick="closeCreateCompanyModal()" class="p-2 rounded-full hover:bg-gray-100">
                    <i data-lucide="x" class="w-6 h-6 custom-text-secondary"></i>
                </button>
            </div>
        </div>

        <form id="companyRegistrationForm" method="POST" action="{{ route('register.company') }}" class="space-y-6">
            @csrf
            <!-- STEP 1: Usuario -->
            <div id="stepUser" class="p-6 pt-4">
                @include('auth.company.user')
            </div>

            <!-- STEP 2: Empresa -->
            <div id="stepCompany" class="p-6 pt-4 hidden">
                @include('auth.company.register')
            </div>
        </form>
    </div>
</div>

    </div>
    <script>
        
        // Initialize Lucide icons
        lucide.createIcons();

        // Tab switching functionality
        function switchTab(tabName) {
            // Hide all tab contents
            const contents = document.querySelectorAll('.tab-content');
            contents.forEach(content => content.classList.add('hidden'));
            
            // Show selected tab content
            document.getElementById(`content-${tabName}`).classList.remove('hidden');
            document.getElementById(`content-${tabName}`).classList.add('fade-in');
            
            // Update tab buttons
            const tabs = document.querySelectorAll('[id^="tab-"]');
            tabs.forEach(tab => {
                tab.classList.remove('active-tab');
                tab.classList.add('inactive-tab');
            });
            
            document.getElementById(`tab-${tabName}`).classList.remove('inactive-tab');
            document.getElementById(`tab-${tabName}`).classList.add('active-tab');
        }

        // Modal functionality
        function openCreateCompanyModal() {
            document.getElementById('createCompanyModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeCreateCompanyModal() {
            document.getElementById('createCompanyModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            document.getElementById('createCompanyForm').reset();
        }

        // Form submission handling
        document.getElementById('createCompanyForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Here you would normally send data to Laravel backend
            const formData = new FormData(this);
            
            // Show success message (you can replace this with actual Laravel form submission)
            showNotification('Empresa creada exitosamente', 'success');
            closeCreateCompanyModal();
            
            // Reload companies data
            // loadCompaniesData();
        });

        // Notification system
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300`;
            
            if (type === 'success') {
                notification.classList.add('bg-green-500', 'text-white');
            } else if (type === 'error') {
                notification.classList.add('bg-red-500', 'text-white');
            } else {
                notification.classList.add('custom-primary-bg', 'text-white');
            }
            
            notification.innerHTML = `
                <div class="flex items-center space-x-2">
                    <i data-lucide="check-circle" class="w-5 h-5"></i>
                    <span>${message}</span>
                </div>
            `;
            
            document.body.appendChild(notification);
            lucide.createIcons();
            
            // Animate in
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            // Remove after 3 seconds
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }

        // Close modal when clicking outside
        document.getElementById('createCompanyModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeCreateCompanyModal();
            }
        });

        // Escape key to close modal
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeCreateCompanyModal();
            }
        });

        // Search functionality placeholders
        function setupSearchFilters() {
            const searchInputs = document.querySelectorAll('input[placeholder*="Buscar"]');
            searchInputs.forEach(input => {
                input.addEventListener('input', function(e) {
                    // Here you would implement search functionality with Laravel backend
                    console.log('Search query:', e.target.value);
                });
            });
        }

        // Table action handlers
        function editCompany(companyId) {
            console.log('Edit company:', companyId);
            // Implement edit functionality
        }

        function deleteCompany(companyId) {
            if (confirm('¿Estás seguro de que deseas eliminar esta empresa?')) {
                console.log('Delete company:', companyId);
                // Implement delete functionality
            }
        }

        function viewCompanyDetails(companyId) {
            console.log('View company details:', companyId);
            // Implement view details functionality
        }

        function editUser(userId) {
            console.log('Edit user:', userId);
            // Implement edit user functionality
        }

        function toggleUserStatus(userId) {
            console.log('Toggle user status:', userId);
            // Implement toggle user status functionality
        }

        function viewMessage(messageId) {
            console.log('View message:', messageId);
            // Implement view message functionality
        }

        function markMessageAsRead(messageId) {
            console.log('Mark message as read:', messageId);
            // Implement mark as read functionality
        }

        function respondToMessage(messageId) {
            console.log('Respond to message:', messageId);
            // Implement respond functionality
        }

        // Initialize the dashboard
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize search filters
            setupSearchFilters();
            
            // Load initial data (these would be Laravel AJAX calls)
            // loadDashboardStats();
            // loadCompaniesData();
            // loadUsersData();
            // loadMessagesData();
            
            console.log('Super Admin Dashboard initialized');
            console.log('Ready for Laravel integration');
        });

        // Data loading functions (to be connected with Laravel backend)
        function loadDashboardStats() {
            // Example: fetch('/api/admin/stats').then(response => response.json())
            // These placeholders show where Laravel data would be integrated
            console.log('Loading dashboard statistics...');
        }

        function loadCompaniesData(page = 1, search = '', filters = {}) {
            // Example: fetch(`/api/admin/companies?page=${page}&search=${search}`)
            console.log('Loading companies data...');
        }

        function loadUsersData(page = 1, search = '', filters = {}) {
            // Example: fetch(`/api/admin/users?page=${page}&search=${search}`)
            console.log('Loading users data...');
        }

        function loadMessagesData(page = 1, status = '', type = '') {
            // Example: fetch(`/api/admin/messages?page=${page}&status=${status}&type=${type}`)
            console.log('Loading messages data...');
        }

        // Utility functions for formatting
        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('es-ES', {
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            });
        }

        function formatCurrency(amount) {
            return new Intl.NumberFormat('es-CO', {
                style: 'currency',
                currency: 'COP'
            }).format(amount);
        }

        // Smooth scroll to top when switching tabs
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Update tab switching to include scroll
        const originalSwitchTab = switchTab;
        switchTab = function(tabName) {
            originalSwitchTab(tabName);
            scrollToTop();
        };

//     function goToCompanyStep() {
//     document.getElementById('stepUser').classList.add('hidden');
//     document.getElementById('stepCompany').classList.remove('hidden');
//     document.getElementById('modalTitle').innerText = "Registro Empresa";
// }

// function goToUserStep() {
//     document.getElementById('stepCompany').classList.add('hidden');
//     document.getElementById('stepUser').classList.remove('hidden');
//     document.getElementById('modalTitle').innerText = "Registro Usuario";
// }


// Función para avanzar al paso de empresa
function goToCompanyStep() {
    // Validar el formulario de usuario
    const userFormValid = validateUserForm();
    
    if(userFormValid) {
        // Ocultar paso de usuario y mostrar paso de empresa
        document.getElementById('stepUser').classList.add('hidden');
        document.getElementById('stepCompany').classList.remove('hidden');
        
        // Actualizar indicadores de pasos
        document.getElementById('step1Indicator').classList.remove('bg-blue-600', 'text-white');
        document.getElementById('step1Indicator').classList.add('bg-green-500', 'text-white');
        document.getElementById('step2Indicator').classList.remove('bg-gray-200', 'text-gray-600');
        document.getElementById('step2Indicator').classList.add('bg-blue-600', 'text-white');
        
        // Actualizar título del modal
        document.getElementById('modalTitle').innerText = "Registro Empresa";
    }
}

// Función para retroceder al paso de usuario
function goToUserStep() {
    document.getElementById('stepCompany').classList.add('hidden');
    document.getElementById('stepUser').classList.remove('hidden');
    
    // Actualizar indicadores de pasos
    document.getElementById('step1Indicator').classList.add('bg-blue-600', 'text-white');
    document.getElementById('step1Indicator').classList.remove('bg-green-500', 'text-white');
    document.getElementById('step2Indicator').classList.add('bg-gray-200', 'text-gray-600');
    document.getElementById('step2Indicator').classList.remove('bg-blue-600', 'text-white');
    
    // Actualizar título del modal
    document.getElementById('modalTitle').innerText = "Registro Usuario";
}

// Función para validar el formulario de usuario
function validateUserForm() {
    const form = document.getElementById('companyRegistrationForm');
    const name = form.querySelector('input[name="user_name"]');
    const email = form.querySelector('input[name="user_email"]');
    const password = form.querySelector('input[name="user_password"]');
    const passwordConfirmation = form.querySelector('input[name="user_password_confirmation"]');
    
    // Resetear errores
    document.querySelectorAll('.error-message').forEach(el => el.remove());
    document.querySelectorAll('.border-red-500').forEach(el => el.classList.remove('border-red-500'));
    
    let isValid = true;
    
    // Validar nombre
    if (!name.value.trim()) {
        showFieldError(name, 'El nombre es requerido');
        isValid = false;
    }
    
    // Validar email
    if (!email.value.trim()) {
        showFieldError(email, 'El email es requerido');
        isValid = false;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
        showFieldError(email, 'Ingrese un email válido');
        isValid = false;
    }
    
    // Validar contraseña
    if (!password.value) {
        showFieldError(password, 'La contraseña es requerida');
        isValid = false;
    } else if (password.value.length < 8) {
        showFieldError(password, 'La contraseña debe tener al menos 8 caracteres');
        isValid = false;
    }
    
    // Validar confirmación de contraseña
    if (password.value !== passwordConfirmation.value) {
        showFieldError(passwordConfirmation, 'Las contraseñas no coinciden');
        isValid = false;
    }
    
    return isValid;
}

// Función para mostrar errores en campos
function showFieldError(field, message) {
    field.classList.add('border-red-500');
    const errorElement = document.createElement('p');
    errorElement.className = 'mt-1 text-sm text-red-600 error-message';
    errorElement.textContent = message;
    field.parentNode.insertBefore(errorElement, field.nextSibling);
}

// Cerrar modal y resetear formulario
function closeCreateCompanyModal() {
    document.getElementById('createCompanyModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
    document.getElementById('companyRegistrationForm').reset();
    
    // Resetear pasos
    document.getElementById('stepCompany').classList.add('hidden');
    document.getElementById('stepUser').classList.remove('hidden');
    document.getElementById('modalTitle').innerText = "Registro Usuario";
    
    // Resetear indicadores
    document.getElementById('step1Indicator').classList.add('bg-blue-600', 'text-white');
    document.getElementById('step1Indicator').classList.remove('bg-green-500');
    document.getElementById('step2Indicator').classList.add('bg-gray-200', 'text-gray-600');
    document.getElementById('step2Indicator').classList.remove('bg-blue-600', 'text-white');
    
    // Limpiar errores
    document.querySelectorAll('.error-message').forEach(el => el.remove());
    document.querySelectorAll('.border-red-500').forEach(el => el.classList.remove('border-red-500'));
}

</script>
</body>
</html>