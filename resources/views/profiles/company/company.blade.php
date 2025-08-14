<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Empresarial - E-commerce</title>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    @vite(['resources/css/company.css'])
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" media="print" onload="this.media='all'; this.onload=null;">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></noscript>
    <script>
        // Load Chart.js only when needed
        let chartLibLoaded = false;
        function loadChartJS() {
            if (chartLibLoaded) return Promise.resolve();
            
            return new Promise((resolve) => {
                const script = document.createElement('script');
                script.src = 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js';
                script.onload = () => {
                    chartLibLoaded = true;
                    resolve();
                };
                script.onerror = () => resolve(); // Continue even if fails
                document.head.appendChild(script);
            });
        }
    </script>
</head>
<body>
    <!-- Loading indicator -->
    <div id="loadingIndicator" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000; color: white; font-size: 1.2rem;">
        <div style="text-align: center;">
            <div style="width: 40px; height: 40px; border: 4px solid rgba(255,255,255,0.3); border-top: 4px solid white; border-radius: 50%; animation: spin 1s linear infinite; margin: 0 auto 1rem;"></div>
            Cargando Dashboard...
        </div>
    </div>

    <!-- Mobile Menu Button -->
    <button id="mobileMenuBtn" class="mobile-menu-btn" style="display: none; position: fixed; top: 1rem; left: 1rem; z-index: 50; background: rgba(255,255,255,0.9); border: none; border-radius: 0.5rem; padding: 0.75rem; cursor: pointer;">
        <i class="fas fa-bars"></i>
    </button>

    <div class="flex">
        <!-- Sidebar -->
        @include('profiles.company.items.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
        @include('profiles.company.items.header')

            <!-- Tab Contents -->
            <div class="tab-contents">
                <!-- Dashboard -->
                @include('profiles.company.items.dashboard')

                <!--information section-->
                @include('profiles.company.items.generalInformation')

                <!--branches section-->
                @include('profiles.company.items.branches')

                <!--employees section-->
                @include('profiles.company.items.employees')

                <!--products section-->
                @include('profiles.company.items.productsSection')

                <!--analisys section-->
                @include('profiles.company.items.analysis')

                <!--settings section-->
                @include('profiles.company.items.settings')
            </div>
        </div>
    </div>
</body>
@vite(['resources/js/company.js'])
</html>