<?php namespace Anomaly\Streams\Addon\Module\Settings;

use Anomaly\Streams\Platform\Addon\Module\ModuleAddon;

class SettingsModule extends ModuleAddon
{
    public function newServiceProvider()
    {
        return new SettingsModuleServiceProvider($this->app);
    }
}
