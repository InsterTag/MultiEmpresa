<!-- Header -->
<header class="custom-bg-white shadow-sm border-b custom-border">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <!-- Logo + Título -->
            <div class="flex items-center space-x-4">
                <div class="custom-primary-bg p-2 rounded-lg">
                    <i data-lucide="shield-check" class="w-6 h-6 text-white"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold custom-text-primary">Super Admin Panel</h1>
                    <p class="text-sm custom-text-secondary">Panel de administración principal</p>
                </div>
            </div>

            <!-- Right Side -->
            <div class="flex items-center space-x-4">
                <!-- Notifications -->
                <div class="relative">
                    <button class="p-2 rounded-lg custom-hover-bg transition-colors relative">
                        <i data-lucide="bell" class="w-5 h-5 custom-text-secondary"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                </div>

                <!-- User Profile -->
                <div class="flex items-center space-x-2 relative group">
                <!-- Icono circular -->
                <div class="w-9 h-9 custom-primary-bg rounded-full flex items-center justify-center cursor-pointer shadow-md hover:scale-105 transition" onclick="toggleLogoutMenu()">
                    <i data-lucide="user" class="w-5 h-5 text-white"></i>
                </div>
                
                <!-- Nombre -->
                <span class="text-sm font-semibold text-gray-800 cursor-pointer hover:text-blue-600" onclick="toggleLogoutMenu()">
                    Super Admin
                </span>
                
                <!-- Menú flotante -->
                <div id="logoutMenu" class="hidden absolute top-12 right-0 bg-white shadow-xl rounded-xl p-4 w-56 z-50 border border-gray-200">
                    <!-- Fecha -->
                    <div id="logoutDate" class="text-xs text-gray-500 mb-2 text-right"></div>
        
                        <!-- Botón logout -->
                        <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg transition">
                            <i data-lucide="log-out" class="inline-block w-4 h-4 mr-2"></i> 
                            Cerrar sesión
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script>
function toggleLogoutMenu() {
    const menu = document.getElementById('logoutMenu');
    menu.classList.toggle('hidden');

    // Actualizar fecha y hora al abrir
    if (!menu.classList.contains('hidden')) {
        const now = new Date();
        document.getElementById('logoutDate').innerText = 
            now.toLocaleDateString("es-CO", { day: '2-digit', month: 'long', year: 'numeric' }) +
            " - " +
            now.toLocaleTimeString("es-CO", { hour: '2-digit', minute: '2-digit' });
    }
}

// Cerrar si se hace clic afuera
window.addEventListener('click', function(e) {
    const menu = document.getElementById('logoutMenu');
    const profile = e.target.closest('.group');
    if (!profile && !menu.classList.contains('hidden')) {
        menu.classList.add('hidden');
    }
});
</script>