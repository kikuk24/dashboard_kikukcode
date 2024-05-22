<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head class="scroll-smooth">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <meta name="description" content=@yield('description')>
  <meta name="author" content="kikuk code">
  <meta name="robots" content="index, follow">
  <meta name="googlebot" content="index, follow">
  <meta property="og:title" content=@yield('title')>
  <meta property="og:description" content=@yield('description')>
  <meta property="og:image" content=@yield('image')>
  <meta property="og:url" content="@yield('url')">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1477599127787462"
  crossorigin="anonymous"></script>
<link rel="canonical" href="@yield('url')">
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
  <link rel="stylesheet" href="{{asset('storage/css/app.css')}}">
  <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
  @component('clients.components.navbar')

  @endcomponent
  @yield('content')

  @component('clients.components.footer')

  @endcomponent
  <script src="{{asset('storage/js/app.js')}}"></script>
</body>

</html>