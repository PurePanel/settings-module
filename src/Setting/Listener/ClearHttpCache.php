<?php namespace Anomaly\SettingsModule\Setting\Listener;

use Anomaly\SettingsModule\Setting\SettingsWereSaved;
use Anomaly\Streams\Platform\Http\Command\ClearHttpCache as ClearCache;

/**
 * Class ClearHttpCache
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ClearHttpCache
{

    /**
     * Handle the event.
     *
     * @param SettingsWereSaved $event
     */
    public function handle(SettingsWereSaved $event)
    {
        $builder = $event->getBuilder();

        if ($builder->getFormValue('http_cache')) {
            return;
        }

        dispatch_sync(new ClearCache());
    }
}
