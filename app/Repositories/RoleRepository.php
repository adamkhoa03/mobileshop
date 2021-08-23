<?php

namespace App\Repositories;

use Adamkhoa03\EloquentRepository\EloquentRepository;
use App\Models\Role;

/**
 * RoleRepository interact with roles table
 *
 * @package App\Repositories
 */
class RoleRepository extends EloquentRepository
{
    protected $entity = Role::class;
}
