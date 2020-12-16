<?php

namespace Itedo\Socket\Service;

use Illuminate\Contracts\Container\Container;

class IteSocketService
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @var $userId
     */
    private $userId;

    /**
     * @var $adminId
     */
    private $adminId;

    /**
     * IteSocketService constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Cilent listener id
     *
     * @param int $userId
     * @return IteSocketService
     */
    public function bindUser(int $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * Service listener id
     *
     * @param int $adminId
     * @return IteSocketService
     */
    public function bindAdminId(int $adminId):self
    {
        $this->adminId = $adminId;
        return $this;
    }

    public function connection()
    {

    }
}
