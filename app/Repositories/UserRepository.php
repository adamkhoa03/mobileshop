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
    final public function getListUsersOrderByDesc(): object
    {
        return $this->model
            ->orderBy('id', 'desc')
            ->paginate(App::DEFAULT_PAGINATE);
    }
}
