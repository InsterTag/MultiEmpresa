                <!-- Dashboard -->
                <div id="dashboard" class="tab-content active">
                    <!-- Metrics Cards -->
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
                        <div class="glass-card defer-animation" style="transition-delay: 0.1s;">
                            <div style="display: flex; align-items: center; justify-content: space-between;">
                                <div>
                                    <p style="font-size: 0.875rem; color: var(--gray-600); font-weight: 500;">Ingresos Totales</p>
                                    <p style="font-size: 2rem; font-weight: bold; color: var(--gray-800); margin-top: 0.5rem;">$156,420</p>
                                    <div style="display: flex; align-items: center; margin-top: 0.5rem;">
                                        <span style="color: var(--accent); font-size: 0.875rem; font-weight: 600;">+12.5%</span>
                                        <span style="color: var(--gray-600); font-size: 0.875rem; margin-left: 0.25rem;">vs mes anterior</span>
                                    </div>
                                </div>
                                <div style="width: 64px; height: 64px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); border-radius: 1rem; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-dollar-sign" style="font-size: 1.5rem; color: white;"></i>
                                </div>
                            </div>
                        </div>

                        <div class="glass-card defer-animation" style="transition-delay: 0.2s;">
                            <div style="display: flex; align-items: center; justify-content: space-between;">
                                <div>
                                    <p style="font-size: 0.875rem; color: var(--gray-600); font-weight: 500;">Productos Vendidos</p>
                                    <p style="font-size: 2rem; font-weight: bold; color: var(--gray-800); margin-top: 0.5rem;">2,847</p>
                                    <div style="display: flex; align-items: center; margin-top: 0.5rem;">
                                        <span style="color: var(--accent); font-size: 0.875rem; font-weight: 600;">+8.2%</span>
                                        <span style="color: var(--gray-600); font-size: 0.875rem; margin-left: 0.25rem;">vs mes anterior</span>
                                    </div>
                                </div>
                                <div style="width: 64px; height: 64px; background: linear-gradient(135deg, var(--secondary) 0%, #d97706 100%); border-radius: 1rem; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-box" style="font-size: 1.5rem; color: white;"></i>
                                </div>
                            </div>
                        </div>

                        <div class="glass-card defer-animation" style="transition-delay: 0.3s;">
                            <div style="display: flex; align-items: center; justify-content: space-between;">
                                <div>
                                    <p style="font-size: 0.875rem; color: var(--gray-600); font-weight: 500;">Nuevos Clientes</p>
                                    <p style="font-size: 2rem; font-weight: bold; color: var(--gray-800); margin-top: 0.5rem;">456</p>
                                    <div style="display: flex; align-items: center; margin-top: 0.5rem;">
                                        <span style="color: var(--accent); font-size: 0.875rem; font-weight: 600;">+24.1%</span>
                                        <span style="color: var(--gray-600); font-size: 0.875rem; margin-left: 0.25rem;">vs mes anterior</span>
                                    </div>
                                </div>
                                <div style="width: 64px; height: 64px; background: linear-gradient(135deg, var(--accent) 0%, #059669 100%); border-radius: 1rem; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-users" style="font-size: 1.5rem; color: white;"></i>
                                </div>
                            </div>
                        </div>

                        <div class="glass-card defer-animation" style="transition-delay: 0.4s;">
                            <div style="display: flex; align-items: center; justify-content: space-between;">
                                <div>
                                    <p style="font-size: 0.875rem; color: var(--gray-600); font-weight: 500;">Satisfacción</p>
                                    <p style="font-size: 2rem; font-weight: bold; color: var(--gray-800); margin-top: 0.5rem;">98.5%</p>
                                    <div style="display: flex; align-items: center; margin-top: 0.5rem;">
                                        <span style="color: var(--accent); font-size: 0.875rem; font-weight: 600;">+2.1%</span>
                                        <span style="color: var(--gray-600); font-size: 0.875rem; margin-left: 0.25rem;">vs mes anterior</span>
                                    </div>
                                </div>
                                <div style="width: 64px; height: 64px; background: linear-gradient(135deg, var(--purple) 0%, #7c3aed 100%); border-radius: 1rem; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-star" style="font-size: 1.5rem; color: white;"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Charts Section - Lazy loaded -->
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
                        <div class="glass-card defer-animation" style="transition-delay: 0.5s;">
                            <h3 style="font-size: 1.25rem; font-weight: bold; color: var(--gray-800); margin-bottom: 1rem;">Ventas Mensual</h3>
                            <div style="position: relative; height: 300px;">
                                <canvas id="salesChart" style="width: 100%; height: 100%;"></canvas>
                                <div id="salesChartLoader" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: var(--gray-600);">
                                    Cargando gráfico...
                                </div>
                            </div>
                        </div>

                        <div class="glass-card defer-animation" style="transition-delay: 0.6s;">
                            <h3 style="font-size: 1.25rem; font-weight: bold; color: var(--gray-800); margin-bottom: 1rem;">Distribución por Categorías</h3>
                            <div style="position: relative; height: 300px;">
                                <canvas id="categoryChart" style="width: 100%; height: 100%;"></canvas>
                                <div id="categoryChartLoader" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: var(--gray-600);">
                                    Cargando gráfico...
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="glass-card defer-animation" style="transition-delay: 0.7s;">
                        <h3 style="font-size: 1.25rem; font-weight: bold; color: var(--gray-800); margin-bottom: 1.5rem;">Actividad Reciente</h3>
                        <div style="display: flex; flex-direction: column; gap: 1rem;">
                            <div style="display: flex; align-items: center; padding: 1rem; background: #eff6ff; border-radius: 0.75rem;">
                                <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                                    <i class="fas fa-shopping-cart" style="color: white;"></i>
                                </div>
                                <div style="flex: 1;">
                                    <p style="font-weight: 600; color: var(--gray-800);">Nueva venta realizada</p>
                                    <p style="font-size: 0.875rem; color: var(--gray-600);">Producto: MacBook Pro - $2,499</p>
                                </div>
                                <span style="font-size: 0.875rem; color: var(--gray-600);">Hace 5 min</span>
                            </div>

                            <div style="display: flex; align-items: center; padding: 1rem; background: #f0fdf4; border-radius: 0.75rem;">
                                <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--accent) 0%, #059669 100%); border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                                    <i class="fas fa-user-plus" style="color: white;"></i>
                                </div>
                                <div style="flex: 1;">
                                    <p style="font-weight: 600; color: var(--gray-800);">Nuevo empleado registrado</p>
                                    <p style="font-size: 0.875rem; color: var(--gray-600);">María González - Departamento de Ventas</p>
                                </div>
                                <span style="font-size: 0.875rem; color: var(--gray-600);">Hace 2 horas</span>
                            </div>
                        </div>
                    </div>
                </div>