<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', config('app.name')) - جمعية سنابل الخير الخيرية</title>
    
    <!-- Meta Tags -->
    <meta name="description" content="@yield('description', 'جمعية سنابل الخير الخيرية - الدقهلية، مصر')">
    <meta name="keywords" content="جمعية خيرية، سنابل الخير، الدقهلية، مصر، تبرعات، مشاريع خيرية">
    <meta name="author" content="جمعية سنابل الخير الخيرية">
    
    <!-- Open Graph -->
    <meta property="og:title" content="@yield('og:title', config('app.name'))">
    <meta property="og:description" content="@yield('og:description', 'جمعية سنابل الخير الخيرية - الدقهلية، مصر')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og:image', asset('images/og-image.jpg'))">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter:title', config('app.name'))">
    <meta name="twitter:description" content="@yield('twitter:description', 'جمعية سنابل الخير الخيرية - الدقهلية، مصر')">
    <meta name="twitter:image" content="@yield('twitter:image', asset('images/og-image.jpg'))">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&family=Tajawal:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body class="font-arabic">
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-40">
        <!-- Top Bar -->
        <div class="bg-primary-green text-white py-2">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center text-sm">
                    <div class="flex items-center space-x-reverse space-x-4">
                        <span><i class="fas fa-phone ml-1"></i> {{ setting('phone', '+20 50 1234567') }}</span>
                        <span><i class="fas fa-envelope ml-1"></i> {{ setting('email', 'info@sanabelalkhair.org') }}</span>
                    </div>
                    <div class="flex items-center space-x-reverse space-x-3">
                        <a href="{{ setting('facebook_url') }}" target="_blank" class="hover:text-gray-200 transition-colors">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="{{ setting('twitter_url') }}" target="_blank" class="hover:text-gray-200 transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="{{ setting('instagram_url') }}" target="_blank" class="hover:text-gray-200 transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="{{ setting('youtube_url') }}" target="_blank" class="hover:text-gray-200 transition-colors">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Navigation -->
        <nav class="bg-white">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center h-20">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center">
                            <img src="{{ asset('images/logo.png') }}" alt="سنابل الخير" class="h-12 w-auto">
                            <span class="mr-3 text-xl font-bold text-primary-green">سنابل الخير</span>
                        </a>
                    </div>
                    
                    <!-- Desktop Menu -->
                    <div class="hidden md:flex items-center space-x-reverse space-x-8">
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary-green font-medium transition-colors">الرئيسية</a>
                        <a href="{{ route('about') }}" class="text-gray-700 hover:text-primary-green font-medium transition-colors">من نحن</a>
                        <a href="{{ route('projects') }}" class="text-gray-700 hover:text-primary-green font-medium transition-colors">المشاريع</a>
                        <a href="{{ route('news') }}" class="text-gray-700 hover:text-primary-green font-medium transition-colors">الأخبار</a>
                        <a href="{{ route('gallery') }}" class="text-gray-700 hover:text-primary-green font-medium transition-colors">المعرض</a>
                        <a href="{{ route('volunteer') }}" class="text-gray-700 hover:text-primary-green font-medium transition-colors">التطوع</a>
                        <a href="{{ route('contact') }}" class="text-gray-700 hover:text-primary-green font-medium transition-colors">اتصل بنا</a>
                    </div>
                    
                    <!-- Donate Button & Mobile Menu -->
                    <div class="flex items-center space-x-reverse space-x-4">
                        <a href="{{ route('donate') }}" class="btn-primary hidden md:flex items-center">
                            <i class="fas fa-heart ml-2"></i>
                            تبرع الآن
                        </a>
                        
                        <!-- Mobile Menu Button -->
                        <button class="mobile-menu-button md:hidden text-gray-700 hover:text-primary-green">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Mobile Menu -->
                <div class="mobile-menu hidden md:hidden pb-4">
                    <div class="flex flex-col space-y-3">
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary-green font-medium transition-colors py-2">الرئيسية</a>
                        <a href="{{ route('about') }}" class="text-gray-700 hover:text-primary-green font-medium transition-colors py-2">من نحن</a>
                        <a href="{{ route('projects') }}" class="text-gray-700 hover:text-primary-green font-medium transition-colors py-2">المشاريع</a>
                        <a href="{{ route('news') }}" class="text-gray-700 hover:text-primary-green font-medium transition-colors py-2">الأخبار</a>
                        <a href="{{ route('gallery') }}" class="text-gray-700 hover:text-primary-green font-medium transition-colors py-2">المعرض</a>
                        <a href="{{ route('volunteer') }}" class="text-gray-700 hover:text-primary-green font-medium transition-colors py-2">التطوع</a>
                        <a href="{{ route('contact') }}" class="text-gray-700 hover:text-primary-green font-medium transition-colors py-2">اتصل بنا</a>
                        <a href="{{ route('donate') }}" class="btn-primary text-center">
                            <i class="fas fa-heart ml-2"></i>
                            تبرع الآن
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- About Section -->
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('images/logo-white.png') }}" alt="سنابل الخير" class="h-10 w-auto">
                        <span class="mr-3 text-xl font-bold">سنابل الخير</span>
                    </div>
                    <p class="text-gray-300 mb-4">
                        {{ setting('site_description_ar', 'جمعية سنابل الخير الخيرية - الدقهلية، مصر') }}
                    </p>
                    <div class="flex space-x-reverse space-x-3">
                        <a href="{{ setting('facebook_url') }}" target="_blank" class="bg-primary-green hover:bg-green-700 w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="{{ setting('twitter_url') }}" target="_blank" class="bg-primary-green hover:bg-green-700 w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="{{ setting('instagram_url') }}" target="_blank" class="bg-primary-green hover:bg-green-700 w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="{{ setting('youtube_url') }}" target="_blank" class="bg-primary-green hover:bg-green-700 w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">روابط سريعة</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white transition-colors">من نحن</a></li>
                        <li><a href="{{ route('projects') }}" class="text-gray-300 hover:text-white transition-colors">المشاريع</a></li>
                        <li><a href="{{ route('news') }}" class="text-gray-300 hover:text-white transition-colors">الأخبار</a></li>
                        <li><a href="{{ route('volunteer') }}" class="text-gray-300 hover:text-white transition-colors">التطوع</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-white transition-colors">اتصل بنا</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">معلومات الاتصال</h3>
                    <ul class="space-y-2 text-gray-300">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt ml-2 mt-1 text-primary-green"></i>
                            <span>{{ setting('address_ar', 'الدقهلية، مصر') }}</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone ml-2 text-primary-green"></i>
                            <span>{{ setting('phone', '+20 50 1234567') }}</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope ml-2 text-primary-green"></i>
                            <span>{{ setting('email', 'info@sanabelalkhair.org') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} جمعية سنابل الخير الخيرية. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer>
    
    <!-- Notification Container -->
    <div id="notification-container" class="fixed top-4 right-4 z-50"></div>
    
    @stack('scripts')
</body>
</html>
