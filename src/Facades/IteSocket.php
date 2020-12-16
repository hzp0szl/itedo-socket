<?php
namespace Itedo\Socket\Facades;

use Illuminate\Support\Facades\Facade;
use Itedo\Socket\Service\IteSocketService;

class IteSocket extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @method static IteSocketService bindUserId(int $userId);
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'iteSocket';
    }
}