<?php

namespace App\Services\Contracts;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\RedirectResponse;

/**
 * UserService, process logic for user
 *
 * @package App\Services\Contracts
 */
interface UserService
{
    /**
     * Get list users from users table
     *
     * @return object
     */
    public function getListUser(): object;

    /**
     * Handle users creation
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @param  string|null                          $image
     *
     * @return RedirectResponse
     */
    public function create(StoreUserRequest $request, ?string $image): RedirectResponse;

    /**
     * Get user information by id
     *
     * @param  int  $user_id
     *
     * @return object
     */
    public function getUserInfoById(int $user_id): object;
}
