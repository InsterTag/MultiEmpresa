        <div id="sidebar" class="glass-effect w-80 fixed lg:relative h-full lg:h-screen p-6 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-40 overflow-y-auto">
            <!-- Logo & Company Info -->
            <div class="text-center mb-8">
                <div class="w-20 h-20 mx-auto mb-4 bg-gradient-to-br from-primary to-primary-dark rounded-2xl flex items-center justify-center text-white text-3xl">
                    <i class="fas fa-rocket"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-800 mb-1">TechCorp Solutions</h2>
                <p class="text-sm text-gray-600">Panel de Control</p>
                <div class="mt-2">
                    <span class="px-3 py-1 bg-green-100 text-green-800 text-xs rounded-full">
                        <i class="fas fa-circle text-green-500 mr-1"></i>Online
                    </span>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="space-y-2">
                <a href="{{route('dashboard')}}" class="nav-link active flex items-center p-3 rounded-lg text-gray-800 hover:text-primary transition-colors">
                    <i class="fas fa-chart-line w-5 mr-3"></i>
                    <span>Dashboard</span>
                </a>
                
                <a href="{{route('generalInformation')}}" class="nav-link flex items-center p-3 rounded-lg text-gray-800 hover:text-primary transition-colors">
                    <i class="fas fa-building w-5 mr-3"></i>
                    <span>Información General</span>
                </a>
                
                <a href="{{route('branches')}}" class="nav-link flex items-center p-3 rounded-lg text-gray-800 hover:text-primary transition-colors">
                    <i class="fas fa-map-marker-alt w-5 mr-3"></i>
                    <span>Sucursales</span>
                </a>
                
                <a href="{{route('employees')}}" class="nav-link flex items-center p-3 rounded-lg text-gray-800 hover:text-primary transition-colors">
                    <i class="fas fa-users w-5 mr-3"></i>
                    <span>Empleados</span>
                </a>
                
                <a href="{{route('productsection')}}" class="nav-link flex items-center p-3 rounded-lg text-gray-800 hover:text-primary transition-colors">
                    <i class="fas fa-box w-5 mr-3"></i>
                    <span>Productos</span>
                </a>
                
                <a href="{{route('analysis')}}" class="nav-link flex items-center p-3 rounded-lg text-gray-800 hover:text-primary transition-colors">
                    <i class="fas fa-chart-pie w-5 mr-3"></i>
                    <span>Análisis Avanzado</span>
                </a>
                
                <a href="{{route('analysis')}}" class="nav-link flex items-center p-3 rounded-lg text-gray-800 hover:text-primary transition-colors">
                    <i class="fas fa-cog w-5 mr-3"></i>
                    <span>Configuración</span>
                </a>
            </nav>

            <!-- Quick Stats -->
            <div class="mt-8">
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-4">Vista Rápida</h3>
                
                <div class="space-y-4">
                    <div class="bg-white/20 rounded-lg p-4 backdrop-blur-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-2xl font-bold text-gray-800">$24,560</p>
                                <p class="text-sm text-gray-600">Ventas Hoy</p>
                            </div>
                            <i class="fas fa-dollar-sign text-2xl text-accent"></i>
                        </div>
                    </div>
                    
                    <div class="bg-white/20 rounded-lg p-4 backdrop-blur-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-2xl font-bold text-gray-800">143</p>
                                <p class="text-sm text-gray-600">Pedidos Activos</p>
                            </div>
                            <i class="fas fa-shopping-cart text-2xl text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>