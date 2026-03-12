@extends('layouts.app')

@section('content')
    <section class="products-hero-section">
        <div class="site-container">
            {{-- Hero --}}
            <div class="products-hero">
                <span class="products-hero-badge">منتجات موثوقة بجودة عالية</span>

                <h1 class="products-hero-title">
                    منتجاتنا المختارة بعناية لتلبية احتياجات السوق بكفاءة واحتراف
                </h1>

                <p class="products-hero-text">
                    نوفر تشكيلة متنوعة من المنتجات التي تجمع بين الجودة والاعتمادية، مع اهتمام بالتفاصيل
                    التي تمنح عملاءنا تجربة أفضل وحلولًا عملية تناسب مختلف المتطلبات التجارية.
                </p>
            </div>

            {{-- Filter --}}
            <div class="products-filter-wrap">
                <form method="GET" action="{{ route('products.index') }}" class="products-filter-form">
                    <div class="products-filter-box">
                        <select name="category" onchange="this.form.submit()" class="products-filter-select">
                            <option value="all" {{ ($selectedCategory === 'all' || !$selectedCategory) ? 'selected' : '' }}>
                                عرض جميع المنتجات
                            </option>

                            @foreach($categories as $category)
                                <option value="{{ $category->slug }}" {{ $selectedCategory === $category->slug ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        <span class="products-filter-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </div>
                </form>
            </div>

            {{-- Products --}}
            @forelse($products as $product)
                @if($loop->first)
                    <div class="products-grid">
                @endif

                <article class="product-premium-card">
                    <div class="product-premium-media">
                        <img
                            src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/800x600?text=Product' }}"
                            alt="{{ $product->name }}"
                            class="product-premium-image"
                        >
                        <div class="product-premium-overlay"></div>

                        @if($product->category)
                            <span class="product-premium-badge">
                                {{ $product->category->name }}
                            </span>
                        @endif
                    </div>

                    <div class="product-premium-content">
                        <h2 class="product-premium-title">
                            {{ $product->name }}
                        </h2>

                        <p class="product-premium-desc">
                            {{ \Illuminate\Support\Str::limit($product->description, 140) ?: 'منتج مميز ضمن مجموعتنا المختارة بعناية لتقديم جودة أفضل وقيمة عملية تلائم احتياجات العملاء.' }}
                        </p>

                        <div class="product-premium-meta">
                            <span class="product-meta-chip">
                                {{ $product->category->name ?? 'منتج مميز' }}
                            </span>

                            <span class="product-card-arrow" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </article>

                @if($loop->last)
                    </div>
                @endif
            @empty
                <div class="empty-products-state">
                    <h3>لا توجد منتجات ضمن هذا القسم</h3>
                    <p>
                        لم يتم العثور على منتجات مطابقة للتصنيف المحدد حاليًا. يمكنك اختيار قسم آخر
                        أو العودة لعرض جميع المنتجات المتوفرة.
                    </p>

                    <a href="{{ route('products.index', ['category' => 'all']) }}" class="btn btn-primary">
                        عرض جميع المنتجات
                    </a>
                </div>
            @endforelse
        </div>
    </section>
@endsection
