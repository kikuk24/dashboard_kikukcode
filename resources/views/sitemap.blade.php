<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc>{{ route('home') }}</loc>
    <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
    <changefreq>weekly</changefreq>
    <priority>1.0</priority>
  </url>
  @foreach ($posts as $post)
  <url>
    <loc>{{ route('post.show', $post->slug) }}</loc>
    <lastmod>{{ $post->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
  </url>
  @endforeach

  @foreach ($tutorials as $tutorial)
  <url>
    <loc>{{ route('tutorial.show', $tutorial->slug) }}</loc>
    <lastmod>{{ $tutorial->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
  </url>
  @endforeach

</urlset>