<?php

namespace Nhattay\Laravel404page\Middleware;

use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class Check404Page
{
    /**
     * @param Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next)
    {
        /**
         * @var \Illuminate\Http\Response $response
         */
        $response = $next($request);
        if ($response->getStatusCode() === 404) {
            $exception = $response->exception;
            if ($exception instanceof ModelNotFoundException) {
                $view = Config::get(join('.', ['404page.models', $exception->getModel(), 'view']));
                if (View::exists($view)) {
                    return Response::view(
                        $view,
                        Config::get(join('.', ['404page.models', $exception->getModel(), 'variables']), [])
                    );
                }
            }
        }

        return $response;
    }
}
