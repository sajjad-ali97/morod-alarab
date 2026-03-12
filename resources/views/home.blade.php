@extends('layouts.app')

@push('styles')
<style>
    .home-hero {
        background:
            radial-gradient(circle at top right, rgba(46, 161, 184, 0.18), transparent 24%),
            radial-gradient(circle at bottom left, rgba(57, 51, 139, 0.18), transparent 28%),
            linear-gradient(135deg, #0f172a 0%, #111827 45%, #1e1b4b 100%);
    }

    .home-hero-grid {
        display: grid;
        grid-template-columns: 1.1fr .9fr;
        gap: 3rem;
        align-items: center;
    }

    .home-badge {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        border: 1px solid rgba(255,255,255,.14);
        background: rgba(255,255,255,.06);
        color: #fbbf24;
        border-radius: 999px;
        padding: .75rem 1rem;
        font-size: .9rem;
        font-weight: 700;
        backdrop-filter: blur(10px);
    }

    .home-hero-title {
        margin: 1rem 0 1.25rem;
        font-size: clamp(2.1rem, 4vw, 4.25rem);
        line-height: 1.2;
        font-weight: 800;
        color: #fff;
    }

    .home-hero-title .accent {
        color: #67e8f9;
    }

    .home-hero-text {
        color: rgba(255,255,255,.82);
        font-size: 1.08rem;
        line-height: 2;
        max-width: 760px;
        margin-bottom: 1.5rem;
    }

    .hero-tags {
        display: flex;
        flex-wrap: wrap;
        gap: .7rem;
        margin-bottom: 2rem;
    }

    .hero-tag {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 40px;
        padding-inline: .95rem;
        border-radius: 999px;
        background: rgba(255,255,255,.07);
        border: 1px solid rgba(255,255,255,.10);
        color: rgba(255,255,255,.92);
        font-size: .9rem;
        font-weight: 700;
    }

    .hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .hero-stats {
        display: grid;
        grid-template-columns: repeat(3, minmax(0,1fr));
        gap: 1rem;
    }

    .hero-stat {
        border: 1px solid rgba(255,255,255,.10);
        background: rgba(255,255,255,.05);
        border-radius: 1.25rem;
        padding: 1rem 1rem;
        backdrop-filter: blur(10px);
    }

    .hero-stat strong {
        display: block;
        color: #fff;
        font-size: 1.35rem;
        font-weight: 800;
        margin-bottom: .3rem;
    }

    .hero-stat span {
        color: rgba(255,255,255,.74);
        font-size: .92rem;
        line-height: 1.7;
    }

    .slider-stage {
        position: relative;
    }

    .slider-panel {
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        position: absolute;
        inset: 0;
        transform: translateY(10px);
        transition: opacity .55s ease, transform .55s ease, visibility .55s ease;
    }

    .slider-panel.is-active {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
        position: relative;
        transform: translateY(0);
    }

    .hero-media-panel {
        display: grid;
        grid-template-columns: repeat(2, minmax(0,1fr));
        gap: 1rem;
    }

    .hero-media-card {
        overflow: hidden;
        border-radius: 1.75rem;
        border: 1px solid rgba(255,255,255,.10);
        background: rgba(255,255,255,.06);
        box-shadow: 0 18px 50px rgba(15, 23, 42, .28);
    }

    .hero-media-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        transition: transform .5s ease;
    }

    .hero-media-card:hover img {
        transform: scale(1.05);
    }

    .hero-placeholder {
        border: 1px dashed rgba(255,255,255,.16);
        border-radius: 1.75rem;
        padding: 3rem 2rem;
        color: rgba(255,255,255,.72);
        text-align: center;
        background: rgba(255,255,255,.04);
    }

    .section-kicker {
        color: var(--color-secondary);
        font-weight: 800;
        font-size: .95rem;
        margin-bottom: .65rem;
        display: inline-block;
    }

    .section-heading {
        font-size: clamp(2rem, 3vw, 3rem);
        font-weight: 800;
        line-height: 1.25;
        color: var(--color-text);
        margin: 0 0 1rem;
    }

    .section-copy {
        color: var(--color-muted);
        line-height: 2;
        font-size: 1rem;
        max-width: 760px;
    }

    .home-section-top {
        display: flex;
        align-items: end;
        justify-content: space-between;
        gap: 1.25rem;
        margin-bottom: 2.25rem;
        flex-wrap: wrap;
    }

    .category-stage {
        position: relative;
        min-height: 520px;
    }

    .category-panel {
        display: grid;
        grid-template-columns: repeat(4, minmax(0,1fr));
        gap: 1.4rem;
    }

    .premium-category-card {
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        height: 100%;
        background:
            linear-gradient(180deg, rgba(255,255,255,1) 0%, rgba(248,250,252,1) 100%);
        border: 1px solid rgba(57, 51, 139, 0.10);
        border-radius: 1.7rem;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
        transition: transform .28s ease, box-shadow .28s ease, border-color .28s ease;
    }

    .premium-category-card::before {
        content: "";
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at top right, rgba(46,161,184,.12), transparent 26%),
            radial-gradient(circle at bottom left, rgba(57,51,139,.08), transparent 26%);
        pointer-events: none;
    }

    .premium-category-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 24px 50px rgba(15, 23, 42, 0.12);
        border-color: rgba(46, 161, 184, 0.24);
    }

    .premium-category-media {
        position: relative;
        overflow: hidden;
    }

    .premium-category-media img {
        width: 100%;
        height: 240px;
        object-fit: cover;
        transition: transform .55s ease;
    }

    .premium-category-card:hover .premium-category-media img {
        transform: scale(1.06);
    }

    .premium-category-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        z-index: 2;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 34px;
        padding-inline: .85rem;
        border-radius: 999px;
        background: rgba(15, 23, 42, .72);
        color: #fff;
        font-size: .8rem;
        font-weight: 800;
        backdrop-filter: blur(8px);
    }

    .premium-category-body {
        position: relative;
        z-index: 1;
        display: flex;
        flex-direction: column;
        flex: 1;
        padding: 1.35rem;
    }

    .premium-category-title {
        color: var(--color-text);
        font-size: 1.2rem;
        font-weight: 800;
        margin-bottom: .75rem;
    }

    .premium-category-text {
        color: var(--color-muted);
        font-size: .95rem;
        line-height: 1.9;
        margin-bottom: 1rem;
        flex: 1;
    }

    .premium-category-link {
        color: var(--color-primary);
        font-weight: 800;
        font-size: .95rem;
    }

    .home-feature-grid {
        display: grid;
        grid-template-columns: 1.05fr .95fr;
        gap: 2rem;
        align-items: center;
    }

    .home-feature-cards {
        display: grid;
        grid-template-columns: repeat(2, minmax(0,1fr));
        gap: 1.25rem;
    }

    .feature-card {
        background: #fff;
        border: 1px solid rgba(57, 51, 139, 0.08);
        border-radius: 1.6rem;
        padding: 2rem 1.5rem;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
        transition: transform .25s ease, box-shadow .25s ease;
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 45px rgba(15, 23, 42, 0.10);
    }

    .feature-number {
        font-size: 2.5rem;
        line-height: 1;
        font-weight: 800;
        color: #f59e0b;
        margin-bottom: .9rem;
    }

    .feature-title {
        font-size: 1.2rem;
        font-weight: 800;
        color: var(--color-text);
        margin-bottom: .75rem;
    }

    .feature-text {
        color: var(--color-muted);
        line-height: 1.9;
        font-size: .95rem;
    }

    .home-about-card {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        border: 1px solid rgba(57, 51, 139, 0.08);
        border-radius: 2rem;
        padding: 2rem;
        box-shadow: 0 14px 40px rgba(15, 23, 42, 0.06);
    }

    .about-points {
        display: grid;
        gap: .9rem;
        margin: 1.5rem 0 2rem;
    }

    .about-point {
        display: flex;
        align-items: start;
        gap: .8rem;
        color: var(--color-muted);
        line-height: 1.9;
    }

    .about-point i {
        width: 10px;
        height: 10px;
        min-width: 10px;
        border-radius: 999px;
        margin-top: .65rem;
        background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
        display: inline-block;
    }

    @media (max-width: 1200px) {
        .category-panel {
            grid-template-columns: repeat(2, minmax(0,1fr));
        }

        .category-stage {
            min-height: 1040px;
        }
    }

    @media (max-width: 991px) {
        .home-hero-grid,
        .home-feature-grid {
            grid-template-columns: 1fr;
        }

        .hero-stats {
            grid-template-columns: 1fr;
        }

        .hero-media-card img {
            height: 180px;
        }

        .home-feature-cards {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 767px) {
        .home-hero {
            padding-top: 1rem;
        }

        .hero-media-panel {
            grid-template-columns: 1fr 1fr;
            gap: .75rem;
        }

        .hero-media-card img {
            height: 145px;
        }

        .home-feature-cards,
        .category-panel {
            grid-template-columns: 1fr;
        }

        .category-stage {
            min-height: 0;
        }

        .slider-panel {
            position: relative;
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            transform: none;
            display: none;
        }

        .slider-panel.is-active {
            display: grid;
        }
    }

    @media (max-width: 520px) {
        .hero-tags {
            gap: .5rem;
        }

        .hero-tag {
            font-size: .8rem;
            min-height: 36px;
            padding-inline: .8rem;
        }

        .hero-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .hero-media-panel {
            grid-template-columns: 1fr;
        }
    }



    .company-showcase-grid {
        display: grid;
        grid-template-columns: 1.05fr .95fr;
        gap: 2rem;
        align-items: center;
    }

    .company-showcase-content {
        position: relative;
    }

    .company-accent {
        color: var(--color-primary);
    }

    .company-copy {
        margin-bottom: 1rem;
    }

    .company-highlights {
        display: grid;
        grid-template-columns: repeat(3, minmax(0,1fr));
        gap: 1rem;
        margin: 1.75rem 0;
    }

    .company-highlight {
        background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        border: 1px solid rgba(57, 51, 139, 0.10);
        border-radius: 1.25rem;
        padding: 1.1rem 1rem;
        box-shadow: 0 12px 24px rgba(15, 23, 42, 0.05);
    }

    .company-highlight strong {
        display: block;
        color: var(--color-primary);
        font-size: 1.1rem;
        font-weight: 800;
        margin-bottom: .4rem;
    }

    .company-highlight span {
        color: var(--color-muted);
        font-size: .92rem;
        line-height: 1.7;
    }

    .company-points {
        display: grid;
        gap: .85rem;
        margin-bottom: 2rem;
    }

    .company-point {
        display: flex;
        align-items: start;
        gap: .8rem;
        color: var(--color-muted);
        font-size: .98rem;
        line-height: 1.9;
    }

    .company-point i {
        width: 10px;
        height: 10px;
        min-width: 10px;
        border-radius: 999px;
        margin-top: .7rem;
        background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
        display: inline-block;
    }

    .company-showcase-media {
        position: relative;
    }

    .company-media-grid {
        display: grid;
        grid-template-columns: 1.15fr .85fr;
        gap: 1rem;
    }

    .company-media-card {
        overflow: hidden;
        border-radius: 1.6rem;
        border: 1px solid rgba(57, 51, 139, 0.10);
        background: #fff;
        box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
        min-height: 220px;
    }

    .company-media-card.is-large {
        grid-row: span 2;
        min-height: 460px;
    }

    .company-media-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .45s ease;
    }

    .company-media-card:hover img {
        transform: scale(1.04);
    }

    .company-floating-card {
        position: absolute;
        left: -20px;
        bottom: 20px;
        z-index: 3;
        max-width: 260px;
        background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
        color: #fff;
        border-radius: 1.25rem;
        padding: 1rem 1.1rem;
        box-shadow: 0 18px 38px rgba(57, 51, 139, 0.22);
    }

    .company-floating-card span {
        display: block;
        font-size: .85rem;
        font-weight: 700;
        opacity: .9;
        margin-bottom: .35rem;
    }

    .company-floating-card strong {
        display: block;
        font-size: 1rem;
        line-height: 1.7;
        font-weight: 800;
    }

    @media (max-width: 991px) {
        .company-showcase-grid {
            grid-template-columns: 1fr;
        }

        .company-highlights {
            grid-template-columns: 1fr 1fr 1fr;
        }

        .company-floating-card {
            left: 20px;
            bottom: 20px;
        }
    }

    @media (max-width: 767px) {
        .company-highlights {
            grid-template-columns: 1fr;
        }

        .company-media-grid {
            grid-template-columns: 1fr;
        }

        .company-media-card,
        .company-media-card.is-large {
            min-height: 240px;
            grid-row: auto;
        }

        .company-floating-card {
            position: relative;
            left: auto;
            bottom: auto;
            max-width: 100%;
            margin-top: 1rem;
        }
    }


</style>
@endpush

@section('content')
    @php
        $heroGroups = $slides->count() ? $slides->chunk(4) : collect();
        $categoryGroups = $categories->count() ? $categories->chunk(4) : collect();

        $categoryMarketing = [
            'كوزمتك' => 'مجموعة واسعة من مستحضرات التجميل والعناية اليومية التي تجمع بين الجودة والاختيار المتنوع.',
            'ملابس نسائية' => 'تصاميم عصرية وكلاسيكية تناسب مختلف الأذواق والمناسبات داخل تجربة تسوق مريحة ومتجددة.',
            'ذهب برازيلي' => 'تشكيلة مميزة من الإكسسوارات والذهب البرازيلي بلمسة أنيقة تناسب الباحثين عن التميز.',
            'ملابس اطفال' => 'خيارات عملية وأنيقة للأطفال بموديلات متنوعة تلائم الاحتياج اليومي والمناسبات.',
            'حجابات نسائية' => 'موديلات حجاب متنوعة بألوان وخامات متعددة تلائم الإطلالة اليومية والعملية.',
            'ملابس داخلية نسائية' => 'منتجات مختارة بعناية تجمع بين الراحة والجودة والتنوع لتلبية مختلف الاحتياجات.',
            'منظفات' => 'حلول تنظيف منزلية متنوعة تساعد على تلبية احتياجات البيت اليومية بكفاءة وسهولة.',
            'العاب اطفال' => 'تشكيلة ألعاب مسلية وتعليمية تمنح الأطفال تجربة ممتعة وتناسب مختلف الأعمار.',
        ];
    @endphp

    {{-- COMPANY SECTION --}}
    <section class="section bg-white">
        <div class="site-container">
           

                <div class="company-showcase-content">
                    <span class="section-kicker">شركة مورد العرب</span>

                    <h2 class="section-heading">
                        خبرة تجارية متنامية ورؤية واضحة في
                        <span class="company-accent">تجارة واستيراد الملابس</span>
                    </h2>

                    <p class="section-copy company-copy">
                        شركة مورد العرب للتجارة والمقاولات العامة محدودة المسؤولية هي شركة متخصصة
                        في تجارة واستيراد الملابس، وتمتلك خبرة تمتد لأكثر من سنتين في السوق،
                        وتعمل على توفير منتجات ذات جودة عالية تلبي متطلبات السوق المحلي وتنسجم
                        مع احتياجات البيع المباشر داخل مجمع 120.
                    </p>

                    <p class="section-copy company-copy">
                        نحرص في مورد العرب على اختيار أفضل الموردين، والالتزام بمعايير الجودة،
                        والدقة في المواعيد، وبناء علاقات تجارية قائمة على الثقة والمصداقية،
                        مع تقديم حلول توريد مرنة تناسب مختلف الاحتياجات التجارية.
                    </p>

                    <p class="section-copy company-copy">
                        ونسعى دائمًا إلى التطور والتوسع وتقديم قيمة حقيقية لعملائنا من خلال
                        منتجات موثوقة، عرض منظم، وخدمة احترافية تعكس هوية الشركة وطموحها في السوق.
                    </p>

                    <div class="company-highlights">
                        <div class="company-highlight">
                            <strong>+2 سنوات</strong>
                            <span>خبرة عملية متواصلة في السوق المحلي</span>
                        </div>

                        <div class="company-highlight">
                            <strong>جودة موثوقة</strong>
                            <span>اختيار دقيق للموردين والمنتجات</span>
                        </div>

                        <div class="company-highlight">
                            <strong>توريد مرن</strong>
                            <span>حلول مناسبة لمتطلبات البيع والتوزيع</span>
                        </div>
                    </div>

                    <div class="company-points">
                        <div class="company-point">
                            <i></i>
                            <span>اختيار منتجات تلائم احتياج السوق المحلي وتواكب طلب الزبائن.</span>
                        </div>

                        <div class="company-point">
                            <i></i>
                            <span>بناء علاقات تجارية قائمة على الالتزام والثقة والمصداقية.</span>
                        </div>

                        <div class="company-point">
                            <i></i>
                            <span>ربط بين الاستيراد والعرض المباشر من خلال مجمع 120.</span>
                        </div>
                    </div>

                    <div class="hero-actions">
                        <a href="{{ route('about') }}" class="btn btn-primary">
                            تعرّف على الشركة
                        </a>

                        <a href="{{ route('products.index') }}" class="btn btn-outline">
                            استعراض المنتجات
                        </a>
                    </div>
                </div>




        </div>
    </section>
    {{-- HERO --}}
    <section class="home-hero relative overflow-hidden text-white">
        <div class="site-container relative py-20 lg:py-28">
            <div class="home-hero-grid">

                <div>
                    <span class="home-badge">مجمع 120 • وجهتك المتكاملة للتسوق</span>

                    <h1 class="home-hero-title">
                        مجمع 120 يجمع لك
                        <span class="accent">كل ما تحتاجه</span>
                        في تجربة تسوق واحدة
                    </h1>

                    <p class="home-hero-text">
                        منصة تعريفية تسويقية حديثة تعرض أقسام مجمع 120 الثمانية بصورة مختصرة وواضحة،
                        بدءًا من الكوزمتك والملابس النسائية والحجابات، وصولًا إلى الذهب البرازيلي
                        وملابس الأطفال والمنظفات وألعاب الأطفال، لتمنح الزائر تصورًا سريعًا
                        عن تنوع المنتجات وسهولة الوصول إلى كل قسم.
                    </p>

                    <div class="hero-tags">
                        <span class="hero-tag">كوزمتك</span>
                        <span class="hero-tag">ملابس نسائية</span>
                        <span class="hero-tag">ذهب برازيلي</span>
                        <span class="hero-tag">ملابس أطفال</span>
                        <span class="hero-tag">حجابات نسائية</span>
                        <span class="hero-tag">ملابس داخلية نسائية</span>
                        <span class="hero-tag">منظفات</span>
                        <span class="hero-tag">ألعاب أطفال</span>
                    </div>

                    <div class="hero-actions">
                        <a href="{{ route('categories.index') }}" class="btn btn-primary">
                            استعراض الأقسام
                        </a>

                        <a href="{{ route('products.index') }}" class="btn btn-outline" style="border-color: rgba(255,255,255,.22); color:#fff;">
                            مشاهدة المنتجات
                        </a>
                    </div>

                    <div class="hero-stats">
                        <div class="hero-stat">
                            <strong>08</strong>
                            <span>أقسام متنوعة تلبي احتياجات المرأة، الطفل، المنزل والتسوق اليومي.</span>
                        </div>

                        <div class="hero-stat">
                            <strong>120</strong>
                            <span>هوية مجمع تحمل التنوع والوفرة وسهولة الوصول إلى الخيارات المختلفة.</span>
                        </div>

                        <div class="hero-stat">
                            <strong>24/7</strong>
                            <span>واجهة تعريفية جاهزة لتقديم صورة احترافية عن المجمع ومنتجاته في أي وقت.</span>
                        </div>
                    </div>
                </div>

                <div>
                    @if($heroGroups->count())
                        <div class="slider-stage" id="heroSlider">
                            @foreach($heroGroups as $index => $group)
                                <div class="slider-panel hero-media-panel {{ $index === 0 ? 'is-active' : '' }}">
                                    @foreach($group as $slide)
                                        <div class="hero-media-card">
                                            <img
                                                src="{{ asset('storage/' . $slide->image) }}"
                                                alt="{{ $slide->title ?? 'صورة من مجمع 120' }}"
                                            >
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="hero-placeholder">
                            سيتم عرض صور مجمع 120 والمنتجات المميزة هنا بشكل تلقائي عند إضافة الشرائح من لوحة التحكم.
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>

    {{-- CATEGORIES --}}
    <section class="section bg-white">
        <div class="site-container">

            <div class="home-section-top">
                <div>
                    <span class="section-kicker">أقسام مجمع 120</span>
                    <h2 class="section-heading">ثمانية أقسام تمنح الزائر تجربة شاملة ومتكاملة</h2>
                    <p class="section-copy">
                        من العناية والجمال إلى الملابس والإكسسوارات ومستلزمات البيت والأطفال،
                        يقدم مجمع 120 تنوعًا عمليًا يناسب الاحتياج اليومي ويمنح الزائر تصورًا سريعًا
                        عن طبيعة المنتجات المتوفرة داخل كل قسم.
                    </p>
                </div>

                <a href="{{ route('categories.index') }}" class="btn btn-primary">
                    عرض جميع الأقسام
                </a>
            </div>

            @if($categoryGroups->count())
                <div class="slider-stage category-stage" id="categorySlider">
                    @foreach($categoryGroups as $index => $group)
                        <div class="slider-panel category-panel {{ $index === 0 ? 'is-active' : '' }}">
                            @foreach($group as $category)
                                <a
                                    href="{{ route('products.index', ['category' => $category->slug]) }}"
                                    class="premium-category-card"
                                >
                                    <div class="premium-category-media">
                                        <span class="premium-category-badge">
                                            {{ $category->products_count ?? $category->products?->count() ?? 0 }} منتج
                                        </span>

                                        <img
                                            src="{{ $category->image ? asset('storage/' . $category->image) : asset('images/branding/logo.png') }}"
                                            alt="{{ $category->name }}"
                                        >
                                    </div>

                                    <div class="premium-category-body">
                                        <h3 class="premium-category-title">
                                            {{ $category->name }}
                                        </h3>

                                        <p class="premium-category-text">
                                            {{ $categoryMarketing[$category->name] ?? ($category->description ?: 'قسم متنوع داخل مجمع 120 يضم منتجات مختارة بعناية لتلبية احتياجات الزائر بسهولة ووضوح.') }}
                                        </p>

                                        <span class="premium-category-link">استعراض منتجات القسم ←</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            @else
                <div class="card-surface p-12 text-center text-slate-500">
                    لا توجد أقسام مضافة حاليًا.
                </div>
            @endif

        </div>
    </section>

    {{-- ABOUT / FEATURES --}}
    <section class="section bg-slate-50">
        <div class="site-container">
            <div class="home-feature-grid">

                <div class="home-about-card">
                    <span class="section-kicker">عن مجمع 120</span>
                    <h2 class="section-heading">
                        تسوق متنوع تحت سقف واحد وبصورة منظمة وواضحة
                    </h2>

                    <p class="section-copy">
                        يقدّم مجمع 120 مزيجًا متوازنًا من الأقسام التي تخدم احتياجات متعددة داخل مكان واحد،
                        مما يجعل تجربة الزائر أكثر راحة وسرعة في الوصول إلى المنتجات التي يبحث عنها،
                        سواء كانت للجمال، الأزياء، الأطفال أو مستلزمات المنزل.
                    </p>

                    <div class="about-points">
                        <div class="about-point">
                            <i></i>
                            <span>تنوع فعلي في الفئات المعروضة يمنح الزائر خيارات أوسع داخل كل زيارة.</span>
                        </div>

                        <div class="about-point">
                            <i></i>
                            <span>عرض تسويقي واضح يساعد على التعرف بسرعة على طبيعة كل قسم وما يقدمه.</span>
                        </div>

                        <div class="about-point">
                            <i></i>
                            <span>واجهة حديثة مناسبة لتعزيز صورة المجمع وإبراز أقسامه ومنتجاته باحترافية.</span>
                        </div>

                        <div class="about-point">
                            <i></i>
                            <span>تنقل مباشر من الأقسام إلى المنتجات لخلق تجربة تصفح سهلة وسلسة للزائر.</span>
                        </div>
                    </div>

                    <a href="{{ route('about') }}" class="btn btn-primary">
                        تعرّف أكثر على المجمع
                    </a>
                </div>

                <div class="home-feature-cards">
                    <div class="feature-card">
                        <div class="feature-number">01</div>
                        <h3 class="feature-title">تنوع يغطي كل الاحتياجات</h3>
                        <p class="feature-text">
                            ثمانية أقسام مختارة بعناية تشمل التجميل، الأزياء، الأطفال، الإكسسوارات والمنظفات، لتوفير تجربة تسوق متكاملة.
                        </p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-number">02</div>
                        <h3 class="feature-title">منتجات مناسبة للعائلة</h3>
                        <p class="feature-text">
                            يقدم المجمع خيارات تلائم المرأة، الطفل والمنزل، مما يجعله وجهة عملية للتسوق اليومي والاختيار المتنوع.
                        </p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-number">03</div>
                        <h3 class="feature-title">عرض بصري وتسويقي أنيق</h3>
                        <p class="feature-text">
                            تم تصميم الواجهة لتقديم صورة احترافية عن مجمع 120، مع إبراز الأقسام والمنتجات بطريقة واضحة وجذابة.
                        </p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-number">04</div>
                        <h3 class="feature-title">وصول أسرع لكل قسم</h3>
                        <p class="feature-text">
                            يمكن للزائر الانتقال بسهولة من الواجهة الرئيسية إلى الأقسام ثم إلى المنتجات، ما يختصر الوقت ويزيد الوضوح.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        setupAutoSlider('heroSlider', 4500);
        setupAutoSlider('categorySlider', 5500);
    });

    function setupAutoSlider(id, interval = 5000) {
        const root = document.getElementById(id);
        if (!root) return;

        const panels = root.querySelectorAll('.slider-panel');
        if (!panels.length || panels.length === 1) return;

        let current = 0;

        setInterval(() => {
            panels[current].classList.remove('is-active');
            current = (current + 1) % panels.length;
            panels[current].classList.add('is-active');
        }, interval);
    }
</script>
@endpush
