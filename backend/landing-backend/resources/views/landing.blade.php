<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Custom CSS -->
    <style>
        [x-cloak] { display: none !important; }
        
        .section-transition {
            transition: all 0.3s ease-in-out;
        }
        
        .dynamic-bg {
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }
    </style>
</head>
<body x-data="landingApp()" x-init="init()">
    <!-- Loading State -->
    <div x-show="loading" x-cloak class="fixed inset-0 bg-white flex items-center justify-center z-50">
        <div class="text-center">
            <div class="animate-spin rounded-full h-32 w-32 border-b-2 border-blue-500"></div>
            <p class="mt-4 text-gray-600">Loading...</p>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="fixed top-0 w-full bg-white shadow-lg z-40" x-show="!loading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold" x-text="settings.general?.site_title || 'Landing Page'"></h1>
                </div>
                
                <div class="hidden md:flex items-center space-x-8">
                    <template x-for="section in sections" :key="section.id">
                        <a :href="'#section-' + section.id" 
                           class="text-gray-700 hover:text-blue-600 transition-colors capitalize"
                           x-text="section.type"></a>
                    </template>
                    <a href="/admin" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">
                        Admin
                    </a>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-700">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Mobile menu -->
            <div x-show="mobileMenuOpen" x-cloak class="md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t">
                    <template x-for="section in sections" :key="section.id">
                        <a :href="'#section-' + section.id" 
                           @click="mobileMenuOpen = false"
                           class="block px-3 py-2 text-gray-700 hover:text-blue-600 transition-colors capitalize"
                           x-text="section.type"></a>
                    </template>
                    <a href="/admin" class="block px-3 py-2 text-blue-600 font-medium">
                        Admin Panel
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16" x-show="!loading">
        <template x-for="section in sections" :key="section.id">
            <section :id="'section-' + section.id" 
                     class="min-h-screen flex items-center dynamic-bg section-transition py-16"
                     :style="`background-color: ${section.background_color}; color: ${section.text_color}`">
                
                <!-- Hero Section -->
                <div x-show="section.type === 'hero'" class="w-full">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                        <h1 class="text-4xl md:text-6xl font-bold mb-6" x-text="section.title"></h1>
                        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto" x-text="section.subtitle"></p>
                        <div class="prose prose-lg mx-auto" x-html="section.content"></div>
                        <div class="mt-8">
                            <button class="bg-white text-gray-900 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                                Get Started
                            </button>
                        </div>
                    </div>
                </div>

                <!-- About Section -->
                <div x-show="section.type === 'about'" class="w-full">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                            <div>
                                <h2 class="text-3xl md:text-4xl font-bold mb-6" x-text="section.title"></h2>
                                <p class="text-lg mb-6" x-text="section.subtitle"></p>
                                <div class="prose prose-lg" x-html="section.content"></div>
                            </div>
                            <div class="text-center">
                                <div class="w-64 h-64 bg-gray-300 rounded-full mx-auto flex items-center justify-center">
                                    <span class="text-gray-600">Image Placeholder</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Services Section -->
                <div x-show="section.type === 'services'" class="w-full">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                        <h2 class="text-3xl md:text-4xl font-bold mb-6" x-text="section.title"></h2>
                        <p class="text-lg mb-12 max-w-3xl mx-auto" x-text="section.subtitle"></p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div class="p-6 rounded-lg bg-white bg-opacity-10">
                                <div class="w-16 h-16 bg-current rounded-full mx-auto mb-4 opacity-20"></div>
                                <h3 class="text-xl font-semibold mb-2">Service 1</h3>
                                <p>Description of your amazing service</p>
                            </div>
                            <div class="p-6 rounded-lg bg-white bg-opacity-10">
                                <div class="w-16 h-16 bg-current rounded-full mx-auto mb-4 opacity-20"></div>
                                <h3 class="text-xl font-semibold mb-2">Service 2</h3>
                                <p>Description of your amazing service</p>
                            </div>
                            <div class="p-6 rounded-lg bg-white bg-opacity-10">
                                <div class="w-16 h-16 bg-current rounded-full mx-auto mb-4 opacity-20"></div>
                                <h3 class="text-xl font-semibold mb-2">Service 3</h3>
                                <p>Description of your amazing service</p>
                            </div>
                        </div>
                        
                        <div class="mt-8 prose prose-lg mx-auto" x-html="section.content"></div>
                    </div>
                </div>

                <!-- Contact Section -->
                <div x-show="section.type === 'contact'" class="w-full">
                    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="text-center mb-12">
                            <h2 class="text-3xl md:text-4xl font-bold mb-6" x-text="section.title"></h2>
                            <p class="text-lg" x-text="section.subtitle"></p>
                        </div>
                        
                        <form @submit.prevent="submitContact()" class="bg-white bg-opacity-10 p-8 rounded-lg">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-sm font-medium mb-2">Name</label>
                                    <input type="text" x-model="contactForm.name" required
                                           class="w-full px-4 py-2 rounded-lg bg-white bg-opacity-20 border border-white border-opacity-30 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-2">Email</label>
                                    <input type="email" x-model="contactForm.email" required
                                           class="w-full px-4 py-2 rounded-lg bg-white bg-opacity-20 border border-white border-opacity-30 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50">
                                </div>
                            </div>
                            <div class="mb-6">
                                <label class="block text-sm font-medium mb-2">Message</label>
                                <textarea x-model="contactForm.message" rows="5" required
                                          class="w-full px-4 py-2 rounded-lg bg-white bg-opacity-20 border border-white border-opacity-30 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" 
                                        :disabled="submittingContact"
                                        class="bg-white text-gray-900 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors disabled:opacity-50">
                                    <span x-show="!submittingContact">Send Message</span>
                                    <span x-show="submittingContact">Sending...</span>
                                </button>
                            </div>
                        </form>
                        
                        <div class="mt-8 prose prose-lg mx-auto text-center" x-html="section.content"></div>
                    </div>
                </div>

                <!-- Generic Section (Features, CTA, etc.) -->
                <div x-show="!['hero', 'about', 'services', 'contact'].includes(section.type)" class="w-full">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                        <h2 class="text-3xl md:text-4xl font-bold mb-6" x-text="section.title"></h2>
                        <p class="text-lg mb-8 max-w-3xl mx-auto" x-text="section.subtitle"></p>
                        <div class="prose prose-lg mx-auto" x-html="section.content"></div>
                    </div>
                </div>
            </section>
        </template>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12" x-show="!loading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4" x-text="settings.general?.site_title || 'Landing Page'"></h3>
                    <p class="text-gray-400" x-text="settings.general?.site_description || 'Welcome to our landing page'"></p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact</h3>
                    <p class="text-gray-400" x-text="settings.general?.contact_email || 'contact@example.com'"></p>
                    <p class="text-gray-400" x-text="settings.general?.phone_number || '+1234567890'"></p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a x-show="settings.social?.facebook_url" :href="settings.social?.facebook_url" class="text-gray-400 hover:text-white">Facebook</a>
                        <a x-show="settings.social?.twitter_url" :href="settings.social?.twitter_url" class="text-gray-400 hover:text-white">Twitter</a>
                        <a x-show="settings.social?.instagram_url" :href="settings.social?.instagram_url" class="text-gray-400 hover:text-white">Instagram</a>
                    </div>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-800 text-center text-gray-400">
                <p>&copy; 2024 <span x-text="settings.general?.site_title || 'Landing Page'"></span>. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Success/Error Messages -->
    <div x-show="message" x-cloak 
         class="fixed bottom-4 right-4 max-w-sm p-4 rounded-lg shadow-lg z-50"
         :class="messageType === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'">
        <p x-text="message"></p>
        <button @click="message = ''" class="absolute top-2 right-2 text-white hover:text-gray-200">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <script>
        function landingApp() {
            return {
                loading: true,
                sections: [],
                settings: {},
                mobileMenuOpen: false,
                contactForm: {
                    name: '',
                    email: '',
                    message: ''
                },
                submittingContact: false,
                message: '',
                messageType: 'success',
                
                async init() {
                    await this.loadData();
                    this.loading = false;
                },
                
                async loadData() {
                    try {
                        const response = await fetch('/api/v1/landing/full');
                        const data = await response.json();
                        
                        if (data.success) {
                            this.sections = data.data.sections;
                            this.settings = this.groupSettings(data.data.settings);
                        }
                    } catch (error) {
                        console.error('Failed to load data:', error);
                        this.showMessage('Failed to load page data', 'error');
                    }
                },
                
                groupSettings(settings) {
                    const grouped = {};
                    Object.keys(settings).forEach(group => {
                        grouped[group] = {};
                        settings[group].forEach(setting => {
                            grouped[group][setting.key] = setting.value;
                        });
                    });
                    return grouped;
                },
                
                async submitContact() {
                    this.submittingContact = true;
                    
                    try {
                        const response = await fetch('/api/v1/contact', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify(this.contactForm)
                        });
                        
                        const data = await response.json();
                        
                        if (data.success) {
                            this.showMessage(data.message, 'success');
                            this.contactForm = { name: '', email: '', message: '' };
                        } else {
                            this.showMessage('Failed to send message', 'error');
                        }
                    } catch (error) {
                        console.error('Contact form error:', error);
                        this.showMessage('Failed to send message', 'error');
                    } finally {
                        this.submittingContact = false;
                    }
                },
                
                showMessage(text, type = 'success') {
                    this.message = text;
                    this.messageType = type;
                    setTimeout(() => {
                        this.message = '';
                    }, 5000);
                }
            }
        }
    </script>
</body>
</html>