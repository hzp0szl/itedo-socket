<?php
namespace Facades;

use Illuminate\Support\Facades\Facade;

class IteSocket extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @method static bindUserId(int $userId);
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'iteSocket';
    }
}