<?php

namespace App\Repositories;

use Adamkhoa03\EloquentRepository\EloquentRepository;
use App\Constants\App;
use App\Models\User;

/**
 * UserRepository interact with users table
 *
 * @package App\Repositories
 */
class UserRepository extends EloquentRepository
{
    protected $entity = User::class;

    /**
     * Handle get desc list users from database
     *
     * @return object
     */
    final public function getActiveUsersOrderByDesc(): object
    {
        return $this->model->where('status', 1)
            ->orderBy('id', 'desc')
            ->paginate(App::DEFAULT_PAGINATE);
    }

    /**
     * Get list deactivate users and order by desc from DB
     *
     * @return object
     */
    final public function getDeactivatedUsersOrderByDesc(): object
    {
        return $this->model->where('status', 0)
            ->orderBy('id', 'desc')
            ->paginate(App::DEFAULT_PAGINATE);
    }
}
