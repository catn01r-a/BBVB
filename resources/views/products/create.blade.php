@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-6">
    <h1 class="text-2xl font-bold mb-6">Add New Product</h1>

    <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label>Title</label>
            <input type="text" name="title" class="w-full border p-2" required>
        </div>

        <div>
            <label>Description</label>
            <textarea name="description" class="w-full border p-2"></textarea>
        </div>

        <div>
            <label>Price ($)</label>
            <input type="number" name="price" class="w-full border p-2" step="0.01" required>
        </div>

        <div>
            <label>Quantity</label>
            <input type="number" name="quantity" class="w-full border p-2" required>
        </div>

        <div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
        </div>
    </form>
</div>
@endsection
