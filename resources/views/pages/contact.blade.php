@extends('layouts.app')

@section('content')
    <section class="max-w-7xl mx-auto px-4 py-14">
        <h1 class="text-3xl font-bold mb-8">تواصل معنا</h1>

        <div class="grid lg:grid-cols-2 gap-8">
            <div class="bg-white border rounded-2xl p-6">
                <h2 class="text-xl font-bold mb-4">معلومات التواصل</h2>
                <div class="space-y-3 text-gray-700">
                    <p><strong>الهاتف:</strong> {{ $settings->phone }}</p>
                    <p><strong>البريد:</strong> {{ $settings->email }}</p>
                    <p><strong>واتساب:</strong> {{ $settings->whatsapp }}</p>
                    <p><strong>العنوان:</strong> {{ $settings->address }}</p>
                </div>
            </div>

            <div class="bg-white border rounded-2xl p-6">
                <h2 class="text-xl font-bold mb-4">أرسل رسالة</h2>

                @if(session('success'))
                    <div class="mb-4 rounded-xl bg-green-100 text-green-700 px-4 py-3">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" class="space-y-4">
                    @csrf

                    <input type="text" name="name" placeholder="الاسم" class="w-full border rounded-xl px-4 py-3" required>
                    <input type="text" name="phone" placeholder="رقم الهاتف" class="w-full border rounded-xl px-4 py-3">
                    <input type="email" name="email" placeholder="البريد الإلكتروني" class="w-full border rounded-xl px-4 py-3">
                    <input type="text" name="subject" placeholder="الموضوع" class="w-full border rounded-xl px-4 py-3">
                    <textarea name="message" rows="6" placeholder="نص الرسالة" class="w-full border rounded-xl px-4 py-3" required></textarea>

                    <button class="bg-black text-white rounded-xl px-6 py-3">
                        إرسال
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
