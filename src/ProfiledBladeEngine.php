<?php

namespace Moonsea\DevTools;

use Illuminate\View\Engines\CompilerEngine;

class ProfiledBladeEngine extends CompilerEngine
{
    public function get($path, array $data = []): string
    {
        return app(SqlQueryProfiler::class)->measure('blade', fn (): string => parent::get($path, $data));
    }
}
