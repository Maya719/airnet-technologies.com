@extends('layouts.app')
@section('content')
    <section class="max-w-7xl mx-auto px-4 py-12 mt-24">
        <div class="grid lg:grid-cols-2 gap-10 items-start">
            <div class="w-full rounded-lg overflow-hidden shadow-lg">
                <img src="{{ asset('storage/' . $service->thumbnail) }}" alt="{{ $service->name }}"
                    class="w-full h-auto object-cover">
            </div>

            <div class="flex flex-col gap-6">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800">{{ $service->name }}</h1>

                <p class="text-gray-700 text-lg leading-relaxed">{!! $service->description !!}</p>

                <div class="grid gap-4">
                    <input type="text" placeholder="Your Name" name="customer_name" id="customer_name"
                        class="border rounded-lg px-4 py-3 w-full">
                    <input type="email" placeholder="Your Email" name="customer_email" id="customer_email"
                        class="border rounded-lg px-4 py-3 w-full">
                    <input type="text" placeholder="Mobile Number" name="customer_mobile" id="customer_mobile"
                        class="border rounded-lg px-4 py-3 w-full">
                </div>

                <div class="flex items-center gap-3 font-semibold text-gray-700">
                    Quantity:
                    <input type="number" id="quantity" value="1" min="1"
                        class="w-20 px-3 py-2 border rounded-lg text-gray-700">
                </div>

                @if($service->category && $service->category->features->count())
                    <div class="flex flex-col gap-2">
                        <span class="font-semibold text-gray-700">Extra Features:</span>
                        @foreach($service->category->features as $feature)
                            <label class="inline-flex items-center gap-2">
                                <input type="checkbox" class="extra-feature" data-price="{{ $feature->price ?? 0 }}"
                                    data-name="{{ $feature->name }}">
                                {{ $feature->name }} (USD {{ number_format($feature->price ?? 0, 2) }})
                            </label>
                        @endforeach
                    </div>
                @endif

                <div class="text-2xl font-bold text-primary">
                    Total: <span id="total-price">{{ number_format($service->price, 2) }}</span> USD
                </div>

                <div class="flex flex-col sm:flex-row gap-4 mt-4">
                    <form action="{{ route('payment.stripe') }}" method="POST" class="flex flex-col gap-2 w-full sm:w-auto">
                        @csrf
                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                        <input type="hidden" name="quantity" id="stripe-quantity" value="1">
                        <input type="hidden" name="extras" id="stripe-extras" value="">
                        <input type="hidden" name="total_price" id="stripe-total" value="{{ $service->price }}">
                        <input type="hidden" name="customer_name" id="stripe-name">
                        <input type="hidden" name="customer_email" id="stripe-email">
                        <input type="hidden" name="customer_mobile" id="stripe-mobile">
                        <button type="submit"
                            class="px-6 py-3 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition shadow-md hover:shadow-lg">
                            Pay with Stripe
                        </button>
                    </form>

                    <form action="{{ route('payment.myfatoorah') }}" method="POST"
                        class="flex flex-col gap-2 w-full sm:w-auto">
                        @csrf
                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                        <input type="hidden" name="quantity" id="myfatoorah-quantity" value="1">
                        <input type="hidden" name="extras" id="myfatoorah-extras" value="">
                        <input type="hidden" name="total_price" id="myfatoorah-total" value="{{ $service->price }}">
                        <input type="hidden" name="customer_name" id="myf-name">
                        <input type="hidden" name="customer_email" id="myf-email">
                        <input type="hidden" name="customer_mobile" id="myf-mobile">
                        <button type="submit"
                            class="px-6 py-3 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700 transition shadow-md hover:shadow-lg">
                            Pay with MyFatoorah
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const basePrice = parseFloat({{ $service->price }});
            const quantityInput = document.getElementById('quantity');
            const extrasCheckboxes = document.querySelectorAll('.extra-feature');
            const totalPriceEl = document.getElementById('total-price');

            const stripeQuantity = document.getElementById('stripe-quantity');
            const stripeExtras = document.getElementById('stripe-extras');
            const stripeTotal = document.getElementById('stripe-total');
            const stripeName = document.getElementById('stripe-name');
            const stripeEmail = document.getElementById('stripe-email');
            const stripeMobile = document.getElementById('stripe-mobile');

            const myfQuantity = document.getElementById('myfatoorah-quantity');
            const myfExtras = document.getElementById('myfatoorah-extras');
            const myfTotal = document.getElementById('myfatoorah-total');
            const myfName = document.getElementById('myf-name');
            const myfEmail = document.getElementById('myf-email');
            const myfMobile = document.getElementById('myf-mobile');

            const customerName = document.getElementById('customer_name');
            const customerEmail = document.getElementById('customer_email');
            const customerMobile = document.getElementById('customer_mobile');

            function calculateTotal() {
                let quantity = parseInt(quantityInput.value) || 1;
                let extras = [];
                let extrasTotal = 0;

                extrasCheckboxes.forEach(cb => {
                    if (cb.checked) {
                        extras.push(cb.dataset.name);
                        extrasTotal += parseFloat(cb.dataset.price);
                    }
                });

                let total = (basePrice + extrasTotal) * quantity;
                totalPriceEl.textContent = total.toLocaleString();

                stripeQuantity.value = myfQuantity.value = quantity;
                stripeExtras.value = myfExtras.value = extras.join(', ');
                stripeTotal.value = myfTotal.value = total;

                stripeName.value = myfName.value = customerName.value;
                stripeEmail.value = myfEmail.value = customerEmail.value;
                stripeMobile.value = myfMobile.value = customerMobile.value;
            }

            quantityInput.addEventListener('input', calculateTotal);
            customerName.addEventListener('input', calculateTotal);
            customerEmail.addEventListener('input', calculateTotal);
            customerMobile.addEventListener('input', calculateTotal);
            extrasCheckboxes.forEach(cb => cb.addEventListener('change', calculateTotal));

            calculateTotal();
        });
    </script>
@endsection