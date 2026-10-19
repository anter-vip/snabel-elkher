@extends('layouts.app')

@section('title', 'الأخبار')
@section('description', 'آخر أخبار وأنشطة جمعية سنابل الخير الخيرية في الدقهلية، مصر. تابع أخبارنا ومبادراتنا')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/news-hero.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
    </div>
    <div class="relative z-10 text-center text-white px-4">
        <h1 class="text-4xl md:text-6xl font-bold mb-6 text-shadow">الأخبار والأنشطة</h1>
        <p class="text-xl md:text-2xl max-w-3xl mx-auto text-shadow">
            تابع آخر أخبارنا وأنشطتنا ومبادراتنا في خدمة المجتمع
        </p>
    </div>
</section>

<!-- Featured News -->
@if($featuredNews->count() > 0)
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-primary-green mb-4">الأخبار المميزة</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                أهم الأخبار والفعاليات التي تحتاج إلى اهتمامكم
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            @foreach($featuredNews as $index => $featured)
            <div class="card {{ $index === 0 ? 'lg:col-span-2 lg:row-span-2' : '' }}">
                <div class="relative {{ $index === 0 ? 'h-96' : 'h-48' }} overflow-hidden">
                    <img src="{{ $featured->image_path ? asset('storage/' . $featured->image_path) : asset('images/news/default.jpg') }}" 
                         alt="{{ $featured->title_ar }}" 
                         class="w-full h-full object-cover">
                    <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                        مميز
                    </div>
                    @if($featured->category)
                    <div class="absolute top-4 left-4 bg-white bg-opacity-90 text-gray-900 px-3 py-1 rounded-full text-sm font-semibold">
                        {{ $featured->category }}
                    </div>
                    @endif
                </div>
                <div class="p-6">
                    <div class="text-sm text-gray-500 mb-3">
                        <i class="fas fa-calendar ml-1"></i>
                        {{ $featured->published_at->format('d M Y') }}
                        <span class="mx-2">•</span>
                        <i class="fas fa-eye ml-1"></i>
                        {{ $featured->views_count }} مشاهدة
                    </div>
                    <h3 class="text-xl {{ $index === 0 ? 'text-2xl' : '' }} font-bold text-gray-900 mb-3">
                        {{ $featured->title_ar }}
                    </h3>
                    <p class="text-gray-600 {{ $index === 0 ? 'text-lg' : '' }} mb-4 line-clamp-{{ $index === 0 ? '4' : '2' }}">
                        {{ $featured->excerpt_ar }}
                    </p>
                    <a href="{{ route('news.show', $featured->slug) }}" class="text-primary-green hover:text-green-700 font-semibold inline-flex items-center">
                        قراءة المزيد
                        <i class="fas fa-arrow-left mr-1"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Filter Section -->
<section class="py-8 bg-gray-50 border-b">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <!-- Search -->
            <form method="GET" class="flex-1 max-w-md">
                <div class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="ابحث عن خبر..." 
                           class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent">
                    <button type="submit" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-primary-green">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>

            <!-- Category Filter -->
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('news') }}" 
                   class="px-4 py-2 rounded-full border {{ !request('category') ? 'bg-primary-green text-white border-primary-green' : 'border-gray-300 text-gray-700 hover:border-primary-green hover:text-primary-green' }} transition-colors">
                    جميع الأخبار
                </a>
                @foreach($categories as $category)
                <a href="{{ route('news', ['category' => $category]) }}" 
                   class="px-4 py-2 rounded-full border {{ request('category') == $category ? 'bg-primary-green text-white border-primary-green' : 'border-gray-300 text-gray-700 hover:border-primary-green hover:text-primary-green' }} transition-colors">
                    {{ $category }}
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- News Grid -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        @if($news->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($news as $item)
            <div class="card hover:shadow-xl transition-shadow duration-300">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ $item->image_path ? asset('storage/' . $item->image_path) : asset('images/news/default.jpg') }}" 
                         alt="{{ $item->title_ar }}" 
                         class="w-full h-full object-cover">
                    @if($item->featured)
                    <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                        مميز
                    </div>
                    @endif
                    @if($item->category)
                    <div class="absolute top-4 left-4 bg-white bg-opacity-90 text-gray-900 px-3 py-1 rounded-full text-sm font-semibold">
                        {{ $item->category }}
                    </div>
                    @endif
                </div>
                
                <div class="p-6">
                    <div class="text-sm text-gray-500 mb-3">
                        <i class="fas fa-calendar ml-1"></i>
                        {{ $item->published_at->format('d M Y') }}
                        <span class="mx-2">•</span>
                        <i class="fas fa-eye ml-1"></i>
                        {{ $item->views_count }} مشاهدة
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                        {{ $item->title_ar }}
                    </h3>
                    
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        {{ $item->excerpt_ar }}
                    </p>
                    
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            <i class="fas fa-user ml-1"></i>
                            {{ $item->author ?: 'إدارة الجمعية' }}
                        </div>
                        <a href="{{ route('news.show', $item->slug) }}" class="text-primary-green hover:text-green-700 font-semibold inline-flex items-center">
                            قراءة المزيد
                            <i class="fas fa-arrow-left mr-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $news->links() }}
        </div>
        @else
        <div class="text-center py-12">
            <div class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-newspaper text-gray-400 text-3xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-4">لا توجد أخبار حالياً</h3>
            <p class="text-gray-600 mb-8">لم نعثر على أخبار تطابق بحثك. حاول مرة أخرى بمعايير مختلفة.</p>
            <a href="{{ route('news') }}" class="btn-outline">
                عرض جميع الأخبار
            </a>
        </div>
        @endif
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-20 bg-gradient-primary text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">
            اشترك في نشرتنا البريدية
        </h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto opacity-90">
            احصل على آخر أخبار وأنشطة الجمعية مباشرة على بريدك الإلكتروني
        </p>
        <form class="max-w-md mx-auto flex flex-col sm:flex-row gap-4" action="#" method="POST">
            @csrf
            <input type="email" name="email" placeholder="بريدك الإلكتروني" required
                   class="flex-1 px-4 py-3 rounded-lg text-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-white">
            <button type="submit" class="btn-primary bg-white text-primary-green hover:bg-gray-100 px-6 py-3">
                اشتراك
            </button>
        </form>
    </div>
</section>
@endsection
