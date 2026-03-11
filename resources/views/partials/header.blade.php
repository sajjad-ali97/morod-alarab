<header class="site-header">
    <div class="site-container">
        <div class="site-header-inner">

            <a href="{{ route('home') }}" class="brand-wrap" aria-label="العودة إلى الرئيسية">
                @if(!empty($settings?->site_logo))
                    <img
                        src="{{ asset('storage/' . $settings->site_logo) }}"
                        alt="شركة مورد العرب"
                        class="brand-logo"
                    >
                @else
                    <img
                        src="{{ asset('images/branding/logo.svg') }}"
                        alt="شركة مورد العرب"
                        class="brand-logo"
                    >
                @endif

                <div class="brand-text">
                    <h1 class="brand-title-inline">
                        <span class="brand-title-ar">شركة مورد العرب</span>
                        <span class="brand-title-en">MAWRED-ALARAB CO</span>
                    </h1>

                    <p class="brand-subtitle-inline">
                        للتجارة والمقاولات العامة محدودة المسؤولية
                    </p>
                </div>
            </a>

            <button class="menu-toggle" type="button" aria-label="فتح القائمة" onclick="document.body.classList.toggle('menu-open')">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <nav class="nav-menu" aria-label="القائمة الرئيسية">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'is-active' : '' }}">
                    الرئيسية
                </a>

                <a href="{{ route('categories.index') }}" class="nav-link {{ request()->routeIs('categories.*') ? 'is-active' : '' }}">
                    الأقسام
                </a>

                <a href="{{ route('products.index') }}" class="nav-link {{ request()->routeIs('products.*') ? 'is-active' : '' }}">
                    المنتجات
                </a>

                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'is-active' : '' }}">
                    حول
                </a>

                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'is-active' : '' }}">
                    تواصل معنا
                </a>
            </nav>

            <div class="header-actions">
                <a href="{{ route('products.index') }}" class="btn btn-primary header-cta">
                    استعراض المنتجات
                </a>
            </div>

        </div>
    </div>
</header>
