<?php

namespace App\Repositories;

use App\Constants\App;
use App\Models\User;
use Orkhanahmadov\EloquentRepository\EloquentRepository;

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
