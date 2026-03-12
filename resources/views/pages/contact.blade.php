@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-b from-slate-50 via-white to-slate-50 py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="text-center mb-10 md:mb-14">
            <span class="inline-flex items-center rounded-full border border-cyan-200 bg-cyan-50 px-4 py-1.5 text-sm font-semibold text-cyan-700">
                تواصل مباشر مع الشركة
            </span>

            <h1 class="mt-4 text-3xl md:text-5xl font-extrabold tracking-tight text-slate-900">
                تواصل معنا
            </h1>

            <p class="mt-4 max-w-2xl mx-auto text-sm sm:text-base md:text-lg leading-8 text-slate-600">
                يسعدنا استقبال استفساراتكم وملاحظاتكم والتواصل معكم في أي وقت.
                يمكنكم مراسلتنا مباشرة عبر النموذج أو من خلال معلومات التواصل أدناه.
            </p>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 lg:gap-8">

            {{-- Contact Info --}}
            <div class="xl:col-span-5">
                <div class="h-full rounded-3xl border border-slate-200 bg-white shadow-sm overflow-hidden">
                    <div class="bg-gradient-to-l from-cyan-500 to-indigo-700 px-6 sm:px-8 py-8 text-white">
                        <h2 class="text-2xl md:text-3xl font-bold">معلومات التواصل</h2>
                        <p class="mt-3 text-sm md:text-base text-white/90 leading-7">
                            نحن هنا لخدمتكم والإجابة عن جميع استفساراتكم المتعلقة بمنتجات شركة مورد العرب ومجمع 120.
                        </p>
                    </div>

                    <div class="p-6 sm:p-8 space-y-5">

                        {{-- Phone --}}
                        <div class="flex items-start gap-4 rounded-2xl border border-slate-200 bg-slate-50 p-4 transition hover:border-cyan-300 hover:bg-cyan-50/50">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-cyan-100 text-cyan-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a1.5 1.5 0 001.5-1.5v-1.372c0-.516-.351-.965-.852-1.089l-4.423-1.106a1.125 1.125 0 00-1.173.417l-.97 1.293a1.125 1.125 0 01-1.21.38 12.035 12.035 0 01-7.143-7.143 1.125 1.125 0 01.38-1.21l1.293-.97a1.125 1.125 0 00.417-1.173L6.211 3.102A1.125 1.125 0 005.122 2.25H3.75a1.5 1.5 0 00-1.5 1.5V6.75z" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-sm font-semibold text-slate-500">الهاتف</p>
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings->phone) }}"
                                   class="mt-1 inline-block text-base sm:text-lg font-bold text-slate-800 hover:text-cyan-700 break-words">
                                    {{ $settings->phone }}
                                </a>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="flex items-start gap-4 rounded-2xl border border-slate-200 bg-slate-50 p-4 transition hover:border-cyan-300 hover:bg-cyan-50/50">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-cyan-100 text-cyan-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 7.5v9A2.25 2.25 0 0119.5 18.75h-15A2.25 2.25 0 012.25 16.5v-9m19.5 0A2.25 2.25 0 0019.5 5.25h-15A2.25 2.25 0 002.25 7.5m19.5 0v.243a2.25 2.25 0 01-1.07 1.92l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 9.663a2.25 2.25 0 01-1.07-1.92V7.5" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-sm font-semibold text-slate-500">البريد الإلكتروني</p>
                                <a href="mailto:{{ $settings->email }}"
                                   class="mt-1 inline-block text-base sm:text-lg font-bold text-slate-800 hover:text-cyan-700 break-all">
                                    {{ $settings->email }}
                                </a>
                            </div>
                        </div>

                        {{-- WhatsApp --}}
                        <div class="flex items-start gap-4 rounded-2xl border border-slate-200 bg-slate-50 p-4 transition hover:border-green-300 hover:bg-green-50/50">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-green-100 text-green-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.198.297-.768.966-.941 1.164-.173.198-.347.223-.644.075-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.133-.132.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.372-.025-.52-.075-.149-.669-1.611-.916-2.206-.242-.579-.487-.5-.669-.51l-.57-.01c-.198 0-.52.075-.792.372-.273.297-1.04 1.016-1.04 2.479s1.065 2.875 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.262.489 1.693.626.711.227 1.358.195 1.87.118.571-.085 1.758-.719 2.007-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                                    <path d="M20.52 3.449A11.815 11.815 0 0012.067 0C5.495 0 .148 5.347.148 11.918c0 2.1.549 4.151 1.592 5.958L0 24l6.305-1.654a11.87 11.87 0 005.762 1.469h.005c6.57 0 11.918-5.347 11.918-11.918a11.82 11.82 0 00-3.47-8.448zm-8.453 18.35h-.004a9.86 9.86 0 01-5.026-1.378l-.361-.214-3.741.981 1-3.648-.235-.374a9.861 9.861 0 01-1.515-5.248c.002-5.438 4.429-9.864 9.888-9.864 2.637.001 5.116 1.028 6.982 2.893a9.825 9.825 0 012.893 6.987c-.003 5.439-4.43 9.865-9.881 9.865z"/>
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-sm font-semibold text-slate-500">واتساب</p>
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings->whatsapp) }}"
                                   target="_blank"
                                   class="mt-1 inline-block text-base sm:text-lg font-bold text-slate-800 hover:text-green-700 break-words">
                                    {{ $settings->whatsapp }}
                                </a>
                            </div>
                        </div>

                        {{-- Address --}}
                        <div class="flex items-start gap-4 rounded-2xl border border-slate-200 bg-slate-50 p-4 transition hover:border-cyan-300 hover:bg-cyan-50/50">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-cyan-100 text-cyan-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-sm font-semibold text-slate-500">العنوان</p>
                                <a href="https://maps.google.com/?q={{ urlencode($settings->address) }}"
                                   target="_blank"
                                   class="mt-1 inline-block text-base sm:text-lg font-bold text-slate-800 hover:text-cyan-700 leading-8">
                                    {{ $settings->address }}
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Form --}}
            <div class="xl:col-span-7">
                <div class="rounded-3xl border border-slate-200 bg-white shadow-sm p-6 sm:p-8 md:p-10">
                    <div class="mb-6">
                        <h2 class="text-2xl md:text-3xl font-bold text-slate-900">أرسل رسالة</h2>
                        <p class="mt-2 text-slate-600 leading-7">
                            املأ النموذج التالي وسنقوم بالرد عليكم في أقرب وقت ممكن.
                        </p>
                    </div>

                    @if(session('success'))
                        <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-4 py-4 text-green-700">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-4 text-red-700">
                            <div class="font-semibold mb-2">يرجى مراجعة الحقول التالية:</div>
                            <ul class="space-y-1 text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">الاسم</label>
                                <input
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    placeholder="أدخل الاسم الكامل"
                                    class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-3.5 text-slate-800 outline-none transition focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100"
                                    required
                                >
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">رقم الهاتف</label>
                                <input
                                    type="text"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    placeholder="أدخل رقم الهاتف"
                                    class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-3.5 text-slate-800 outline-none transition focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100"
                                >
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">البريد الإلكتروني</label>
                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="name@example.com"
                                    class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-3.5 text-slate-800 outline-none transition focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100"
                                >
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700">الموضوع</label>
                                <input
                                    type="text"
                                    name="subject"
                                    value="{{ old('subject') }}"
                                    placeholder="عنوان الرسالة"
                                    class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-3.5 text-slate-800 outline-none transition focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100"
                                >
                            </div>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">نص الرسالة</label>
                            <textarea
                                name="message"
                                rows="7"
                                placeholder="اكتب رسالتك هنا..."
                                class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-3.5 text-slate-800 outline-none transition focus:border-cyan-500 focus:ring-4 focus:ring-cyan-100 resize-none"
                                required
                            >{{ old('message') }}</textarea>
                        </div>

                        <div class="pt-2">
                            <button
                                type="submit"
                                class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-l from-cyan-500 to-indigo-700 px-8 py-3.5 text-sm md:text-base font-bold text-white shadow-md transition hover:scale-[1.02] hover:shadow-lg"
                            >
                                إرسال الرسالة
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
