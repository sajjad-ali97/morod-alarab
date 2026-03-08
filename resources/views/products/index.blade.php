@extends('layouts.app')

@section('content')
    <section class="max-w-7xl mx-auto px-4 py-14">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <h1 class="text-3xl font-bold">المنتجات</h1>

            <form method="GET" action="{{ route('products.index') }}">
                <select name="category" onchange="this.form.submit()" class="border rounded-xl px-4 py-3 min-w-[240px]">
                    <option value="all" {{ ($selectedCategory === 'all' || !$selectedCategory) ? 'selected' : '' }}>الكل</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->slug }}" {{ $selectedCategory === $category->slug ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($products as $product)
                <div class="rounded-2xl overflow-hidden border bg-white hover:shadow-lg transition">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/600x400' }}" alt="{{ $product->name }}" class="w-full h-56 object-cover">
                    <div class="p-5">
                        <span class="inline-block text-xs bg-gray-100 rounded-full px-3 py-1 mb-3">
                            {{ $product->category->name }}
                        </span>
                        <h2 class="text-xl font-bold">{{ $product->name }}</h2>
                        <p class="text-gray-600 text-sm mt-2">{{ $product->description }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-full rounded-2xl border p-10 text-center text-gray-500">
                    لا توجد منتجات ضمن هذا القسم
                </div>
            @endforelse
        </div>
    </section>
@endsection
