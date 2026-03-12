@extends('layouts.app')

@section('content')
    <section class="categories-hero-section">
        <div class="site-container">

            {{-- Top Intro --}}
            <div class="categories-hero text-center mx-auto">
                <span class="categories-hero-badge">
                    أقسام مجمع 120
                </span>

                <h1 class="categories-hero-title">
                    أقسام متنوّعة... ومنتجات مختارة بعناية لتمنحكم تجربة تسوّق تليق بثقتكم
                </h1>

                <p class="categories-hero-text mx-auto">
                    في مجمع 120 نحرص على تقديم أقسام متكاملة تجمع بين الجودة، التنوع، وحسن الاختيار،
                    لتجدوا كل ما تحتاجونه ضمن بيئة تسوق منظمة، مريحة، وعصرية تلبي احتياجات العائلة
                    وتمنحكم تجربة أكثر سهولة وثقة.
                </p>
            </div>

            @if($categories->count())
                <div class="categories-grid">
                    @foreach($categories as $category)
                        <a href="{{ route('products.index', ['category' => $category->slug]) }}"
                           class="category-premium-card {{ $loop->first ? 'category-premium-card-featured' : '' }}">

                            <div class="category-premium-media">
                                <img
                                    src="{{ $category->image ? asset('storage/' . $category->image) : 'https://via.placeholder.com/900x700' }}"
                                    alt="{{ $category->name }}"
                                    class="category-premium-image"
                                >

                                <div class="category-premium-overlay"></div>

                                <span class="category-premium-badge">
                                    {{ $loop->first ? 'القسم الأبرز' : 'قسم مميز' }}
                                </span>
                            </div>

                            <div class="category-premium-content">
                                <div class="category-premium-top">
                                    <div>
                                        <h2 class="category-premium-title">
                                            {{ $category->name }}
                                        </h2>

                                       <p class="category-premium-desc">
    {{ \Illuminate\Support\Str::limit($category->description ?: 'منتجات مختارة بعناية وتفاصيل تلائم مختلف الأذواق والاحتياجات اليومية.', 110) }}
</p>
                                    </div>

                                    <div class="category-premium-arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                    </div>
                                </div>

                                <div class="category-premium-meta">
                                    @if(isset($category->products_count))
                                        <span class="category-meta-chip">
                                            {{ $category->products_count }} منتج
                                        </span>
                                    @endif

                                    <span class="category-meta-chip soft">
                                        جودة مختارة
                                    </span>
                                </div>

                                <div class="category-premium-footer">
                                    <span>استعراض منتجات القسم</span>
                                    <span class="category-premium-line"></span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="empty-categories-state">
                    <h3>لا توجد أقسام متاحة حالياً</h3>
                    <p>سيتم إضافة الأقسام قريباً مع مجموعة مميزة من المنتجات.</p>
                </div>
            @endif

        </div>
    </section>
@endsection
