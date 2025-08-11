@extends('layouts.app') 
@section('content')
@vite(['resources/css/user.css'])
</head>
<body class="custom-bg-light min-h-screen">
  

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        @include('profiles.user.items.ProfileHeader')

        <!-- Tabs Navigation -->
        <div class="mb-8">
            <div class="flex flex-wrap gap-3 p-2 custom-bg-white rounded-2xl card-shadow">
                <button class="tab-btn flex items-center px-6 py-4 rounded-xl font-semibold transition-all duration-300 tab-active" data-tab="orders">
                    <i class="fas fa-shopping-bag mr-3 text-lg"></i>
                    <span>Pedidos</span>
                </button>
                <button class="tab-btn flex items-center px-6 py-4 rounded-xl font-semibold transition-all duration-300 tab-inactive" data-tab="favorites">
                    <i class="fas fa-heart mr-3 text-lg"></i>
                    <span>Favoritos</span>
                </button>
                <button class="tab-btn flex items-center px-6 py-4 rounded-xl font-semibold transition-all duration-300 tab-inactive" data-tab="following">
                    <i class="fas fa-users mr-3 text-lg"></i>
                    <span>Siguiendo</span>
                </button>
                <button class="tab-btn flex items-center px-6 py-4 rounded-xl font-semibold transition-all duration-300 tab-inactive" data-tab="payments">
                    <i class="fas fa-credit-card mr-3 text-lg"></i>
                    <span>Pagos</span>
                </button>
                <button class="tab-btn flex items-center px-6 py-4 rounded-xl font-semibold transition-all duration-300 tab-inactive" data-tab="address">
                    <i class="fas fa-map-marker-alt mr-3 text-lg"></i>
                    <span>Dirección</span>
                </button>
            </div>
        </div>

        <!-- Tab Contents -->
        <div id="tab-contents">

            <!-- Orders Tab -->
            @include('profiles.user.items.Orders')

            <!-- Favorites Tab -->
            @include('profiles.user.items.Favorites')

            <!-- Following Tab -->
            @include('profiles.user.items.Following')

            <!-- Payments Tab -->
            @include('profiles.user.items.Payments')

            <!-- Address Tab  -->
            @include('profiles.user.items.Address')
        </div>

    </div>
</body>
@endsection 
@vite(['resources/js/user.js'])