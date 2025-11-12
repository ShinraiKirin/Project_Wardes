@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@push('styles')
<style>
    .quantity-input {
        width: 50px;
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 0.25rem;
    }
    .quantity-btn {
        width: 30px;
        height: 30px;
        border: 1px solid #ddd;
        background-color: #f8f9fa;
        cursor: pointer;
    }
    .summary-card {
        position: sticky;
        top: 100px; /* Adjust based on your navbar height */
    }
</style>
@endpush

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Keranjang Belanja Anda</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Kolom Item Keranjang --}}
        <div class="lg:col-span-2">
            @if(session('cart') && count(session('cart')) > 0)
                <div id="cart-items-container" class="space-y-4">
                    @foreach(session('cart') as $id => $details)
                    <div id="cart-item-{{ $id }}" class="flex items-center bg-white p-4 rounded-lg shadow-sm">
                        <img src="{{ asset('images/' . ($details['image'] ?? 'default.jpg')) }}" alt="{{ $details['name'] }}" class="w-24 h-24 object-cover rounded-md">
                        <div class="ml-4 flex-grow">
                            <h2 class="font-semibold text-lg">{{ $details['name'] }}</h2>
                            <p class="text-gray-600">Rp{{ number_format($details['price'], 0, ',', '.') }}</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <button class="quantity-btn quantity-decrease" data-id="{{ $id }}">-</button>
                            <input type="number" value="{{ $details['quantity'] }}" min="1" class="quantity-input" data-id="{{ $id }}">
                            <button class="quantity-btn quantity-increase" data-id="{{ $id }}">+</button>
                        </div>
                        <div class="ml-6 text-right">
                            <p class="font-semibold">Subtotal</p>
                            <p id="subtotal-{{ $id }}" class="text-gray-800">Rp{{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</p>
                        </div>
                        <div class="ml-6">
                            <button class="remove-item-btn text-red-500 hover:text-red-700" data-id="{{ $id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div id="empty-cart-message" class="bg-white p-8 rounded-lg shadow-sm text-center">
                    <h2 class="text-2xl font-semibold mb-2">Keranjang Anda Kosong</h2>
                    <p class="text-gray-600 mb-4">Sepertinya Anda belum menambahkan item apapun.</p>
                    <a href="{{ route('menu.index') }}" class="inline-block px-6 py-3 bg-yellow-500 text-white font-semibold rounded-md hover:bg-yellow-600">
                        Kembali ke Menu
                    </a>
                </div>
            @endif
        </div>

        {{-- Kolom Ringkasan Pesanan --}}
        <div class="lg:col-span-1">
            <div class="summary-card bg-white p-6 rounded-lg shadow-sm">
                <h2 class="text-xl font-bold mb-4 border-b pb-3">Ringkasan Pesanan</h2>
                @php
                    $total = 0;
                    if (session('cart')) {
                        foreach(session('cart') as $details) {
                            $total += $details['price'] * $details['quantity'];
                        }
                    }
                @endphp
                <div class="flex justify-between mb-2">
                    <span class="text-gray-600">Subtotal</span>
                    <span id="summary-subtotal" class="font-semibold">Rp{{ number_format($total, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between mb-4">
                    <span class="text-gray-600">Biaya Pengiriman</span>
                    <span class="font-semibold">Gratis</span>
                </div>
                <div class="border-t pt-4 flex justify-between items-center">
                    <span class="text-lg font-bold">Total</span>
                    <span id="summary-total" class="text-lg font-bold">Rp{{ number_format($total, 0, ',', '.') }}</span>
                </div>
                <button class="w-full mt-6 py-3 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 transition-colors" {{ !session('cart') || count(session('cart')) == 0 ? 'disabled' : '' }}>
                    Lanjutkan ke Checkout
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || document.querySelector('input[name="_token"]')?.value;
    const cartCountElement = document.getElementById('cart-count');
    const cartItemsContainer = document.getElementById('cart-items-container');
    const summarySubtotal = document.getElementById('summary-subtotal');
    const summaryTotal = document.getElementById('summary-total');

    function updateCart(id, quantity) {
        fetch(`/cart/update/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
            },
            body: JSON.stringify({ quantity: quantity })
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Cart updated successfully') {
                document.getElementById(`subtotal-${id}`).textContent = data.subtotal;
                summarySubtotal.textContent = data.total;
                summaryTotal.textContent = data.total;
                cartCountElement.textContent = data.cartCount;
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function removeItem(id) {
        fetch(`/cart/remove/${id}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Item removed successfully') {
                document.getElementById(`cart-item-${id}`).remove();
                summarySubtotal.textContent = data.total;
                summaryTotal.textContent = data.total;
                cartCountElement.textContent = data.cartCount;

                if (data.cartCount === 0) {
                    // Handle empty cart view
                    cartItemsContainer.innerHTML = `
                        <div id="empty-cart-message" class="bg-white p-8 rounded-lg shadow-sm text-center">
                            <h2 class="text-2xl font-semibold mb-2">Keranjang Anda Kosong</h2>
                            <p class="text-gray-600 mb-4">Sepertinya Anda belum menambahkan item apapun.</p>
                            <a href="{{ route('menu.index') }}" class="inline-block px-6 py-3 bg-yellow-500 text-white font-semibold rounded-md hover:bg-yellow-600">
                                Kembali ke Menu
                            </a>
                        </div>`;
                    document.querySelector('.summary-card button').disabled = true;
                }
            }
        })
        .catch(error => console.error('Error:', error));
    }

    cartItemsContainer?.addEventListener('click', function(e) {
        const target = e.target;
        const id = target.dataset.id;

        if (target.classList.contains('quantity-increase')) {
            const input = document.querySelector(`.quantity-input[data-id="${id}"]`);
            input.value = parseInt(input.value) + 1;
            updateCart(id, input.value);
        }

        if (target.classList.contains('quantity-decrease')) {
            const input = document.querySelector(`.quantity-input[data-id="${id}"]`);
            if (input.value > 1) {
                input.value = parseInt(input.value) - 1;
                updateCart(id, input.value);
            }
        }

        if (target.classList.contains('remove-item-btn') || target.closest('.remove-item-btn')) {
            const button = target.closest('.remove-item-btn');
            const removeId = button.dataset.id;
            if (confirm('Anda yakin ingin menghapus item ini?')) {
                removeItem(removeId);
            }
        }
    });

    cartItemsContainer?.addEventListener('change', function(e) {
        if (e.target.classList.contains('quantity-input')) {
            const id = e.target.dataset.id;
            const quantity = parseInt(e.target.value);
            if (quantity >= 1) {
                updateCart(id, quantity);
            } else {
                e.target.value = 1; // Reset to 1 if invalid value
                updateCart(id, 1);
            }
        }
    });
});
</script>
@endpush