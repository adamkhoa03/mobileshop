<?php

namespace App\Services\Impls;

use App\Http\Requests\StoreUserRequest;
use App\Repositories\UserRepository;
use App\Services\Contracts\UserService;
use Illuminate\Http\RedirectResponse;

/**
 * UserServiceImpl, handle logic for users flow
 *
 * @package App\Services\Impls
 */
class UserServiceImpl implements UserService
{
    private UserRepository $repo;

    /**
     * UserServiceImpl constructor.
     *
     * @param  \App\Repositories\UserRepository  $repo
     */
    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Handle get list users from users table
     *
     * @return object
     */
    final public function getListActiveUser(): object
    {
        return $this->repo->getActiveUsersOrderByDesc();
    }

    /**
     * Handle get list deactivated users
     *
     * @return object
     */
    final public function getListDeactivatedUser(): object
    {
       return $this->repo->getDeactivatedUsersOrderByDesc();
    }

    /**
     * Handle logic for create account user
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @param  string|null                          $image
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    final public function create(StoreUserRequest $request, ?string $image): RedirectResponse
    {
        $users = array_merge($request->all(),
            [
                'avatar' => $image,
                'password' => bcrypt($request->input('password'))
            ]
        );

        $this->repo->create($users);
        return redirect()->back();
    }

    /**
     * Handle logic for get user info by id
     *
     * @param  int  $user_id
     *
     * @return object
     */
    final public function getUserInfoById(int $user_id): object
    {
        return $this->repo->find($user_id);
    }

    /**
     * Update user info from request by id
     *
     * @param  int     $user_id
     * @param  object  $request
     */
    final public function updateUserInfoById(int $user_id, object $request): void
    {
        $data = $request->all();
        $this->repo->findAndUpdate($user_id, $data);
    }
}
