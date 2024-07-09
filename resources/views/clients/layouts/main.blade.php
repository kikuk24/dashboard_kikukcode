<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head class="scroll-smooth">
    {{-- <script src="https://alwingulla.com/88/tag.min.js" data-zone="68548" async data-cfasync="false"></script> --}}
    <!-- Google tag (gtag.js) -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-TCG6MP9C4P"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-TCG6MP9C4P');
</script> --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="author" content="kikuk code">
    <meta name="copyright" content="kikuk code">
    <meta property="og:site_name" content="kikuk code">
    <meta property="og:type" content="website">
    <meta name="robots" content="index, follow">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@kikukcode">
    <meta name="twitter:creator" content="@kikukcode">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:image" content="@yield('image')">
    <meta name="twitter:url" content="@yield('url')">
    <meta name="googlebot" content="index, follow">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="@yield('image')">
    <meta property="og:url" content="@yield('url')">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1477599127787462"
        crossorigin="anonymous"></script>
    <link rel="canonical" href="@yield('url')">
    @php
        $path = Request::path(); // Ambil path dari URL saat ini
    @endphp
    @if (Str::startsWith($path, 'shop/products'))
        <script type="application/id+json">
    {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "url": "https:/www.kikukcode.com/",
    "name": "kikuk code",
    "potentialAction": {
      "@type": "SearchAction",
      "target": "https://www.kikukcode.com/shop/products/search?produk={search_term_string}",
      "query-input": "required name=search_term_string"
    }
  }
</script>

    @else
        <script type="application/id+json">
    {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "url": "https:/www.kikukcode.com/",
    "name": "kikuk code",
    "potentialAction": {
      "@type": "SearchAction",
      "target": "https://www.kikukcode.com?s={search_term_string}",
      "query-input": "required name=search_term_string"
    }
  }
</script>
    @endif

    <link rel="stylesheet" href="{{ asset('storage/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('storage/img/favicon.ico') }}" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Tag Manager --}}
    {{-- <script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5X7RNZ42');
</script> --}}
    {{-- End Google Tag Manager --}}
</head>

<body>
    {{-- Google Tag Manager (noscript) --}}
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5X7RNZ42" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    {{-- End Google Tag Manager (noscript) --}}
    @if (Str::startsWith($path, 'shop/products'))
        @component('clients.components.navbarShop')
        @endcomponent
    @else
        @component('clients.components.navbar')
        @endcomponent
    @endif
    @yield('content')

    @component('clients.components.footer')
    @endcomponent
    <script src="{{ asset('storage/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js"></script>
</body>

</html>
