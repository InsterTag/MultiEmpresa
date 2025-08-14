
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

        
        // Optimized Dashboard Module
        const OptimizedDashboard = (() => {
            let currentTab = 'dashboard';
            let charts = {};
            let loadedTabs = new Set(['dashboard']);

            // Fast tab switching
            function switchTab(tabId) {
                if (currentTab === tabId) return;

                // Hide current tab
                const currentContent = document.getElementById(currentTab);
                const newContent = document.getElementById(tabId);
                
                if (currentContent) currentContent.classList.remove('active');
                if (newContent) newContent.classList.add('active');

                // Update nav
                updateNavButtons(tabId);
                currentTab = tabId;

                // Load content lazily
                if (!loadedTabs.has(tabId)) {
                    loadTabContent(tabId);
                    loadedTabs.add(tabId);
                }

                // Load charts if needed
                if ((tabId === 'dashboard' || tabId === 'analytics') && !charts[tabId]) {
                    loadChartsForTab(tabId);
                }
            }

            function updateNavButtons(activeTabId) {
                document.querySelectorAll('.nav-item').forEach(button => {
                    const tabId = button.getAttribute('data-tab');
                    button.classList.toggle('active', tabId === activeTabId);
                });
            }

            async function loadChartsForTab(tabId) {
                await loadChartJS();
                
                if (!window.Chart) return;

                if (tabId === 'dashboard') {
                    loadDashboardCharts();
                } else if (tabId === 'analytics') {
                    loadAnalyticsCharts();
                }
            }

            function loadDashboardCharts() {
                // Sales Chart
                const salesCanvas = document.getElementById('salesChart');
                const salesLoader = document.getElementById('salesChartLoader');
                
                if (salesCanvas && !charts.salesChart) {
                    const ctx = salesCanvas.getContext('2d');
                    charts.salesChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
                            datasets: [{
                                label: 'Ventas',
                                data: [12000, 19000, 15000, 25000, 22000, 30000],
                                borderColor: '#3b82f6',
                                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                                tension: 0.4,
                                fill: true
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: { legend: { display: false } },
                            scales: {
                                y: { beginAtZero: true },
                                x: { grid: { color: 'rgba(0,0,0,0.1)' } }
                            }
                        }
                    });
                    if (salesLoader) salesLoader.style.display = 'none';
                }

                // Category Chart
                const categoryCanvas = document.getElementById('categoryChart');
                const categoryLoader = document.getElementById('categoryChartLoader');
                
                if (categoryCanvas && !charts.categoryChart) {
                    const ctx = categoryCanvas.getContext('2d');
                    charts.categoryChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: ['Electrónicos', 'Ropa', 'Hogar', 'Deportes'],
                            datasets: [{
                                data: [45, 25, 20, 10],
                                backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#8b5cf6']
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: { legend: { position: 'bottom' } }
                        }
                    });
                    if (categoryLoader) categoryLoader.style.display = 'none';
                }
            }

            function loadAnalyticsCharts() {
                const analyticsCanvas = document.getElementById('analyticsChart');
                const analyticsLoader = document.getElementById('analyticsChartLoader');
                
                if (analyticsCanvas && !charts.analyticsChart) {
                    const ctx = analyticsCanvas.getContext('2d');
                    charts.analyticsChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Norte', 'Sur', 'Este', 'Oeste', 'Centro'],
                            datasets: [{
                                label: 'Ventas por Región',
                                data: [65, 59, 80, 81, 56],
                                backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#8b5cf6', '#ef4444']
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: { legend: { display: false } },
                            scales: { y: { beginAtZero: true } }
                        }
                    });
                    if (analyticsLoader) analyticsLoader.style.display = 'none';
                }
            }

            function loadTabContent(tabId) {
                // Simulate loading content for other tabs
                const tabContent = document.getElementById(tabId);
                if (!tabContent) return;

                // Add loading state
                tabContent.classList.add('loading');
                
                // Simulate async content loading
                setTimeout(() => {
                    tabContent.classList.remove('loading');
                    
                    // You can add actual content loading logic here
                    console.log(`Content loaded for tab: ${tabId}`);
                }, 300);
            }

            function initEventListeners() {
                // Navigation
                document.querySelectorAll('.nav-item').forEach(button => {
                    button.addEventListener('click', (e) => {
                        e.preventDefault();
                        const tabId = button.getAttribute('data-tab');
                        if (tabId) switchTab(tabId);
                    });
                });

                // Mobile menu
                const mobileBtn = document.getElementById('mobileMenuBtn');
                const sidebar = document.getElementById('sidebar');
                
                if (mobileBtn && sidebar) {
                    mobileBtn.addEventListener('click', () => {
                        sidebar.classList.toggle('open');
                    });

                    // Close on outside click
                    document.addEventListener('click', (e) => {
                        if (window.innerWidth <= 768 && 
                            !sidebar.contains(e.target) && 
                            !mobileBtn.contains(e.target)) {
                            sidebar.classList.remove('open');
                        }
                    });
                }

                // Keyboard shortcuts
                document.addEventListener('keydown', (e) => {
                    if (e.ctrlKey || e.metaKey) {
                        const num = parseInt(e.key);
                        if (num >= 1 && num <= 7) {
                            e.preventDefault();
                            const tabs = ['dashboard', 'company-info', 'branches', 'employees', 'products', 'analytics', 'settings'];
                            if (tabs[num - 1]) switchTab(tabs[num - 1]);
                        }
                    }
                });

                // Window resize
                window.addEventListener('resize', () => {
                    if (window.innerWidth > 768 && sidebar) {
                        sidebar.classList.remove('open');
                    }
                });
            }

            function animateElements() {
                // Use Intersection Observer for performance
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('loaded');
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.1 });

                document.querySelectorAll('.defer-animation').forEach(el => {
                    observer.observe(el);
                });
            }

            function hideLoadingIndicator() {
                const loader = document.getElementById('loadingIndicator');
                if (loader) {
                    loader.style.opacity = '0';
                    loader.style.transition = 'opacity 0.3s ease';
                    setTimeout(() => {
                        loader.style.display = 'none';
                    }, 300);
                }
            }

            // Initialize everything
            function init() {
                // Fast initialization
                initEventListeners();
                
                // Animate elements after a short delay
                requestAnimationFrame(() => {
                    animateElements();
                    hideLoadingIndicator();
                });

                // Load dashboard charts after initial render
                setTimeout(() => {
                    loadChartsForTab('dashboard');
                }, 100);
            }

            return {
                init,
                switchTab,
                getCurrentTab: () => currentTab,
                getCharts: () => charts
            };
        })();

        // Fast initialization
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', OptimizedDashboard.init);
        } else {
            OptimizedDashboard.init();
        }

        // Expose to global scope
        window.OptimizedDashboard = OptimizedDashboard;

