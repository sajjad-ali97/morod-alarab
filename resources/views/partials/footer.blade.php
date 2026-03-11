<footer class="site-footer">
    <div class="site-container">
        <div class="site-footer-inner">
            <div class="footer-grid">

                <div>
                    <div class="footer-brand">
                        @if(!empty($settings?->site_logo))
                            <img
                                src="{{ asset('storage/' . $settings->site_logo) }}"
                                alt="مورد العرب"
                                class="footer-brand-logo"
                            >
                        @else
                            <img
                                src="{{ asset('images/branding/logo.svg') }}"
                                alt="مورد العرب"
                                class="footer-brand-logo"
                            >
                        @endif

                        <div>
                            <div class="footer-brand-name">شركة مورد العرب</div>
                            <div class="footer-brand-sub">MAWRID AL-ARAB CO.</div>
                        </div>
                    </div>

                    <p class="footer-text">
                        للتجارة والمقاولات العامة محدودة المسؤولية، ونوفر حلولاً ومنتجات متنوعة
                        بجودة عالية تلبي احتياجات السوق المحلي بكفاءة واحترافية.
                    </p>
                </div>

                <div>
                    <h3 class="footer-heading">روابط سريعة</h3>
                    <div class="footer-links">
                        <a href="{{ route('home') }}" class="footer-link">الرئيسية</a>
                        <a href="{{ route('categories.index') }}" class="footer-link">الأقسام</a>
                        <a href="{{ route('products.index') }}" class="footer-link">المنتجات</a>
                        <a href="{{ route('about') }}" class="footer-link">حول</a>
                        <a href="{{ route('contact') }}" class="footer-link">تواصل معنا</a>
                    </div>
                </div>

                <div>
                    <h3 class="footer-heading">معلومات التواصل</h3>
                    <div class="footer-contact">
                        <div><strong>الشركة:</strong> شركة مورد العرب</div>
                        <div><strong>النشاط:</strong> للتجارة والمقاولات العامة</div>
                        <div><strong>البريد:</strong> info@mawridalarab.com</div>
                        <div><strong>الهاتف:</strong> +964 000 000 0000</div>
                    </div>
                </div>

            </div>

            <div class="footer-bottom">
                <span>© {{ now()->year }} شركة مورد العرب. جميع الحقوق محفوظة.</span>
                <span>تصميم وتطوير الموقع باحترافية عالية</span>
            </div>
        </div>
    </div>
</footer>
