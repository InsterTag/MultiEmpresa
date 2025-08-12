
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

