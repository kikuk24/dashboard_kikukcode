@extends('clients.layouts.main')
@section('title', 'Produk')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-4 lg:max-w-6xl">
@if ($products->count() == 0)
  <div class="w-full">
    <p class="text-center text-sm text-gray-500">Produk tidak ditemukan</p>
  </div>
  @else
  <div class="grid gap-y-12 sm:grid-cols-2 sm:gap-10 md:gap-x-4 md:grid-cols-3 lg:gap-x-20 lg:gap-y-24">
    @foreach ($products as $product)
    <div class="overflow-hidden bg-white rounded-lg">
      <div
        class="ring-1 ring-foreground/10 grid place-content-center overflow-hidden rounded-[0.60rem] font-mono text-sm text-accent-foreground">
        <a href="{{ route('product.show', $product->slug)}}">
          <img src="{{$product->cover}}" alt="{{$product->name}}" class="object-cover aspect-video" width="640px"
            height="360px">
        </a>
      </div>
      <div class="mt-4 rounded-lg">
        <div class="line-clamp-1 text-lg font-medium text-foreground">
          <a href="{{ route('product.show', $product->slug)}}">{{ $product->name }}</a>
        </div>
        <div class="mb-4 mt-2 line-clamp-2 text-sm text-muted-foreground ">
          <p class="line-through">{{ $product->original_price }}</p><span class=" text-xl font-bold">Rp {{
            $product->discount_price }}</span>
        </div>
        <div class="flex items-center justify-between">
          <a href="{{route('product.buy', $product->slug)}}"
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