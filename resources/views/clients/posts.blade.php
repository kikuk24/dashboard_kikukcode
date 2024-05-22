@extends('clients.layouts.main')
@section('title', 'Artikel')
@section('url','/artikel')
@section('content')
<section class="max-w-7xl mx-auto mt-[100px]">
  <div class="xl:max-w-7xl lg:px-8 mx-auto px-4 sm:px-6 md:px-4 lg:max-w-6xl">
    <div class="flex flex-col">
      <div class="flex-1 max-w-xl">
        <h1 class="text-2xl font-bold tracking-tighter text-foreground sm:text-3xl lg:text-5xl">Semua Kategori</h1>
      </div>
      <div class="mt-4 lg:mt-6">
        <div class="sm:hidden block"><button
            class="relative isolate [&amp;_svg]:shrink-0 inline-flex items-center justify-center gap-x-2 rounded-lg border font-medium px-[calc(theme(spacing[3.5])-1px)] py-[calc(theme(spacing[2.5])-1px)] sm:px-[calc(theme(spacing.4)-1px)] sm:py-[calc(theme(spacing[2])-1px)] text-sm/6 focus:outline-none data-[focus]:outline data-[focus]:outline-2 data-[focus]:outline-offset-2 data-[focus]:outline-brand-500 data-[disabled]:opacity-50 [&amp;>[data-slot=icon]]:-mx-0.5 [&amp;>[data-slot=icon]]:my-0.5 [&amp;>[data-slot=icon]]:shrink-0 [&amp;>[data-slot=icon]]:text-[--btn-icon] [&amp;>[data-slot=icon]]:sm:my-1 [&amp;>[data-slot=icon]]:size-4 forced-colors:[--btn-icon:ButtonText] forced-colors:data-[hover]:[--btn-icon:ButtonText] border-zinc-950/10 data-[active]:bg-zinc-950/[2.5%] data-[hover]:bg-zinc-950/[2.5%] :border-white/15 :data-[active]:bg-white/5 :data-[hover]:bg-white/5 text-zinc-950 [--btn-bg:white] [--btn-border:theme(colors.zinc.950/10%)] [--btn-hover-overlay:theme(colors.zinc.950/2.5%)] data-[active]:[--btn-border:theme(colors.zinc.950/15%)] data-[hover]:[--btn-border:theme(colors.zinc.950/15%)] :text-white :[--btn-hover-overlay:theme(colors.white/5%)] :[--btn-bg:theme(colors.zinc.700)] [--btn-icon:theme(colors.zinc.500)] data-[active]:[--btn-icon:theme(colors.zinc.700)] data-[hover]:[--btn-icon:theme(colors.zinc.700)] :[--btn-icon:theme(colors.zinc.500)] :data-[active]:[--btn-icon:theme(colors.zinc.400)] :data-[hover]:[--btn-icon:theme(colors.zinc.400)] h-10"
            aria-haspopup="dialog" aria-expanded="false" role="button" aria-controls="radix-:ro:"
            data-state="closed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
              viewBox="0 0 24 24" class="w-4 -ml-1 h-4 text-muted-foreground mr-2">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M11.75 16.75h8.5m-8.5-9.5h8.5m-12.5 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0m0 9.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0">
              </path>
            </svg><span>Filter</span></button></div>
        <div class="hidden sm:flex max-w-2xl overflow-x-auto hide-scroll items-center gap-x-6">
          <a class="block whitespace-nowrap pt-2 tracking-tight pb-1.5 border-b-2 gap-x-2 border-transparent text-muted-foreground"
            href="/artikel">All</a>
          @foreach ($categories as $c )
          <a class="block whitespace-nowrap pt-2 tracking-tight pb-1.5 border-b-2 gap-x-2 border-transparent text-muted-foreground"
            href="{{ route('category.show', $c->slug)}}">{{ $c->name }}</a>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</section>
<section class="max-w-7xl mx-auto mt-[50px] px-4">
  <div class="max-w-7xl mx-auto">
    <div class="grid gap-y-12 sm:grid-cols-2 sm:gap-10 md:gap-x-4 md:grid-cols-3 lg:gap-x-20 lg:gap-y-24">
      @foreach ($posts as $post)
      <div class="overflow-hidden bg-white rounded-lg">
        <div
          class="ring-1 ring-foreground/10 grid place-content-center overflow-hidden rounded-[0.60rem] font-mono text-sm text-accent-foreground">
          <a href="{{ route('post.show', $post->slug)}}">
<img src="{{asset('storage/'.$post->image)}}" alt="{{$post->title}}" class="object-cover aspect-video" width="100%"
              height="100%">
          </a>
        </div>
        <div class="mt-4 rounded-lg">
          <div class="line-clamp-1 text-lg font-medium text-foreground">
            <a href="{{ route('post.show', $post->slug)}}">{{ $post->title }}</a>
          </div>
          <div class="mb-4 mt-2 line-clamp-2 text-sm text-muted-foreground">
            {{ $post->description }}
          </div>
          <div class="flex items-center justify-between">
            <a href="{{route('category.show', $post->category->slug)}}"
              class="inline-flex items-center border-transparent rounded-full border transition-colors focus:outline-none bg-blue-500/15 text-blue-700 group-data-[hover]:bg-blue-500/25 dark:text-blue-400 dark:group-data-[hover]:bg-blue-500/25 px-2 py-0.5 text-xs font-medium">{{
              $post->category->name }}</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection