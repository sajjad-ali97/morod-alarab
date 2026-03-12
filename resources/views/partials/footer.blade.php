<footer class="site-footer">
    <div class="site-container">
        <div class="site-footer-inner">

            <div class="footer-grid">

                {{-- معلومات الشركة --}}
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


                {{-- روابط سريعة --}}
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


                {{-- معلومات التواصل --}}
                <div>

                    <h3 class="footer-heading">معلومات التواصل</h3>

                    <div class="footer-contact">

                        <div>
                            شركة مورد العرب
                        </div>

                        <div>
                           للتجارة والمقاولات العامة
                        </div>

                        <div>
                            <a href="mailto:mawridalarab@yahoo.com" class="email-link">
                                ✉️ mawridalarab@yahoo.com
                            </a>
                        </div>

                        <div>
                            <a href="tel:+9647716662409" class="ltr-number">
                                📞 +964 771 666 2409
                            </a>
                        </div>

                        <div>
                            <a href="https://wa.me/9647716662409" target="_blank" class="ltr-number">
                                💬 تواصل عبر واتساب
                            </a>
                        </div>

                    </div>

                </div>

            </div>


            {{-- footer bottom --}}
            <div class="footer-bottom">

                <span>
                    © {{ now()->year }} شركة مورد العرب. جميع الحقوق محفوظة.
                </span>

                <span>
                    تصميم وتطوير الموقع : سجاد الحيدري
                    <a href="tel:+9647732250410" class="ltr-number">
                        📞 +964 773 225 0410
                    </a>
                </span>

            </div>

        </div>
    </div>
</footer>
