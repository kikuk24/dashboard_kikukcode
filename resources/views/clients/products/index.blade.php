@extends('clients.layouts.main')

@if (!$query)
@section('title', 'Temukan Produk Digital dan Jasa yang Sesuai dengan Kebutuhan Anda!')
@else
@section('title', 'Hasil dari ' . $query)
@endif

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-4 lg:max-w-6xl mt-[70px]">
        @component('clients.components.carouselProduct')
        @endcomponent
        @if ($products->count() == 0)
        <div class="w-full">
            <p class="text-center text-sm text-gray-500">Produk Tidak ditemukan</p>
        </div>
        @else
        <h1>@if ($query) Hasil dari "{{ $query }}" @endif</h1>
            <div class="grid gap-y-12 gap-x-3 grid-cols-2 gap-10 md:gap-x-4 md:grid-cols-4 lg:gap-x-20 lg:gap-y-24 mt-[20px]">
                @foreach ($products as $product)
                    <div class="overflow-hidden bg-white rounded-lg">
                        <div
                            class="ring-1 ring-foreground/10 grid place-content-center overflow-hidden rounded-[0.60rem] font-mono text-sm text-accent-foreground">
                            <a href="{{ route('product.show', $product->slug) }}">
                                <img src="{{ asset('storage/' . $product->cover) }}" alt="{{ $product->name }}"
                                    class="object-cover aspect-square" width="640px" height="360px">
                            </a>
                        </div>
                        <div class="mt-4 rounded-lg">
                            <div class="line-clamp-2 text-lg font-medium text-foreground">
                                <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                            </div>
                            <div class="mb-4 mt-2 line-clamp-2 text-sm text-muted-foreground ">
                                <span class="line-through">Rp {{ number_format($product->price) }}</span>
                                @if ($product->discount == 0 || $product->discount == null)
                                    <div class="hidden"></div>
                                @else
                                    <span
                                        class="bg-red-600 px-2 py-1 font-semibold text-white rounded-lg">{{ $product->discount }}%</span>
                                @endif
                                <p class=" text-xl font-bold">Rp
                                    {{ number_format($product->price - $product->price * ($product->discount / 100)) }}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <a href="{{ route('product.buy', $product->slug) }}"
                                    class="inline-flex items-center border-transparent rounded-full border transition-colors focus:outline-none bg-blue-500/15 text-blue-700 group-data-[hover]:bg-blue-500/25 dark:text-blue-400 dark:group-data-[hover]:bg-blue-500/25 px-3 py-1 text-xs font-medium">Beli
                                    Sekarang</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
