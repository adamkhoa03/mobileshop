<?php

namespace App\Repositories;

use App\Models\Role;
use Orkhanahmadov\EloquentRepository\EloquentRepository;

class RoleRepository extends EloquentRepository
{
    protected $entity = Role::class;
}
