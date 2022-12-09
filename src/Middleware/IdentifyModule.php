<?php

namespace Cwfan\Modules\Middleware;

use Cwfan\Modules\RepositoryManager;
use Closure;

class IdentifyModule
{
    /**
     * @var Cwfan\Modules
     */
    protected $module;

    /**
     * Create a new IdentifyModule instance.
     *
     * @param Cwfan\Modules $module
     */
    public function __construct(RepositoryManager $module)
    {
        $this->module = $module;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $slug = null)
    {
        $request->session()->flash('module', $this->module->where('slug', $slug));

        return $next($request);
    }
}
