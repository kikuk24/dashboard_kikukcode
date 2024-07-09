@extends('clients.layouts.main')

@section('title', 'Detail Produk')

@section('content')
    <section class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center space-x-2 text-gray-400 text-sm">
                <a href="{{ route('home') }}" class="hover:underline hover:text-gray-600">Home</a>
                <span>
                    <svg class="h-5 w-5 leading-none text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
                <a href="{{ route('products.client') }}" class="hover:underline hover:text-gray-600">Produk</a>
                <span>
                    <svg class="h-5 w-5 leading-none text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
                <span>{{ $product->brand->name }}</span>
            </div>
        </div>
        <!-- ./ Breadcrumbs -->

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
            <div class="flex flex-col md:flex-row -mx-4">
                <div class="md:flex-1 px-4">
                    <div x-data="{ image: 1 }" x-cloak>
                        <div class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4">
                            <div x-show="image === 1"
                                class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                                <img src="{{ asset('storage/' . $product->cover) }}" alt="{{ $product->name }}"
                                    class="h-full w-full object-cover rounded-lg">
                            </div>

                            @for ($i = 1; $i <= 3; $i++)
                                @if ($product["image_$i"])
                                    <div x-show="image === {{ $i + 1 }}"
                                        class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                                        <img src="{{ asset('storage/' . $product["image_$i"]) }}"
                                            alt="{{ $product->name }}" class="h-full w-full object-cover rounded-lg">
                                    </div>
                                @endif
                            @endfor
                        </div>

                        <div class="flex -mx-2 mb-4">
                            @for ($i = 0; $i <= 3; $i++)
                                @if ($product["image_$i"])
                                    <div class="flex-1 px-2">
                                        <button x-on:click="image = {{ $i + 1 }}"
                                            :class="{ 'ring-2 ring-indigo-300 ring-inset': image === {{ $i + 1 }} }"
                                            class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                                            <img src="{{ asset('storage/' . $product["image_$i"]) }}"
                                                alt="{{ $product->name }}" class="h-full w-full object-cover rounded-lg">
                                        </button>
                                    </div>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="md:flex-1 px-4">
                    <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">
                        {{ $product->name }}</h2>
                    <p class="text-gray-500 text-sm">By <a href="#" class="text-indigo-600 hover:underline">Kikuk
                            Code</a></p>

                    <div class="flex items-center space-x-4 my-4">
                        <div>
                            <div class="rounded-lg bg-gray-100 flex py-2 px-3">
                                <span class="text-indigo-400 mr-1 mt-1">Rp</span>
                                <span
                                    class="font-bold text-indigo-600 text-3xl">{{ number_format($product->price - $product->price * ($product->discount / 100)) }}</span>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="text-green-500 text-xl font-semibold">Hemat {{ $product->discount }}%</p>
                            <p class="text-gray-400 text-sm line-through">Rp {{ number_format($product->price) }}</p>
                        </div>
                    </div>

                    <div class="body">
                        {!! $product->description !!}
                    </div>
                    <div class="flex py-4 space-x-4">
                        <a href="{{ route('product.buy', $product->slug) }}"
                            class="h-14 px-6 py-2 font-semibold rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white">
                            Beli Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
