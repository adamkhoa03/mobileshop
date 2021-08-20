<?php

namespace App\Services\Contracts;

/**
 * RoleService, process logic for roles
 *
 * @package App\Services\Contracts
 */
interface RoleService
{
    /**
     * Get list roles
     *
     * @return object
     */
    public function getListRoles(): object;
}
