<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - {{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Custom CSS -->
    <style>
        [x-cloak] { display: none !important; }
        
        .admin-sidebar {
            transition: transform 0.3s ease-in-out;
        }
        
        .admin-content {
            transition: margin-left 0.3s ease-in-out;
        }
        
        @media (max-width: 768px) {
            .admin-sidebar.closed {
                transform: translateX(-100%);
            }
        }
    </style>
</head>
<body class="bg-gray-100" x-data="adminApp()" x-init="init()">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="admin-sidebar bg-white w-64 min-h-screen shadow-lg" :class="sidebarOpen ? '' : 'closed'">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-gray-800">Admin Panel</h1>
            </div>
            
            <nav class="mt-6">
                <div class="px-6 py-2">
                    <button @click="setActiveTab('dashboard')" 
                            :class="activeTab === 'dashboard' ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100'"
                            class="w-full text-left px-4 py-2 rounded-lg transition-colors">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </button>
                </div>
                
                <div class="px-6 py-2">
                    <button @click="setActiveTab('sections')"
                            :class="activeTab === 'sections' ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100'"
                            class="w-full text-left px-4 py-2 rounded-lg transition-colors">
                        <i class="fas fa-layer-group mr-2"></i> Sections
                    </button>
                </div>
                
                <div class="px-6 py-2">
                    <button @click="setActiveTab('settings')"
                            :class="activeTab === 'settings' ? 'bg-blue-500 text-white' : 'text-gray-600 hover:bg-gray-100'"
                            class="w-full text-left px-4 py-2 rounded-lg transition-colors">
                        <i class="fas fa-cog mr-2"></i> Settings
                    </button>
                </div>
                
                <div class="px-6 py-2 mt-auto">
                    <button @click="logout()"
                            class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="admin-content flex-1 overflow-auto" :class="sidebarOpen ? 'ml-0' : 'ml-0'">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="px-6 py-4 flex justify-between items-center">
                    <div class="flex items-center">
                        <button @click="sidebarOpen = !sidebarOpen" class="md:hidden mr-2">
                            <i class="fas fa-bars text-gray-600"></i>
                        </button>
                        <h2 class="text-xl font-semibold text-gray-800" x-text="getTabTitle()"></h2>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-600" x-text="user?.name || 'Admin'"></span>
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white text-sm font-medium">
                            <span x-text="(user?.name || 'A').charAt(0).toUpperCase()"></span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <div class="p-6">
                <!-- Dashboard Tab -->
                <div x-show="activeTab === 'dashboard'" x-cloak>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center">
                                <div class="p-2 bg-blue-500 rounded-lg">
                                    <i class="fas fa-layer-group text-white"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm text-gray-600">Total Sections</p>
                                    <p class="text-2xl font-semibold" x-text="stats.total_sections || 0"></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center">
                                <div class="p-2 bg-green-500 rounded-lg">
                                    <i class="fas fa-check-circle text-white"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm text-gray-600">Active Sections</p>
                                    <p class="text-2xl font-semibold" x-text="stats.active_sections || 0"></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center">
                                <div class="p-2 bg-purple-500 rounded-lg">
                                    <i class="fas fa-cog text-white"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm text-gray-600">Settings</p>
                                    <p class="text-2xl font-semibold" x-text="stats.total_settings || 0"></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center">
                                <div class="p-2 bg-orange-500 rounded-lg">
                                    <i class="fas fa-users text-white"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm text-gray-600">Users</p>
                                    <p class="text-2xl font-semibold" x-text="stats.total_users || 0"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-medium">Recent Sections</h3>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <template x-for="section in recentSections" :key="section.id">
                                    <div class="flex items-center justify-between py-2">
                                        <div>
                                            <p class="font-medium" x-text="section.name"></p>
                                            <p class="text-sm text-gray-600" x-text="section.type"></p>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <span :class="section.is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'"
                                                  class="px-2 py-1 rounded-full text-xs font-medium">
                                                <span x-text="section.is_active ? 'Active' : 'Inactive'"></span>
                                            </span>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sections Tab -->
                <div x-show="activeTab === 'sections'" x-cloak>
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">Landing Page Sections</h3>
                        <button @click="showSectionModal = true; editingSection = null"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                            <i class="fas fa-plus mr-2"></i> Add Section
                        </button>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-6">
                            <div class="space-y-4">
                                <template x-for="section in sections" :key="section.id">
                                    <div class="border border-gray-200 rounded-lg p-4">
                                        <div class="flex items-center justify-between">
                                            <div class="flex-1">
                                                <h4 class="font-medium" x-text="section.name"></h4>
                                                <p class="text-sm text-gray-600" x-text="section.type"></p>
                                                <p class="text-sm text-gray-500" x-text="section.title"></p>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <span :class="section.is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'"
                                                      class="px-2 py-1 rounded-full text-xs font-medium">
                                                    <span x-text="section.is_active ? 'Active' : 'Inactive'"></span>
                                                </span>
                                                <button @click="editSection(section)"
                                                        class="text-blue-600 hover:text-blue-800">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button @click="deleteSection(section.id)"
                                                        class="text-red-600 hover:text-red-800">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Settings Tab -->
                <div x-show="activeTab === 'settings'" x-cloak>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Theme Settings -->
                        <div class="bg-white rounded-lg shadow">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-medium">Theme Settings</h3>
                            </div>
                            <div class="p-6">
                                <template x-for="setting in themeSettings" :key="setting.key">
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700 mb-2" x-text="setting.label"></label>
                                        <input :type="setting.type === 'color' ? 'color' : 'text'"
                                               x-model="setting.value"
                                               @change="updateSetting(setting)"
                                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                </template>
                            </div>
                        </div>
                        
                        <!-- General Settings -->
                        <div class="bg-white rounded-lg shadow">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-medium">General Settings</h3>
                            </div>
                            <div class="p-6">
                                <template x-for="setting in generalSettings" :key="setting.key">
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700 mb-2" x-text="setting.label"></label>
                                        <input type="text"
                                               x-model="setting.value"
                                               @change="updateSetting(setting)"
                                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Section Modal -->
    <div x-show="showSectionModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium" x-text="editingSection ? 'Edit Section' : 'Add Section'"></h3>
            </div>
            <form @submit.prevent="saveSection()">
                <div class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                        <input type="text" x-model="sectionForm.name" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Type</label>
                        <select x-model="sectionForm.type" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Select Type</option>
                            <option value="hero">Hero</option>
                            <option value="about">About</option>
                            <option value="services">Services</option>
                            <option value="testimonials">Testimonials</option>
                            <option value="contact">Contact</option>
                            <option value="features">Features</option>
                            <option value="cta">Call to Action</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                        <input type="text" x-model="sectionForm.title"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
                        <textarea x-model="sectionForm.subtitle" rows="2"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                        <textarea x-model="sectionForm.content" rows="4"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Background Color</label>
                            <input type="color" x-model="sectionForm.background_color"
                                   class="w-full h-10 border border-gray-300 rounded-md">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Text Color</label>
                            <input type="color" x-model="sectionForm.text_color"
                                   class="w-full h-10 border border-gray-300 rounded-md">
                        </div>
                    </div>
                    
                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" x-model="sectionForm.is_active" class="mr-2">
                            <span class="text-sm font-medium text-gray-700">Active</span>
                        </label>
                    </div>
                </div>
                
                <div class="px-6 py-4 border-t border-gray-200 flex justify-end space-x-2">
                    <button type="button" @click="showSectionModal = false"
                            class="px-4 py-2 text-gray-600 hover:text-gray-800">Cancel</button>
                    <button type="submit"
                            class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg">
                        <span x-text="editingSection ? 'Update' : 'Create'"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Alpine.js Data -->
    <script>
        function adminApp() {
            return {
                sidebarOpen: true,
                activeTab: 'dashboard',
                user: null,
                stats: {},
                recentSections: [],
                sections: [],
                settings: {},
                themeSettings: [],
                generalSettings: [],
                showSectionModal: false,
                editingSection: null,
                sectionForm: {
                    name: '',
                    type: '',
                    title: '',
                    subtitle: '',
                    content: '',
                    background_color: '#ffffff',
                    text_color: '#000000',
                    is_active: true
                },
                
                async init() {
                    await this.checkAuth();
                    await this.loadDashboard();
                    await this.loadSections();
                    await this.loadSettings();
                },
                
                async checkAuth() {
                    const token = localStorage.getItem('admin_token');
                    if (!token) {
                        window.location.href = '/admin/login';
                        return;
                    }
                    
                    try {
                        const response = await fetch('/api/v1/admin/auth/user', {
                            headers: {
                                'Authorization': `Bearer ${token}`,
                                'Accept': 'application/json'
                            }
                        });
                        
                        if (response.ok) {
                            const data = await response.json();
                            this.user = data.user;
                        } else {
                            localStorage.removeItem('admin_token');
                            window.location.href = '/admin/login';
                        }
                    } catch (error) {
                        console.error('Auth check failed:', error);
                        window.location.href = '/admin/login';
                    }
                },
                
                async loadDashboard() {
                    try {
                        const response = await this.apiRequest('/api/v1/admin/dashboard');
                        if (response.success) {
                            this.stats = response.stats;
                            this.recentSections = response.recent_sections;
                        }
                    } catch (error) {
                        console.error('Failed to load dashboard:', error);
                    }
                },
                
                async loadSections() {
                    try {
                        const response = await this.apiRequest('/api/v1/admin/sections');
                        if (response.success) {
                            this.sections = response.sections;
                        }
                    } catch (error) {
                        console.error('Failed to load sections:', error);
                    }
                },
                
                async loadSettings() {
                    try {
                        const response = await this.apiRequest('/api/v1/admin/settings');
                        if (response.success) {
                            this.settings = response.settings;
                            this.themeSettings = response.settings.theme || [];
                            this.generalSettings = response.settings.general || [];
                        }
                    } catch (error) {
                        console.error('Failed to load settings:', error);
                    }
                },
                
                async apiRequest(url, options = {}) {
                    const token = localStorage.getItem('admin_token');
                    const response = await fetch(url, {
                        headers: {
                            'Authorization': `Bearer ${token}`,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            ...options.headers
                        },
                        ...options
                    });
                    
                    return await response.json();
                },
                
                setActiveTab(tab) {
                    this.activeTab = tab;
                    if (window.innerWidth < 768) {
                        this.sidebarOpen = false;
                    }
                },
                
                getTabTitle() {
                    const titles = {
                        dashboard: 'Dashboard',
                        sections: 'Sections',
                        settings: 'Settings'
                    };
                    return titles[this.activeTab] || 'Admin Panel';
                },
                
                editSection(section) {
                    this.editingSection = section;
                    this.sectionForm = { ...section };
                    this.showSectionModal = true;
                },
                
                async saveSection() {
                    try {
                        const url = this.editingSection 
                            ? `/api/v1/admin/sections/${this.editingSection.id}`
                            : '/api/v1/admin/sections';
                        
                        const method = this.editingSection ? 'PUT' : 'POST';
                        
                        const response = await this.apiRequest(url, {
                            method: method,
                            body: JSON.stringify(this.sectionForm)
                        });
                        
                        if (response.success) {
                            this.showSectionModal = false;
                            await this.loadSections();
                            await this.loadDashboard();
                        }
                    } catch (error) {
                        console.error('Failed to save section:', error);
                    }
                },
                
                async deleteSection(id) {
                    if (confirm('Are you sure you want to delete this section?')) {
                        try {
                            const response = await this.apiRequest(`/api/v1/admin/sections/${id}`, {
                                method: 'DELETE'
                            });
                            
                            if (response.success) {
                                await this.loadSections();
                                await this.loadDashboard();
                            }
                        } catch (error) {
                            console.error('Failed to delete section:', error);
                        }
                    }
                },
                
                async updateSetting(setting) {
                    try {
                        const response = await this.apiRequest(`/api/v1/admin/settings/${setting.id}`, {
                            method: 'PUT',
                            body: JSON.stringify({ value: setting.value })
                        });
                        
                        if (response.success) {
                            // Setting updated successfully
                        }
                    } catch (error) {
                        console.error('Failed to update setting:', error);
                    }
                },
                
                async logout() {
                    try {
                        await this.apiRequest('/api/v1/admin/auth/logout', {
                            method: 'POST'
                        });
                    } catch (error) {
                        console.error('Logout failed:', error);
                    } finally {
                        localStorage.removeItem('admin_token');
                        window.location.href = '/admin/login';
                    }
                }
            }
        }
    </script>
</body>
</html>