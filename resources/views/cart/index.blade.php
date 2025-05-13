@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6">
    <h1 class="text-2xl font-bold mb-6">Your Cart</h1>

    @if (session('success'))
        <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (count($cart) > 0)
        <table class="min-w-full bg-white shadow rounded">
            <thead>
                <tr>
                    <th class="py-2 px-4">Product</th>
                    <th class="py-2 px-4">Quantity</th>
                    <th class="py-2 px-4">Price</th>
                    <th class="py-2 px-4">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                    <tr class="border-t">
                        <td class="py-2 px-4">{{ $item['title'] }}</td>
                        <td class="py-2 px-4">{{ $item['quantity'] }}</td>
                        <td class="py-2 px-4">${{ number_format($item['price'], 2) }}</td>
                        <td class="py-2 px-4">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
						<td class="py-2 px-4">
						<form action="{{ route('cart.remove', $loop->index) }}" method="POST" class="inline">
						@csrf
						<button class="text-red-600" onclick="return confirm('Remove this item?')">Remove</button>
						</form>
						</td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            <form action="{{ route('cart.checkout') }}" method="POST" class="inline">
			@csrf
				<button class="bg-blue-500 text-white px-6 py-2 rounded">
					Proceed to Checkout
				</button>
			</form>

        </div>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection
