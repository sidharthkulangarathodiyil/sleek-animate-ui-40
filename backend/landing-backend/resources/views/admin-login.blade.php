<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - {{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center" x-data="loginApp()">
    <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-8 mx-4">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Admin Login</h1>
            <p class="text-gray-600 mt-2">Sign in to access the admin panel</p>
        </div>
        
        <form @submit.prevent="login()" class="space-y-6">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <input type="email" 
                       id="email" 
                       x-model="form.email" 
                       required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="admin@example.com">
            </div>
            
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" 
                       id="password" 
                       x-model="form.password" 
                       required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="Enter your password">
            </div>
            
            <div x-show="error" x-cloak class="p-3 bg-red-100 border border-red-400 text-red-700 rounded-md">
                <p x-text="error"></p>
            </div>
            
            <button type="submit" 
                    :disabled="loading"
                    class="w-full bg-blue-500 hover:bg-blue-600 disabled:bg-blue-300 text-white font-medium py-2 px-4 rounded-md transition-colors">
                <span x-show="!loading">Sign In</span>
                <span x-show="loading">Signing In...</span>
            </button>
        </form>
        
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                <strong>Default Credentials:</strong><br>
                Email: admin@example.com<br>
                Password: password
            </p>
        </div>
        
        <div class="mt-6 text-center">
            <a href="/" class="text-blue-500 hover:text-blue-600 text-sm">
                ← Back to Landing Page
            </a>
        </div>
    </div>

    <script>
        function loginApp() {
            return {
                form: {
                    email: '',
                    password: ''
                },
                loading: false,
                error: '',
                
                async login() {
                    this.loading = true;
                    this.error = '';
                    
                    try {
                        const response = await fetch('/api/v1/auth/login', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify(this.form)
                        });
                        
                        const data = await response.json();
                        
                        if (data.success && data.token) {
                            localStorage.setItem('admin_token', data.token);
                            window.location.href = '/admin';
                        } else {
                            this.error = data.message || 'Login failed. Please check your credentials.';
                        }
                    } catch (error) {
                        console.error('Login error:', error);
                        this.error = 'Login failed. Please try again.';
                    } finally {
                        this.loading = false;
                    }
                }
            }
        }
    </script>
</body>
</html>