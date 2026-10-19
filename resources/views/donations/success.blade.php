@extends('layouts.app')

@section('title', 'شكراً لتبرعك')
@section('description', 'شكراً لتبرعك لجمعية سنابل الخير الخيرية. تم استلام تبرعك بنجاح.')

@section('content')
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto text-center">
            <!-- Success Icon -->
            <div class="mb-8">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto">
                    <i class="fas fa-check-circle text-4xl text-green-500"></i>
                </div>
            </div>

            <!-- Success Message -->
            <h1 class="text-4xl font-bold text-primary-green mb-4">
                شكراً لتبرعك!
            </h1>
            <p class="text-xl text-gray-600 mb-8">
                تم استلام تبرعك بنجاح. نقدر دعمك الكبير لمشاريعنا الخيرية.
            </p>

            <!-- Donation Details -->
            <div class="bg-white rounded-xl shadow-lg p-8 mb-8 text-right">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">تفاصيل التبرع</h2>
                <div class="space-y-4">
                    <div class="flex justify-between items-center py-2 border-b">
                        <span class="text-gray-600">رقم التبرع</span>
                        <span class="font-semibold">{{ $donation->generateReceiptNumber() }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b">
                        <span class="text-gray-600">المبلغ</span>
                        <span class="font-semibold text-primary-green">{{ $donation->getFormattedAmount() }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b">
                        <span class="text-gray-600">التاريخ</span>
                        <span class="font-semibold">{{ $donation->created_at->format('d/m/Y h:i A') }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b">
                        <span class="text-gray-600">طريقة الدفع</span>
                        <span class="font-semibold">{{ $donation->getPaymentMethodText() }}</span>
                    </div>
                    @if($donation->project)
                    <div class="flex justify-between items-center py-2 border-b">
                        <span class="text-gray-600">المشروع</span>
                        <span class="font-semibold">{{ $donation->project->title_ar }}</span>
                    </div>
                    @endif
                    <div class="flex justify-between items-center py-2">
                        <span class="text-gray-600">الحالة</span>
                        <span class="font-semibold text-green-600">{{ $donation->getStatusText() }}</span>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="space-y-4">
                <a href="{{ route('donations.receipt', $donation) }}" class="btn-primary inline-flex items-center">
                    <i class="fas fa-download ml-2"></i>
                    تحميل إيصال التبرع
                </a>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('home') }}" class="btn-outline">
                        <i class="fas fa-home ml-2"></i>
                        العودة للرئيسية
                    </a>
                    <a href="{{ route('projects') }}" class="btn-outline">
                        <i class="fas fa-eye ml-2"></i>
                        عرض المشاريع
                    </a>
                </div>
            </div>

            <!-- Social Share -->
            <div class="mt-12">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">شارك خبر تبرعك</h3>
                <div class="flex justify-center space-x-reverse space-x-4">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white w-12 h-12 rounded-full flex items-center justify-center transition-colors">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text=لقد تبرعت لجمعية سنابل الخير الخيرية! انضموا إلينا في دعم الأعمال الخيرية." target="_blank" class="bg-sky-500 hover:bg-sky-600 text-white w-12 h-12 rounded-full flex items-center justify-center transition-colors">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://wa.me/?text=لقد تبرعت لجمعية سنابل الخير الخيرية! انضموا إلينا في دعم الأعمال الخيرية. {{ url()->current() }}" target="_blank" class="bg-green-600 hover:bg-green-700 text-white w-12 h-12 rounded-full flex items-center justify-center transition-colors">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <!-- Impact Message -->
            <div class="mt-12 bg-primary-green text-white rounded-xl p-8">
                <h3 class="text-2xl font-bold mb-4">أثر تبرعك</h3>
                <p class="text-lg mb-6">
                    مع تبرعك البالغ {{ $donation->getFormattedAmount() }}، يمكنك:
                </p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-right">
                    @if($donation->amount >= 50)
                    <div class="bg-white bg-opacity-10 rounded-lg p-4">
                        <i class="fas fa-utensils text-3xl mb-2"></i>
                        <p>توفير وجبة طعام لشخص محتاج</p>
                    </div>
                    @endif
                    @if($donation->amount >= 100)
                    <div class="bg-white bg-opacity-10 rounded-lg p-4">
                        <i class="fas fa-book text-3xl mb-2"></i>
                        <p>شراء كتاب طالب محتاج</p>
                    </div>
                    @endif
                    @if($donation->amount >= 250)
                    <div class="bg-white bg-opacity-10 rounded-lg p-4">
                        <i class="fas fa-medkit text-3xl mb-2"></i>
                        <p>توفير دواء لشخص مريض</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
