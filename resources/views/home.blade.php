@extends('layouts.app')

@section('content')
    <section class="relative overflow-hidden bg-slate-950 text-white">
        <div class="absolute inset-0 bg-gradient-to-l from-amber-500/10 via-transparent to-transparent"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28 relative">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="inline-flex items-center rounded-full border border-white/15 bg-white/5 px-4 py-2 text-sm text-amber-300 mb-6">
                        شركة مورد العرب
                    </span>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight mb-6">
                        عرض أقسام ومنتجات
                        <span class="text-amber-400">مجمع 120</span>
                        بطريقة احترافية
                    </h1>

                    <p class="text-slate-300 text-lg leading-8 mb-8 max-w-2xl">
                        منصة تعريفية حديثة تتيح للزائر استعراض أقسام المجمع والتعرف على المنتجات المعروضة داخل كل قسم، مع تجربة تصفح واضحة وأنيقة.
                    </p>

                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('categories.index') }}"
                           class="inline-flex items-center rounded-xl bg-amber-500 px-6 py-4 text-sm font-bold text-white hover:bg-amber-600 transition">
                            استعراض الأقسام
                        </a>

                        <a href="{{ route('products.index') }}"
                           class="inline-flex items-center rounded-xl border border-white/15 bg-white/5 px-6 py-4 text-sm font-bold text-white hover:bg-white/10 transition">
                            مشاهدة المنتجات
                        </a>
                    </div>
                </div>

                <div>
                    @if($slides->count())
                        <div class="grid grid-cols-2 gap-4">
                            @foreach($slides->take(4) as $slide)
                                <div class="rounded-3xl overflow-hidden shadow-2xl border border-white/10 bg-white/5">
                                    <img src="{{ asset('storage/' . $slide->image) }}"
                                         alt="{{ $slide->title }}"
                                         class="w-full h-52 object-cover">
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="rounded-3xl border border-white/10 bg-white/5 p-10 text-center text-slate-300">
                            لا توجد صور رئيسية مضافة حاليًا
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-5 mb-12">
                <div>
                    <span class="text-amber-600 font-bold text-sm">الأقسام</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-2">
                        اكتشف أقسام مجمع 120
                    </h2>
                    <p class="text-slate-500 mt-3 max-w-2xl leading-8">
                        تصفح الأقسام المختلفة داخل المجمع، وانتقل مباشرة إلى المنتجات التابعة لكل قسم بكل سهولة.
                    </p>
                </div>

                <a href="{{ route('categories.index') }}"
                   class="inline-flex items-center rounded-xl border border-slate-200 px-5 py-3 text-sm font-bold text-slate-800 hover:border-amber-500 hover:text-amber-600 transition">
                    عرض كل الأقسام
                </a>
            </div>

            <div class="grid sm:grid-cols-2 xl:grid-cols-4 gap-7">
                @forelse($categories as $category)
                    <a href="{{ route('products.index', ['category' => $category->slug]) }}"
                       class="group rounded-3xl overflow-hidden bg-white border border-slate-200 hover:shadow-2xl hover:-translate-y-1 transition duration-300">
                        <div class="overflow-hidden">
                            <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://via.placeholder.com/600x400' }}"
                                 alt="{{ $category->name }}"
                                 class="w-full h-64 object-cover group-hover:scale-105 transition duration-500">
                        </div>

                        <div class="p-6">
                            <h3 class="text-xl font-extrabold text-slate-900 mb-3 group-hover:text-amber-600 transition">
                                {{ $category->name }}
                            </h3>

                            <p class="text-sm text-slate-500 leading-7 line-clamp-3">
                                {{ $category->description ?: 'قسم مميز ضمن مجمع 120 يعرض مجموعة متنوعة من المنتجات والخدمات.' }}
                            </p>

                            <div class="mt-5 text-sm font-bold text-amber-600">
                                عرض المنتجات ←
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full rounded-3xl border border-dashed border-slate-300 p-12 text-center text-slate-500">
                        لا توجد أقسام مضافة حاليًا
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-10 items-center">
                <div>
                    <span class="text-amber-600 font-bold text-sm">من نحن</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mt-2 mb-6">
                        واجهة تعريفية حديثة لأعمال مورد العرب
                    </h2>
                    <p class="text-slate-600 leading-8 mb-6">
                        يهدف هذا الموقع إلى تقديم عرض بصري منظم وواضح لأقسام ومنتجات مجمع 120، بما يساعد الزائر على الوصول السريع للمعلومات والتعرف على طبيعة الأعمال المعروضة داخل المجمع.
                    </p>
                    <a href="{{ route('about') }}"
                       class="inline-flex items-center rounded-xl bg-slate-900 px-6 py-4 text-sm font-bold text-white hover:bg-amber-500 transition">
                        اقرأ المزيد
                    </a>
                </div>

                <div class="grid grid-cols-2 gap-5">
                    <div class="rounded-3xl bg-white p-8 shadow-sm border border-slate-200">
                        <div class="text-4xl font-extrabold text-amber-500 mb-3">01</div>
                        <h3 class="font-bold text-lg text-slate-900 mb-2">عرض منظم</h3>
                        <p class="text-sm text-slate-500 leading-7">تنظيم الأقسام والمنتجات بطريقة سهلة وواضحة للزائر.</p>
                    </div>

                    <div class="rounded-3xl bg-white p-8 shadow-sm border border-slate-200">
                        <div class="text-4xl font-extrabold text-amber-500 mb-3">02</div>
                        <h3 class="font-bold text-lg text-slate-900 mb-2">إدارة مرنة</h3>
                        <p class="text-sm text-slate-500 leading-7">لوحة تحكم تمكّن الإدارة من إضافة المحتوى وتحديثه بسهولة.</p>
                    </div>

                    <div class="rounded-3xl bg-white p-8 shadow-sm border border-slate-200">
                        <div class="text-4xl font-extrabold text-amber-500 mb-3">03</div>
                        <h3 class="font-bold text-lg text-slate-900 mb-2">واجهة حديثة</h3>
                        <p class="text-sm text-slate-500 leading-7">تصميم مناسب لموقع شركة يعكس الثقة والوضوح والاحترافية.</p>
                    </div>

                    <div class="rounded-3xl bg-white p-8 shadow-sm border border-slate-200">
                        <div class="text-4xl font-extrabold text-amber-500 mb-3">04</div>
                        <h3 class="font-bold text-lg text-slate-900 mb-2">وصول أسرع</h3>
                        <p class="text-sm text-slate-500 leading-7">الانتقال من الأقسام إلى المنتجات يتم بشكل مباشر وسلس.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
