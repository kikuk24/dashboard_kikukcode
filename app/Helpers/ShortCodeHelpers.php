<?php

namespace App\Helpers;

use App\Models\Posts;
use Illuminate\Support\Str;

class ShortCodeHelpers
{
  public static function parseShortCode($content)
  {
    $shortcodes = [
      'baca_juga' => function ($atribut) {
        $randomArtikel = Posts::inRandomOrder()->first();
        if ($randomArtikel) {
          return '<a href="' . route('post.show', $randomArtikel->slug) . '">Baca Juga : ' . $randomArtikel->title . '</a>';
        } else {
          return '<div class="baca-juga">No related articles found.</div>';
        }
      },
      'toc' => function ($attributes) use (&$content) {
        preg_match_all('/<h([1-6])[^>]*>(.*?)<\/h\1>/', $content, $matches, PREG_SET_ORDER);

        if (empty($matches)) {
          return '';
        }

        $toc = '<div class="toc">';
        $toc .= '<h2 class="toc-title">Table of Contents</h2>';
        $toc .= '<ul>';
        foreach ($matches as $match) {
          $level = $match[1];
          $title = strip_tags($match[2]);
          $anchor = Str::slug($title, '-');
          $toc .= '<li class="toc-level-' . $level . '"><a href="#' . $anchor . '">' . $title . '</a></li>';
        }
        $toc .= '</ul></div>';

        // Tambahkan ID ke heading
        $content = preg_replace_callback('/<h([1-6])[^>]*>(.*?)<\/h\1>/', function ($match) {
          $title = strip_tags($match[2]);
          $anchor = Str::slug($title, '-');
          return '<h' . $match[1] . ' id="' . $anchor . '">' . $match[2] . '</h' . $match[1] . '>';
        }, $content);


        return $toc;
      },

    ];
    foreach ($shortcodes as $shortcode => $callback) {
      $pattern = '/\[' . $shortcode . '(.*?)\]/';
      $content = preg_replace_callback($pattern, function ($matches) use ($callback) {
        // Parsing attributes if any
        $attributes = [];
        if (!empty($matches[1])) {
          preg_match_all('/(\w+)="(.*?)"/', $matches[1], $attrMatches);
          foreach ($attrMatches[1] as $key => $value) {
            $attributes[$value] = $attrMatches[2][$key];
          }
        }
        return call_user_func($callback, $attributes);
      }, $content);
    }

    return $content;
  }
}
