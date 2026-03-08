@extends('layouts.app')

@section('content')
    <section class="max-w-5xl mx-auto px-4 py-14">
        <h1 class="text-3xl font-bold mb-6">حولنا</h1>
        <div class="bg-white border rounded-2xl p-8 leading-8 text-gray-700">
            {{ $settings->about_text ?? 'سيتم إضافة النص التعريفي لاحقًا.' }}
        </div>
    </section>
@endsection
