@extends('clients.layouts.main')
@section('title', 'Halaman Tidak Ditemukan')
@section('content')
{{-- <section class="max-w-7xl mx-auto mt-[100px]">
  <div class="xl:max-w-7xl lg:px-8 mx-auto px-4 sm:px-6 md:px-4 lg:max-w-6xl">
    <div class="flex flex-col">
      <div class="flex-1 max-w-xl">
        <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Halaman Tidak Ditemukan</h1>
        <p class="mt-6 text-base text-gray-500">Halaman yang anda cari tidak ditemukan.</p>
      </div>
    </div>
  </div>
</section> --}}
<div class="w-full flex items-center justify-center">
  <div class="max-w-7xl mx-auto px-5 py-5">
    <div class="text-center">
      <h1 class="mb-4 text-6xl font-semibold text-main-color">404</h1>
      <p class="mb-4 text-lg text-gray-600">Oops! Looks like you're lost.</p>
      <div class="animate-bounce"><svg class="mx-auto h-16 w-16 text-main-color" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8">
          </path>
        </svg></div>
      <p class="mt-4 text-gray-600">Let's get you back <a class="text-main-color" href="/">here</a>.</p>
    </div>
  </div>
</div>
@endsection