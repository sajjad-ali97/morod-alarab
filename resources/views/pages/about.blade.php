@extends('layouts.app')

@section('content')

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Title -->
        <div class="text-center mb-14">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                حول شركة مورد العرب
            </h1>

            <p class="text-gray-500 max-w-2xl mx-auto leading-relaxed">
                نبذة تعريفية عن شركة مورد العرب للتجارة والمقاولات العامة
                ورؤيتنا في تقديم منتجات ذات جودة عالية تلبي احتياجات السوق المحلي.
            </p>
        </div>


        <!-- About Content -->
        <div class="grid md:grid-cols-2 gap-12 items-center">

            <!-- Image -->
            <div class="rounded-2xl overflow-hidden shadow-lg">
                <img src="{{ asset('images/company.jpg') }}"
                     class="w-full h-[420px] object-cover"
                     alt="شركة مورد العرب">
            </div>


            <!-- Text -->
            <div class="space-y-5 text-gray-600 leading-relaxed">

                <p>
                    شركة مورد العرب للتجارة والمقاولات العامة محدودة المسؤولية هي شركة عراقية
                    متخصصة في تجارة واستيراد الملابس، تأسست لتلبية احتياجات السوق المحلي
                    بمنتجات ذات جودة عالية وأسعار تنافسية، مع الالتزام بأعلى معايير
                    المصداقية والاحتراف في العمل.
                </p>

                <p>
                    نمتلك خبرة تمتد لأكثر من سنتين في مجال تجارة الملابس،
                    حيث نعمل على استيراد وتوريد مختلف أنواع الملابس بما يتناسب
                    مع متطلبات السوق، مع الحرص على اختيار الموردين الموثوقين
                    والالتزام بالجودة في جميع مراحل العمل.
                </p>

                <p>
                    نسعى في شركة مورد العرب إلى بناء علاقات طويلة الأمد
                    مع عملائنا وشركائنا، قائمة على الثقة والشفافية
                    والالتزام بالمواعيد.
                </p>

                <p>
                    رؤيتنا هي أن نكون من الشركات الرائدة في مجال تجارة الملابس داخل العراق،
                    من خلال تقديم منتجات موثوقة وخدمة متميزة تضيف قيمة حقيقية لعملائنا.
                </p>

            </div>

        </div>

    </div>
</section>


<!-- Company Location -->

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-3">
                موقع الشركة
            </h2>

            <p class="text-gray-500">
                العراق / كربلاء المقدسة – حي رمضان – الشارع الخدمي
            </p>
        </div>


        <div class="rounded-2xl overflow-hidden shadow-lg">
<iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d199.65959328950012!2d44.01141595679775!3d32.61030544113621!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1559695ef385b54d%3A0xea2e53e5d257900f!2z2KfZhNis2YXYudmK2KnYjCDZg9ix2KjZhNin2KHYjCDZg9ix2KjZhNin2KEg2YXYrdin2YHYuNip2IwgNTYwMDE!5e1!3m2!1sar!2siq!4v1773343346321!5m2!1sar!2siq"
                class="w-full h-[420px]"
                style="border:0;"
                allowfullscreen=""
                loading="lazy">
            </iframe>

        </div>

    </div>
</section>



<!-- Mall Section -->

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-10">

            <h2 class="text-3xl font-bold text-gray-800 mb-3">
                مجمع 120
            </h2>

            <p class="text-gray-500 max-w-2xl mx-auto">
                مجمع 120 هو مركز البيع المباشر التابع لشركة مورد العرب،
                حيث يوفر تشكيلة واسعة من المنتجات والملابس بأسعار مناسبة
                تلبي احتياجات السوق المحلي.
            </p>

        </div>


        <div class="rounded-2xl overflow-hidden shadow-lg">

             <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d798.6197472675609!2d44.03906073040686!3d32.61239399835831!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15596b2b34bd8acf%3A0xe6cdd84bf073e446!2sPopular%20markets!5e1!3m2!1sar!2siq!4v1773343140861!5m2!1sar!2siq"
        class="w-full h-[420px]"
        style="border:0;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>

        </div>

    </div>
</section>

@endsection
