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
    final public function getListUser(): object
    {
        return $this->repo->getListUsersOrderByDesc();
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
}
