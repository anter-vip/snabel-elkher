@extends('layouts.app')

@section('title', 'من نحن')
@section('description', 'تعرف على جمعية سنابل الخير الخيرية - رؤيتنا ورسالتنا وقيمينا في خدمة المجتمع في محافظة الدقهلية')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/about-hero.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
    </div>
    <div class="relative z-10 text-center text-white px-4">
        <h1 class="text-4xl md:text-6xl font-bold mb-6 text-shadow">من نحن</h1>
        <p class="text-xl md:text-2xl max-w-3xl mx-auto text-shadow">
            جمعية سنابل الخير الخيرية - شراكة من أجل مجتمع أفضل
        </p>
    </div>
</section>

<!-- Vision & Mission -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Vision -->
            <div class="text-center">
                <div class="w-20 h-20 bg-primary-green rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-eye text-white text-3xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-primary-green mb-6">رؤيتنا</h2>
                <p class="text-lg text-gray-600 leading-relaxed">
                    {{ setting('vision_ar', 'تحقيق مجتمع متكامل ومتطور يسوده التعاون والتكافل الاجتماعي') }}
                </p>
            </div>
            
            <!-- Mission -->
            <div class="text-center">
                <div class="w-20 h-20 bg-primary-blue rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-bullseye text-white text-3xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-primary-blue mb-6">رسالتنا</h2>
                <p class="text-lg text-gray-600 leading-relaxed">
                    {{ setting('mission_ar', 'تقديم خدمات تنموية واجتماعية شاملة لتحسين جودة حياة الأفراد والمجتمعات') }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- About Us Content -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-primary-green mb-6">
                        قصتنا بدأت من هنا
                    </h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        تأسست جمعية سنابل الخير الخيرية في عام 2009 في محافظة الدقهلية، مصر. انطلقت من إيمان راسخ بأهمية العمل الجماعي والتكافل الاجتماعي كأساس لبناء مجتمع قوي ومتماسك.
                    </p>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        على مدار السنوات الماضية، عملنا بجد وتفانٍ على تطوير وتقديم برامج ومبادرات متنوعة تستهدف الفئات الأكثر احتياجاً في مجتمعنا، مساهمين في تحسين جودة حياة الآلاف من الأفراد والأسر.
                    </p>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        اليوم، نفخر بكوننا شريكاً موثوقاً في التنمية المجتمعية، ونواصل العمل بجد من أجل تحقيق رؤيتنا في مجتمع ينعم بالعدالة والرخاء والاستدامة للجميع.
                    </p>
                </div>
                <div class="relative">
                    <img src="{{ asset('images/about-story.jpg') }}" alt="قصتنا" class="rounded-xl shadow-2xl">
                    <div class="absolute -bottom-6 -right-6 bg-primary-green text-white p-6 rounded-xl shadow-xl">
                        <div class="text-3xl font-bold mb-2">15+</div>
                        <div class="text-sm">سنة من الخدمة</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-primary-green mb-4">
                قيمنا الأساسية
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                المبادئ التي توجه عملنا وتشكل أساس قراراتنا اليومية
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-heart text-primary-green text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">الرحمة</h3>
                <p class="text-gray-600">
                    نؤمن بأهمية التعاطف والرحمة في التعامل مع جميع أفراد المجتمع
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-balance-scale text-primary-blue text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">العدالة</h3>
                <p class="text-gray-600">
                    نسعى لتحقيق المساواة وتوفير الفرص للجميع دون تمييز
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-lightbulb text-yellow-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">الابتكار</h3>
                <p class="text-gray-600">
                    نطور حلولاً مبتكرة لمواجهة التحديات المجتمعية بشكل فعال
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">الشراكة</h3>
                <p class="text-gray-600">
                    نؤمن بقوة العمل الجماعي والشراكات الفعالة مع المجتمع
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-primary-green mb-4">
                فريق العمل
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                فريق من المتخصصين والمتطوعين الملتزمين بخدمة المجتمع
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                <img src="{{ asset('images/team/Chairman.jpg') }}" alt="رئيس مجلس الإدارة" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                <h3 class="text-xl font-bold text-gray-900 mb-2">أحمد محمد علي</h3>
                <p class="text-primary-green font-semibold mb-3">رئيس مجلس الإدارة</p>
                <p class="text-gray-600 text-sm">
                    خبير في التنمية المجتمعية بأكثر من 20 عاماً من الخبرة
                </p>
            </div>
            
            <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                <img src="{{ asset('images/team/Executive-Director.jpg') }}" alt="المدير التنفيذي" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                <h3 class="text-xl font-bold text-gray-900 mb-2">مريم إبراهيم</h3>
                <p class="text-primary-green font-semibold mb-3">المدير التنفيذي</p>
                <p class="text-gray-600 text-sm">
                    متخصصة في إدارة المشاريع التنموية والعمل المجتمعي
                </p>
            </div>
            
            <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                <img src="{{ asset('images/team/Operations-Manager.jpg') }}" alt="مدير العمليات" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                <h3 class="text-xl font-bold text-gray-900 mb-2">خالد عبدالله</h3>
                <p class="text-primary-green font-semibold mb-3">مدير العمليات</p>
                <p class="text-gray-600 text-sm">
                    مسؤول عن تنسيق وتنفيذ جميع برامج الجمعية
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Achievements -->
<section class="py-20 bg-gradient-primary text-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                إنجازاتنا
            </h2>
            <p class="text-xl opacity-90 max-w-2xl mx-auto">
                أرقام تعكس تأثيرنا الإيجابي في المجتمع
            </p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold mb-2">8500+</div>
                <div class="text-lg">مستفيد</div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold mb-2">45</div>
                <div class="text-lg">مشروع منجز</div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold mb-2">320</div>
                <div class="text-lg">متطوع نشط</div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold mb-2">15+</div>
                <div class="text-lg">سنة من الخدمة</div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-primary-green mb-6">
            انضم إلينا في مهمتنا
        </h2>
        <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
            يمكنك أن تكون جزءاً من التغيير الإيجابي في مجتمعنا من خلال التبرع أو التطوع معنا
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('donate') }}" class="btn-primary text-lg px-8 py-4">
                <i class="fas fa-heart ml-2"></i>
                تبرع الآن
            </a>
            <a href="{{ route('volunteer') }}" class="btn-outline text-lg px-8 py-4">
                <i class="fas fa-hands-helping ml-2"></i>
                انضم كمتطوع
            </a>
        </div>
    </div>
</section>
@endsection
