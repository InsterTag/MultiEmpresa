// Profile Header Functions - Protegido contra conflictos y disponible globalmente
(function(window) {
    'use strict';
    
    // Namespace para las funciones del profile
    const ProfileManager = {
        
        // Función para manejar la subida de imagen
        handleImageUpload: function(event) {
            const file = event.target.files[0];
            if (file) {
                // Validar que sea una imagen
                if (!file.type.startsWith('image/')) {
                    alert('Por favor selecciona un archivo de imagen válido.');
                    return;
                }
                
                // Validar tamaño (max 5MB)
                if (file.size > 5 * 1024 * 1024) {
                    alert('El archivo es demasiado grande. El tamaño máximo permitido es 5MB.');
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    const profileImage = document.getElementById('profileImage');
                    if (profileImage) {
                        profileImage.src = e.target.result;
                    }
                };
                reader.readAsDataURL(file);
                
                // Subir imagen al servidor
                ProfileManager.uploadImageToServer(file);
            }
        },
        
        // Función para subir imagen al servidor
        uploadImageToServer: function(file) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                console.error('CSRF token no encontrado');
                return;
            }
            
            const formData = new FormData();
            formData.append('profile_image', file);
            formData.append('_token', csrfToken.getAttribute('content'));
            
            // Mostrar indicador de carga
            ProfileManager.showLoadingState(true);
            
            fetch('/profile/upload-image', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken.getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                ProfileManager.showLoadingState(false);
                if (data.success) {
                    console.log('Imagen subida exitosamente');
                    // Actualizar la imagen con la URL del servidor
                    const profileImage = document.getElementById('profileImage');
                    if (profileImage) {
                        profileImage.src = data.image_url;
                    }
                    // Mostrar mensaje de éxito
                    ProfileManager.showMessage('Imagen actualizada exitosamente', 'success');
                } else {
                    ProfileManager.showMessage('Error al subir la imagen: ' + (data.message || 'Error desconocido'), 'error');
                }
            })
            .catch(error => {
                ProfileManager.showLoadingState(false);
                console.error('Error:', error);
                ProfileManager.showMessage('Error al subir la imagen', 'error');
            });
        },
        
        // Función para mostrar notificaciones
        showNotifications: function() {
            // Aquí puedes agregar la lógica para mostrar notificaciones
            alert('Mostrando notificaciones...');
        },
        
        // Funciones del Modal de Configuraciones
        openSettingsModal: function() {
            const modal = document.getElementById('settingsModal');
            if (modal) {
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        },
        
        closeSettingsModal: function() {
            const modal = document.getElementById('settingsModal');
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = 'auto';
                
                // Limpiar campos de contraseña
                const passwordInput = document.getElementById('passwordInput');
                const confirmPasswordInput = document.getElementById('confirmPasswordInput');
                
                if (passwordInput) passwordInput.value = '';
                if (confirmPasswordInput) confirmPasswordInput.value = '';
            }
        },
        
        closeModalOnOverlay: function(event) {
            if (event.target === event.currentTarget) {
                ProfileManager.closeSettingsModal();
            }
        },
        
        togglePassword: function(inputId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(inputId + '-icon');
            
            if (!input || !icon) return;
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        },
        
        // Función para mostrar estado de carga
        showLoadingState: function(loading) {
            const cameraButton = document.querySelector('.profile-image-container ~ button');
            if (cameraButton) {
                if (loading) {
                    cameraButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                    cameraButton.disabled = true;
                } else {
                    cameraButton.innerHTML = '<i class="fas fa-camera"></i>';
                    cameraButton.disabled = false;
                }
            }
        },
        
        // Función para mostrar mensajes
        showMessage: function(message, type = 'info') {
            // Crear el elemento de mensaje si no existe
            let messageContainer = document.getElementById('profile-message-container');
            if (!messageContainer) {
                messageContainer = document.createElement('div');
                messageContainer.id = 'profile-message-container';
                messageContainer.className = 'fixed top-4 right-4 z-50';
                document.body.appendChild(messageContainer);
            }
            
            const messageEl = document.createElement('div');
            const bgColor = type === 'success' ? 'bg-green-500' : type === 'error' ? 'bg-red-500' : 'bg-blue-500';
            
            messageEl.className = `${bgColor} text-white px-6 py-3 rounded-lg shadow-lg mb-2 transform translate-x-full transition-transform duration-300`;
            messageEl.innerHTML = `
                <div class="flex items-center space-x-2">
                    <i class="fas ${type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-exclamation-circle' : 'fa-info-circle'}"></i>
                    <span>${message}</span>
                </div>
            `;
            
            messageContainer.appendChild(messageEl);
            
            // Animar entrada
            setTimeout(() => {
                messageEl.classList.remove('translate-x-full');
            }, 100);
            
            // Remover después de 4 segundos
            setTimeout(() => {
                messageEl.classList.add('translate-x-full');
                setTimeout(() => {
                    if (messageEl.parentNode) {
                        messageEl.parentNode.removeChild(messageEl);
                    }
                }, 300);
            }, 4000);
        },
        
        // Función de inicialización
        init: function() {
            // Cerrar modal con ESC
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    ProfileManager.closeSettingsModal();
                }
            });
            
            // Validación del formulario
            const settingsForm = document.getElementById('settingsForm');
            if (settingsForm) {
                settingsForm.addEventListener('submit', function(event) {
                    const passwordInput = document.getElementById('passwordInput');
                    const confirmPasswordInput = document.getElementById('confirmPasswordInput');
                    
                    if (!passwordInput || !confirmPasswordInput) return;
                    
                    const password = passwordInput.value;
                    const confirmPassword = confirmPasswordInput.value;
                    
                    // Si se ingresó una contraseña, validar que coincidan
                    if (password && password !== confirmPassword) {
                        event.preventDefault();
                        ProfileManager.showMessage('Las contraseñas no coinciden. Por favor verifica e intenta de nuevo.', 'error');
                        return false;
                    }
                    
                    // Si se ingresó contraseña, validar longitud mínima
                    if (password && password.length < 8) {
                        event.preventDefault();
                        ProfileManager.showMessage('La contraseña debe tener al menos 8 caracteres.', 'error');
                        return false;
                    }
                });
            }
        }
    };
    
    // Hacer las funciones disponibles globalmente para compatibilidad con onclick
    window.handleImageUpload = ProfileManager.handleImageUpload;
    window.showNotifications = ProfileManager.showNotifications;
    window.openSettingsModal = ProfileManager.openSettingsModal;
    window.closeSettingsModal = ProfileManager.closeSettingsModal;
    window.closeModalOnOverlay = ProfileManager.closeModalOnOverlay;
    window.togglePassword = ProfileManager.togglePassword;
    
    // También hacer disponible el namespace completo
    window.ProfileManager = ProfileManager;
    
    // Inicializar cuando el DOM esté listo
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', ProfileManager.init);
    } else {
        ProfileManager.init();
    }
    


document.getElementById('fileInput').addEventListener('change', handleImageUpload);

function handleImageUpload(event) {
    const file = event.target.files[0];
    if (!file) return;

    const formData = new FormData();
    formData.append('profile_image', file);
    formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

    fetch('/profile/upload-image', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            // Cambiar imagen en la vista
            document.getElementById('profileImage').src = data.image_url;

            // Mensaje de éxito
            alert('Imagen actualizada correctamente');
        } else {
            alert('Error al subir la imagen');
        }
    })
    .catch(() => alert('Error en la conexión con el servidor'));
}



})(window);
