<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfEmailNotConfirmed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if (!$user->confirmed && !$user->isAdmin()) {
            $message = 'You must first confirm your email address.';
            if ($request->expectsJson()) {
                return response($message, 401);
            }

            return redirect('/threads')
                ->with('flash', $message);
        }

        return $next($request);
    }
}
