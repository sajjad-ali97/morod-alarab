<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings->site_name ?? 'مورد العرب' }}</title>
    <meta name="description" content="موقع شركة مورد العرب لعرض أقسام ومنتجات مجمع 120">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-slate-800 antialiased">

    <div class="min-h-screen flex flex-col">

        <header class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/90 backdrop-blur">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-20">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        @if(!empty($settings?->site_logo))
                            <img src="{{ asset('storage/' . $settings->site_logo) }}" alt="{{ $settings->site_name }}" class="h-11 w-11 rounded-xl object-cover border border-slate-200">
                        @else
                            <div class="h-11 w-11 rounded-xl bg-amber-500 text-white flex items-center justify-center font-bold text-lg shadow-sm">
                                م
                            </div>
                        @endif

                        <div>
                            <div class="text-xl font-extrabold tracking-tight text-slate-900">
                                {{ $settings->site_name ?? 'مورد العرب' }}
                            </div>
                            <div class="text-xs text-slate-500">
                                مجمع 120
                            </div>
                        </div>
                    </a>

                    <nav class="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-700">
                        <a href="{{ route('home') }}" class="hover:text-amber-600 transition">الرئيسية</a>
                        <a href="{{ route('categories.index') }}" class="hover:text-amber-600 transition">الأقسام</a>
                        <a href="{{ route('products.index') }}" class="hover:text-amber-600 transition">المنتجات</a>
                        <a href="{{ route('about') }}" class="hover:text-amber-600 transition">حولنا</a>
                        <a href="{{ route('contact') }}" class="hover:text-amber-600 transition">تواصل معنا</a>
                    </nav>

                    <a href="{{ route('products.index') }}"
                       class="hidden md:inline-flex items-center rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white hover:bg-amber-500 transition">
                        استعراض المنتجات
                    </a>
                </div>
            </div>
        </header>

        <main class="flex-1">
            @yield('content')
        </main>

        <footer class="bg-slate-950 text-white mt-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
                <div class="grid md:grid-cols-3 gap-10">
                    <div>
                        <h3 class="text-2xl font-bold mb-4">
                            {{ $settings->site_name ?? 'مورد العرب' }}
                        </h3>
                        <p class="text-slate-300 leading-8 text-sm">
                            منصة تعريفية لعرض أقسام ومنتجات مجمع 120 بطريقة واضحة واحترافية، مع واجهة سهلة للزوار ولوحة تحكم مرنة للإدارة.
                        </p>
                    </div>

                    <div>
                        <h4 class="text-lg font-bold mb-4">روابط سريعة</h4>
                        <ul class="space-y-3 text-slate-300 text-sm">
                            <li><a href="{{ route('home') }}" class="hover:text-amber-400 transition">الرئيسية</a></li>
                            <li><a href="{{ route('categories.index') }}" class="hover:text-amber-400 transition">الأقسام</a></li>
                            <li><a href="{{ route('products.index') }}" class="hover:text-amber-400 transition">المنتجات</a></li>
                            <li><a href="{{ route('about') }}" class="hover:text-amber-400 transition">حولنا</a></li>
                            <li><a href="{{ route('contact') }}" class="hover:text-amber-400 transition">تواصل معنا</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="text-lg font-bold mb-4">معلومات التواصل</h4>
                        <div class="space-y-3 text-sm text-slate-300">
                            <p><span class="text-white font-semibold">الهاتف:</span> {{ $settings->phone ?? '—' }}</p>
                            <p><span class="text-white font-semibold">البريد:</span> {{ $settings->email ?? '—' }}</p>
                            <p><span class="text-white font-semibold">واتساب:</span> {{ $settings->whatsapp ?? '—' }}</p>
                            <p><span class="text-white font-semibold">العنوان:</span> {{ $settings->address ?? '—' }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-10 pt-6 border-t border-slate-800 flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-slate-400">
                    <p>© {{ date('Y') }} {{ $settings->site_name ?? 'مورد العرب' }}. جميع الحقوق محفوظة.</p>
                    <p>تصميم واجهة عرض أعمال ومنتجات مجمع 120</p>
                </div>
            </div>
        </footer>

    </div>

</body>
</html>
