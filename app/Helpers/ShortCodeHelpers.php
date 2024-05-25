<?php

namespace App\Helpers;

use App\Models\Posts;

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
      // untuk short code lainnya
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
