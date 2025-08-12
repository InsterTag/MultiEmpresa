    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        <div class="flex space-x-1 custom-bg-white rounded-lg p-1 shadow-sm">
            <button onclick="switchTab('overview')" id="tab-overview" class="flex items-center space-x-2 px-4 py-2 rounded-md text-sm font-medium transition-all active-tab">
                <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                <span>Resumen General</span>
            </button>
            <button onclick="switchTab('companies')" id="tab-companies" class="flex items-center space-x-2 px-4 py-2 rounded-md text-sm font-medium transition-all inactive-tab">
                <i data-lucide="building-2" class="w-4 h-4"></i>
                <span>Empresas</span>
            </button>
            <button onclick="switchTab('users')" id="tab-users" class="flex items-center space-x-2 px-4 py-2 rounded-md text-sm font-medium transition-all inactive-tab">
                <i data-lucide="users" class="w-4 h-4"></i>
                <span>Usuarios</span>
            </button>
            <button onclick="switchTab('messages')" id="tab-messages" class="flex items-center space-x-2 px-4 py-2 rounded-md text-sm font-medium transition-all inactive-tab">
                <i data-lucide="message-circle" class="w-4 h-4"></i>
                <span>Mensajes</span>
                <span class="bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">3</span>
            </button>
        </div>
    </div>