@extends('clients.layouts.main')
@section('title', $tutorial->title)
@section('description', $tutorial->description)
@section('image', asset('storage/'.$tutorial->image))
@section('url', 'https://kikukcode.com/tutorial'.$tutorial->slug)
@section('content')
<main class="max-w-7xl mx-auto md:mt-[50px] mt-[30px]">
  <section class="p-8 md:h-[300px] h-[200px] flex flex-col md:justify-center ">
    <p class="text-gray-500">{{$tutorial->created_at->diffForHumans()}}</p>
    <h1 class="md:text-3xl text-2xl font-bold md:font-extrabold font-poppins lg:pr-[300px]">{{$tutorial->title}}</h1>
    <p class="text-gray-500 hidden md:block  lg:pr-[300px] mt-5">
      {{$tutorial->description}}
    </p>
    <div class="mt-5 flex gap-5 justify-between md:pr-[600px]">
      <a href="{{route('topic.show', $tutorial->topics->slug)}}"
        class="inline-flex items-center border-transparent rounded-full border transition-colors focus:outline-none bg-blue-500/15 text-blue-700 group-data-[hover]:bg-blue-500/25 dark:text-blue-400 dark:group-data-[hover]:bg-blue-500/25 px-2 py-0.5 text-xs font-medium">{{$tutorial->topics->name}}</a>
      <div class="">
        <div class="w-full flex justify-between gap-5"><a
            href="https://www.facebook.com/sharer/sharer.php?u=https://kikukcode.com/artikel/{{$tutorial->slug}}"
            target="_blank" rel="noopener noreferrer"><svg stroke="currentColor" fill="currentColor" stroke-width="0"
              viewBox="0 0 320 512" class="text-[#4267B2]" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
              </path>
            </svg></a><a href="https://twitter.com/intent/tweet?url=https://kikukcode.com/artikel/{{$tutorial->slug}}"
            target="_blank" rel="noopener noreferrer"><svg stroke="currentColor" fill="currentColor" stroke-width="0"
              viewBox="0 0 512 512" class="text-[#1DA1F2]" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
              </path>
            </svg></a><a href="https://wa.me/?text=https://kikukcode.com/artikel/{{$tutorial->slug}}" target="_blank"
            rel="noopener noreferrer"><svg stroke="currentColor" fill="currentColor" stroke-width="0"
              viewBox="0 0 448 512" class="text-[#25D366]" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z">
              </path>
            </svg></a>
        </div>
      </div>
    </div>
  </section>
  <section class="p-8 md:mt-[0px] mt-[30px]  flex flex-col md:flex-row lg:flex-row gap-5">
    <article class="w-full max-w-3xl shrink-0 lg:w-2/3 md:w-2/3">
      <figure class="my-5">
        <img src="{{asset('storage/'.$tutorial->image)}}" alt="{{$tutorial->title}}"
          class="object-cover aspect-video rounded-md">
      </figure>
      <div class="body">
        {!! $tutorial->body !!}
      </div>
      <div class="secret">
        <p>{{$tutorial->description}}</p>
      </div>
    </article>
    <aside class="lg:block hidden pb-6 lg:pb-12 md:w-1/3 w-1/2 self-start sticky top-28 space-y-8">
      <div class="bg-white rounded-lg p-5">
        <h3 class="text-xl font-poppins text-gray-700">Tutorial Terkait</h3>
        <div class="mt-5">
          @foreach ($related as $r )
          <a href="{{ route('tutorial.show', $r->slug) }}" class="flex items-center p-2 hover:bg-gray-100 rounded-md">
            <img src="{{asset('storage/'.$r->image)}}" alt="{{$r->title}}" class="w-10 h-10 object-cover rounded-full">
            <div class="ml-4">
              <p class="text-gray-500">{{$r->created_at->format('d M Y')}}</p>
              <p class="text-sm">{{$r->title}}</p>
            </div>
          </a>
          @endforeach
        </div>
      </div>
    </aside>

    <aside class="lg:hidden">
      <div class="mb-4">
        <div class="space-y-8">
          @foreach ($related as $r )
          <a href="{{ route('tutorial.show', $r->slug) }}" class="flex items-center p-2 hover:bg-gray-100 rounded-md">
            <img src="{{asset('storage/'.$r->image)}}" alt="{{$r->title}}" class="w-10 h-10 object-cover rounded-full">
            <div class="ml-4">
              <p class="text-gray-500">{{$r->created_at->diffForHumans()}}</p>
              <p class="text-sm">{{$r->title}}</p>
            </div>
          </a>
          @endforeach
        </div>
      </div>
    </aside>
  </section>
</main>
@endsection