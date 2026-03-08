@extends('layouts.app')

@section('content')
    <section class="max-w-7xl mx-auto px-4 py-14">
        <h1 class="text-3xl font-bold mb-8">أقسام المجمع</h1>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($categories as $category)
                <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="rounded-2xl overflow-hidden border bg-white hover:shadow-lg transition">
                    <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://via.placeholder.com/600x400' }}" alt="{{ $category->name }}" class="w-full h-56 object-cover">
                    <div class="p-5">
                        <h2 class="text-xl font-bold">{{ $category->name }}</h2>
                        <p class="text-gray-600 text-sm mt-2">{{ $category->description }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
