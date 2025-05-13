@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6">
    <h1 class="text-3xl font-bold mb-6">Marketplace Products</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products as $product)
            <div class="bg-white p-4 rounded shadow flex flex-col">
                <h2 class="text-xl font-semibold mb-2">{{ $product->title }}</h2>
                <p class="text-gray-600 mb-2">{{ $product->description }}</p>
                <p class="text-gray-800 font-bold mb-2">${{ $product->price }}</p>
                <p class="text-sm text-gray-500 mb-4">Available: {{ $product->quantity }}</p>

                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-auto">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded w-full">
                        Add to Cart
                    </button>
                </form>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>
</div>
@endsection
