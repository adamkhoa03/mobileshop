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
    public function getListActiveUser(): object;

    /**
     * Get list deactivated users
     *
     * @return object
     */
    public function getListDeactivatedUser(): object;

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

    /**
     * Update user info by id
     *
     * @param  int     $user_id
     * @param  object  $request
     */
    public function updateUserInfoById(int $user_id, object $request): void;

    /**
     * Handle destroy user by ID
     *
     * @param  int  $user_id
     */
    public function destroyUserById(int $user_id): void;
}
