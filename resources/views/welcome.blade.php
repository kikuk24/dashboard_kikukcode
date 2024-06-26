<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<!-- Google tag (gtag.js) -->
{{-- <script src="https://alwingulla.com/88/tag.min.js" data-zone="68548" async data-cfasync="false"></script> --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TCG6MP9C4P"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-TCG6MP9C4P');
</script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Eksplorasi Belajar Coding Bersama | Kikuk Code</title>
    <meta name="description" content="Eksplorasi Belajar Coding Bersama | Kikuk Code">
    <meta name="author" content="kikuk code">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Eksplorasi Belajar Coding Bersama | Kikuk Code">
<meta property="og:description" content="Berbagi informasi dan pengetahuan seputar peradaban teknologi">
    <meta property="og:image" content="https://www.kikukcode.com/storage/img/og.png">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="kikuk code">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@kikukcode">
    <meta name="twitter:creator" content="@kikukcode">
    <meta name="twitter:title" content="Eksplorasi Belajar Coding Bersama | Kikuk Code">
<meta name="twitter:description" content="Berbagi informasi dan pengetahuan seputar peradaban teknologi">
<meta name="twitter:image" content="https://www.kikukcode.com/storage/img/og.png">
<meta property="og:url" content="https://www.kikukcode.com/">
    <meta name="copyright" content="kikuk code">
    <meta name="googlebot" content="index, follow">
<link rel="canonical" href="https://www.kikukcode.com/">
<link rel="shortcut icon" href="{{asset('storage/img/favicon.ico')}}" type="image/x-icon">
    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5X7RNZ42');
</script>
    <!-- End Google Tag Manager -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1477599127787462"
        crossorigin="anonymous"></script>
    <script type="application/id+json">
        {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "url": "https://kikukcode.com",
    "name": "kikuk code",
    "potentialAction": {
      "@type": "SearchAction",
      "target": "https://kikukcode.com?s={search_term_string}",
      "query-input": "required name=search_term_string"
    }
  }
</script>
<!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Google Tag Manager --}}
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5X7RNZ42');
</script>
    {{-- End Google Tag Manager --}}
    </head>

<body class="antialiased">
{{-- Google Tag Manager (noscript) --}}
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5X7RNZ42" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    {{-- End Google Tag Manager (noscript) --}}
    @component('clients.components.navbar')
    @endcomponent
    <section class="w-full py-10">
        <div
            class="max-w-7xl lg:mx-auto flex lg:flex-row md:flex-row flex-col md:items-center md:justify-center items-center justify-start">
            <canvas class="background h-[100vh]" id="canvas"
                style="position: absolute; display: block; top: 0px; left: 0px; z-index: -1"></canvas>
            <div class="md:w-1/2 md:p-10 p-4 h-[500px]">
                <h1 class="md:text-[3rem] text-[2rem] font-bold text-main-color">Selamat Datang di Kikuk Code</h1>
                <p class="text-2xl font-medium">Tempat sharing ilmu dan pengetahuan tentang teknologi</p>
            </div>
        </div>
    </section>
    <section class="max-w-7xl mx-auto px-4 md:mt-[150px] mt-[200px]">
        <div class="my-6">
            <h2 class="text-lg font-semibold leading-6 tracking-tight">Artikel Terbaru</h2>
            <p class="text-sm text-muted-foreground">Artikel terbaru yang kami rekomendasikan</p>
        </div>
        <div class="max-w-7xl mx-auto">
            <div class="grid gap-y-12 sm:grid-cols-2 sm:gap-10 md:gap-x-4 md:grid-cols-3 lg:gap-x-20 lg:gap-y-24">
                @foreach ($posts as $post)
                <div class="overflow-hidden bg-white rounded-lg">
                    <div
                        class="ring-1 ring-foreground/10 grid place-content-center overflow-hidden rounded-[0.60rem] font-mono text-sm text-accent-foreground">
                        <a href="{{ route('post.show', $post->slug)}}">
<img src="{{asset('storage/'.$post->image)}}" alt="{{$post->title}}" width="640px" height="360px"
                                class="object-cover aspect-video" loading="lazy">
                            </a>
                            </div>
                            <div class="mt-4 rounded-lg">
                                <div class="line-clamp-1 text-lg font-medium text-foreground">
                                    <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                                </div>
                                <div class="mb-4 mt-2 line-clamp-2 text-sm text-muted-foreground">
                                    {{ $post->description }}
                                </div>
                                <div class="flex items-center justify-between">
                                    <a href="{{ route('post.show', $post->slug) }}"
                                        class="inline-flex items-center border-transparent rounded-full border transition-colors focus:outline-none bg-blue-500/15 text-blue-700 group-data-[hover]:bg-blue-500/25 dark:text-blue-400 dark:group-data-[hover]:bg-blue-500/25 px-2 py-0.5 text-xs font-medium">{{
                                        $post->category->name }}</a>
                                </div>
                            </div>
                            </div>
                            @endforeach
                            </div>
                            </div>
                            <a href="{{route('client.posts')}}" class="text-center block text-lg mt-4 font-bold hover:text-accent">
Lihat Semua <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="inline"
                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z">
                </path>
            </svg>
            </a>
            </div>
            </section>
            <section class="max-w-7xl mx-auto px-4 md:mt-[150px] mt-[200px]">
                <div class="my-6">
                    <h2 class="text-lg font-semibold leading-6 tracking-tight">Tutorial Terbaru</h2>
                    <p class="text-sm text-muted-foreground">Tutorial terbaru yang kami terbitkan</p>
                </div>
                <div class="max-w-7xl mx-auto">
                    <div class="grid gap-y-12 sm:grid-cols-2 sm:gap-10 md:gap-x-4 md:grid-cols-3 lg:gap-x-20 lg:gap-y-24">
                        @foreach ($tutorial as $t)
                        <div class="overflow-hidden bg-white rounded-lg">
                            <div
                                class="ring-1 ring-foreground/10 grid place-content-center overflow-hidden rounded-[0.60rem] font-mono text-sm text-accent-foreground">
                                <a href="/">
<img src="{{asset('storage/'.$t->image)}} " alt="{{$t->title}}" loading="lazy" class="object-cover aspect-video"
                                width="640px" height="360px">
                            </a>
                            </div>
                            <div class="mt-4 rounded-lg">
                                <div class="line-clamp-1 text-lg font-medium text-foreground">
                                    <a href="{{ route('tutorial.show', $t->slug)}}">{{ $t->title }}</a>
                                </div>
                                <div class="mb-4 mt-2 line-clamp-2 text-sm text-muted-foreground">{{ $t->description }}
                        </div>
<div class="flex items-center justify-between">
                            <a href="{{ route('tutorial.show', $t->slug) }}"
                                class="inline-flex items-center border-transparent rounded-full border transition-colors focus:outline-none bg-blue-500/15 text-blue-700 group-data-[hover]:bg-blue-500/25 dark:text-blue-400 dark:group-data-[hover]:bg-blue-500/25 px-2 py-0.5 text-xs font-medium">{{
                                $t->topics->name }}</a>
</div>
                        </div>
                        </div>
                        @endforeach
                        </div>
                        </div>
                        <a href="{{route('tutorial')}}" class="text-center block text-lg mt-4 font-bold hover:text-accent">
Lihat Semua <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="inline"
                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z">
                </path>
            </svg>
            </a>
        </div>
</section>
    @component('clients.components.footer')

@endcomponent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.3/particles.min.js"
        integrity="sha512-jq8sZI0I9Og0nnZ+CfJRnUzNSDKxr/5Bvha5bn7AHzTnRyxUfpUArMzfH++mwE/hb2efOo1gCAgI+1RMzf8F7g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        window.onload = function() {
                            Particles.init({
                                // normal options
                                selector: '.background',
                                maxParticles: 100,
                                color: '#27005D',
                                connectParticles: true,
                                // advanced options
                                speed: 2,
                                gravity: 1,
                                shape: 'circle',
                
                                // options for breakpoints
                                responsive: [{
                                    breakpoint: 768,
                                    options: {
                                        maxParticles: 80,
                                        color: '#48F2E3',
                                        connectParticles: true
                                    }
                                }, {
                                    breakpoint: 425,
                                    options: {
                                        maxParticles: 70,
                                        connectParticles: true
                                    }
                                }, {
                                    breakpoint: 320,
                                    options: {
                                        maxParticles: 20,
                                        connectParticles: true
                                        // disables particles.js
                                    }
                                }]
                            });
                        }
                        const button = document.querySelector('#menu-button');
                        const menu = document.querySelector('#menu');
                
                        button.addEventListener('click', () => {
                            menu.classList.toggle('hidden');
                        });
</script>
</body>

</html>