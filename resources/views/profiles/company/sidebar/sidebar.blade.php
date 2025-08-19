<div id="sidebar" class="glass-effect w-80 fixed left-0 top-0 h-screen p-6 overflow-y-auto bg-gradient-to-br from-slate-50 to-white border-r border-gray-200 shadow-xl transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-40">
    <!-- Logo & Company Info -->
    <div class="text-center mb-8">
        <div class="w-20 h-20 mx-auto mb-4 bg-gradient-to-br from-primary to-primary-dark rounded-2xl flex items-center justify-center text-white text-3xl shadow-lg hover:shadow-xl transition-shadow duration-300">
            <i class="fas fa-rocket"></i>
        </div>
        <h2 class="text-xl font-bold text-gray-800 mb-1">TechCorp Solutions</h2>
        <p class="text-sm text-gray-600">Panel de Control</p>
        <div class="mt-3">
            <span class="px-3 py-1.5 bg-green-100 text-green-800 text-xs rounded-full shadow-sm">
                <i class="fas fa-circle text-green-500 mr-1 animate-pulse"></i>Online
            </span>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="space-y-2 mb-8">
        <a href="{{route('dashboard')}}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }} flex items-center p-3 rounded-xl text-gray-800 hover:text-primary transition-all duration-300 hover:bg-primary/10 hover:shadow-md group">
            <i class="fas fa-chart-line w-5 mr-3 group-hover:scale-110 transition-transform duration-300"></i>
            <span class="font-medium">Dashboard</span>
        </a>
        
        <a href="{{route('generalInformation')}}" class="nav-link {{ request()->routeIs('generalInformation') ? 'active' : '' }} flex items-center p-3 rounded-xl text-gray-800 hover:text-primary transition-all duration-300 hover:bg-primary/10 hover:shadow-md group">
            <i class="fas fa-building w-5 mr-3 group-hover:scale-110 transition-transform duration-300"></i>
            <span class="font-medium">Información General</span>
        </a>
        
        <a href="{{route('branches')}}" class="nav-link {{ request()->routeIs('branches') ? 'active' : '' }} flex items-center p-3 rounded-xl text-gray-800 hover:text-primary transition-all duration-300 hover:bg-primary/10 hover:shadow-md group">
            <i class="fas fa-map-marker-alt w-5 mr-3 group-hover:scale-110 transition-transform duration-300"></i>
            <span class="font-medium">Sucursales</span>
        </a>
        
        <a href="{{route('employees')}}" class="nav-link {{ request()->routeIs('employees') ? 'active' : '' }} flex items-center p-3 rounded-xl text-gray-800 hover:text-primary transition-all duration-300 hover:bg-primary/10 hover:shadow-md group">
            <i class="fas fa-users w-5 mr-3 group-hover:scale-110 transition-transform duration-300"></i>
            <span class="font-medium">Empleados</span>
        </a>
        
        <a href="{{route('productsection')}}" class="nav-link {{ request()->routeIs('productsection') ? 'active' : '' }} flex items-center p-3 rounded-xl text-gray-800 hover:text-primary transition-all duration-300 hover:bg-primary/10 hover:shadow-md group">
            <i class="fas fa-box w-5 mr-3 group-hover:scale-110 transition-transform duration-300"></i>
            <span class="font-medium">Productos</span>
        </a>
        
        <a href="{{route('analysis')}}" class="nav-link {{ request()->routeIs('analysis') ? 'active' : '' }} flex items-center p-3 rounded-xl text-gray-800 hover:text-primary transition-all duration-300 hover:bg-primary/10 hover:shadow-md group">
            <i class="fas fa-chart-pie w-5 mr-3 group-hover:scale-110 transition-transform duration-300"></i>
            <span class="font-medium">Análisis Avanzado</span>
        </a>
        
        <a href="#" class="nav-link flex items-center p-3 rounded-xl text-gray-800 hover:text-primary transition-all duration-300 hover:bg-primary/10 hover:shadow-md group">
            <i class="fas fa-cog w-5 mr-3 group-hover:scale-110 transition-transform duration-300"></i>
            <span class="font-medium">Configuración</span>
        </a>
    </nav>

    @auth
    <!-- Perfil de Usuario -->
    <div class="profile-container relative mb-6">
        <button id="profileBtn" class="w-full flex items-center justify-between p-4 bg-white/50 hover:bg-white/80 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 border border-gray-200/50">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-br from-primary to-primary-dark rounded-full flex items-center justify-center shadow-lg">
                    @php
                        $initial = auth()->user()->username ? strtoupper(substr(auth()->user()->username, 0, 1)) : strtoupper(substr(auth()->user()->name, 0, 1));
                    @endphp
                    <span class="text-white text-sm font-bold">{{ $initial }}</span>
                </div>
                <div class="text-left">
                    <p class="text-sm font-semibold text-gray-800">{{ auth()->user()->username ?? auth()->user()->name }}</p>
                    <p class="text-xs text-gray-600">Administrador</p>
                </div>
            </div>
            <i class="fas fa-chevron-down text-sm text-gray-500 transition-transform duration-300" id="profileIcon"></i>
        </button>
        
        <!-- Dropdown de perfil -->
        <div id="profileDropdown" class="hidden absolute bottom-full left-0 right-0 mb-2 bg-white rounded-xl shadow-xl border border-gray-200 z-50 overflow-hidden">
            <div class="py-2">
                <div class="px-4 py-3 border-b border-gray-100">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-user-circle text-2xl text-primary"></i>
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Mi Perfil</p>
                            <p class="text-xs text-gray-500">{{ auth()->user()->email ?? 'usuario@techcorp.com' }}</p>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-3 text-red-600 hover:bg-red-50 transition-colors duration-200 flex items-center space-x-3">
                        <i class="fas fa-sign-out-alt text-lg"></i>
                        <span class="font-medium">Cerrar Sesión</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endauth

    <!-- Quick Stats -->
    <div class="space-y-4">
        <h3 class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-4">Vista Rápida</h3>
        
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-4 border border-green-200/50 shadow-sm hover:shadow-md transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-2xl font-bold text-gray-800">$24,560</p>
                    <p class="text-sm text-gray-600 font-medium">Ventas Hoy</p>
                    <p class="text-xs text-green-600 mt-1">
                        <i class="fas fa-arrow-up mr-1"></i>+12.5%
                    </p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-dollar-sign text-white text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-4 border border-blue-200/50 shadow-sm hover:shadow-md transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-2xl font-bold text-gray-800">143</p>
                    <p class="text-sm text-gray-600 font-medium">Pedidos Activos</p>
                    <p class="text-xs text-blue-600 mt-1">
                        <i class="fas fa-clock mr-1"></i>8 pendientes
                    </p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-shopping-cart text-white text-xl"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Efectos adicionales */
.glass-effect {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
}

/* Animación para el enlace activo */
.nav-link.active {
    background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
    color: white;
    box-shadow: 0 8px 25px rgba(99, 102, 241, 0.3);
    transform: translateY(-1px);
}

.nav-link.active i {
    color: white;
}

/* Efecto hover mejorado */
.nav-link:hover {
    transform: translateX(4px);
}

/* Rotación del icono del perfil */
.rotate-180 {
    transform: rotate(180deg);
}

/* Animación del dropdown */
#profileDropdown {
    animation: slideDown 0.3s ease-out;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive */
@media (max-width: 1024px) {
    #sidebar {
        position: fixed;
        left: 0;
        top: 0;
        z-index: 50;
        transform: translateX(-100%);
    }
    
    #sidebar.open {
        transform: translateX(0);
    }
}
</style>

<script>
(function() {
    // Variables para el perfil de usuario y menú móvil
    const profileBtn = document.getElementById('profileBtn');
    const profileDropdown = document.getElementById('profileDropdown');
    const profileIcon = document.getElementById('profileIcon');
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    
    // ========== FUNCIONALIDADES DEL MENÚ MÓVIL ==========
    
    // Abrir/cerrar menú móvil
    if (mobileMenuBtn && sidebar && overlay) {
        mobileMenuBtn.addEventListener('click', function() {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
            document.body.classList.toggle('overflow-hidden');
        });

        // Cerrar menú al hacer click en el overlay
        overlay.addEventListener('click', function() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        });
    }
    
    // ========== FUNCIONALIDADES DEL PERFIL DE USUARIO ==========
    
    // Event listeners para dropdown de perfil
    if (profileBtn && profileDropdown) {
        profileBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            profileDropdown.classList.toggle('hidden');
            if (profileIcon) {
                profileIcon.classList.toggle('rotate-180');
            }
        });
    }

    // ========== FUNCIONALIDADES GENERALES ==========
    
    // Cerrar dropdown con tecla Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            // Cerrar dropdown de perfil
            if (profileDropdown && !profileDropdown.classList.contains('hidden')) {
                profileDropdown.classList.add('hidden');
                if (profileIcon) {
                    profileIcon.classList.remove('rotate-180');
                }
            }
            // Cerrar menú móvil
            if (sidebar && overlay && !sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        }
    });

    // Cerrar dropdown al hacer clic fuera
    document.addEventListener('click', function(e) {
        if (profileDropdown && profileBtn && !profileBtn.contains(e.target) && !profileDropdown.contains(e.target)) {
            profileDropdown.classList.add('hidden');
            if (profileIcon) {
                profileIcon.classList.remove('rotate-180');
            }
        }
    });

    // Cerrar menú móvil en pantallas grandes
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 1024) {
            if (sidebar) sidebar.classList.remove('-translate-x-full');
            if (overlay) overlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    });

    // ========== INICIALIZACIÓN ==========
    
    function initSidebar() {
        console.log('Sidebar inicializado correctamente');
        
        // Inicializar estados
        if (profileDropdown) {
            profileDropdown.classList.add('hidden');
        }
        
        // Asegurar estado correcto del menú móvil
        if (window.innerWidth < 1024) {
            if (sidebar) sidebar.classList.add('-translate-x-full');
            if (overlay) overlay.classList.add('hidden');
        }
    }

    // Ejecutar inicialización
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initSidebar);
    } else {
        initSidebar();
    }
})();
</script>   