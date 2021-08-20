<?php

namespace App\Services\Impls;

use App\Repositories\RoleRepository;
use App\Services\Contracts\RoleService;

/**
 * Handle logic for role
 *
 * @package App\Services\Impls
 */
class RoleServiceImpl implements RoleService
{
    private RoleRepository $repo;

    /**
     * RoleServiceImpl constructor.
     *
     * @param  \App\Repositories\RoleRepository  $repo
     */
    public function __construct(RoleRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Handle get list roles from DB
     *
     * @return object
     */
    final public function getListRoles(): object
    {
        return $this->repo->all();
    }
}
