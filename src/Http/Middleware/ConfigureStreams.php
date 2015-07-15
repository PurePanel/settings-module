<?php namespace Anomaly\SettingsModule\Http\Middleware;

use Anomaly\SettingsModule\Http\Middleware\Command\SetAccess;
use Anomaly\SettingsModule\Http\Middleware\Command\SetDatetime;
use Anomaly\SettingsModule\Http\Middleware\Command\SetLocales;
use Anomaly\SettingsModule\Http\Middleware\Command\SetTheme;
use Closure;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class ConfigureStreams
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SettingsModule\Http\Middleware
 */
class ConfigureStreams
{

    use DispatchesCommands;

    /**
     * Configure streams with setting values.
     *
     * @param Request  $request
     * @param callable $next
     * @return Response
     */
    public function handle(Request $request, Closure $next)
    {
        $this->dispatch(new SetTheme());
        $this->dispatch(new SetAccess());
        $this->dispatch(new SetLocales());
        $this->dispatch(new SetDatetime());

        return $next($request);
    }
}
