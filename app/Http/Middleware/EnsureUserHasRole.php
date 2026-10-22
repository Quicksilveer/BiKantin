<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Only let users whose `role` column matches one of the given roles through.
 *
 * Usage in routes: ->middleware('role:admin') or ->middleware('role:admin,siswa').
 */
class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        if ($user === null || ! in_array($user->role, $roles, true)) {
            abort(Response::HTTP_FORBIDDEN, 'Kamu tidak punya akses ke halaman ini.');
        }

        return $next($request);
    }
}
