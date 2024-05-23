<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckBadWords
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $badWords = config('badwords');
        $inputs = $request->all();
        foreach ($badWords as $badWord) {
            foreach ($inputs as $input) {
                if (is_string($input) && stripos($input, $badWord) !== false) {
                    return redirect()->back()->withInput($request->all())->with('error', 'Anda menggunakan kata yang tidak diizinkan');
                }
            }
        }
        return $next($request);
    }
}
