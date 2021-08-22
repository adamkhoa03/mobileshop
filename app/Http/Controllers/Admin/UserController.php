<?php

namespace App\Http\Controllers\Admin;

use App\Constants\App;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\Contracts\RoleService;
use App\Services\Contracts\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends BaseController
{
    private UserService $userService;
    private RoleService $roleService;

    /**
     * UsersController constructor.
     *
     * @param  \App\Services\Contracts\UserService  $userService
     * @param  \App\Services\Contracts\RoleService  $roleService
     */
    public function __construct(
        UserService $userService,
        RoleService $roleService
    ) {
        $this->userService = $userService;
        $this->roleService = $roleService;
    }

    /**
     * Get data from users table, roles table
     *
     * @return array
     */
    final public function getDataTable(): array
    {
        $roles = $this->roleService->getListRoles();
        $users = $this->userService->getListActiveUser();
        return [
            'roles' => $roles,
            'users' => $users,
            'users_status' => __('global.status.activated')
        ];
    }

    /**
     * Show deactivated users
     *
     * @return \Illuminate\Contracts\View\View
     */
    final public function showListDeactivateUsers(): View
    {
        $roles = $this->roleService->getListRoles();
        $users = $this->userService->getListDeactivatedUser();
        $users_status = __('global.status.deactivated');
        return view($this->getIndexPageName(), compact('users', 'roles', 'users_status'));
    }

    /**
     * Defined index page name
     *
     * @return string
     */
    final public function getIndexPageName(): string
    {
        return 'backend.users.index';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     *
     * @return RedirectResponse
     */
    final public function store(StoreUserRequest $request): RedirectResponse
    {
        $slugOfImageName = $request->input('name');
        $image = $this->getImageUploadName($request, $slugOfImageName, App::PATH_OF_AVATAR_UPLOAD);
        return $this->userService->create($request, $image);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $user_id
     *
     * @return \Illuminate\Contracts\View\View
     */
    final public function edit(int $user_id): View
    {
        $roles = $this->roleService->getListRoles();
        $user = $this->userService->getUserInfoById($user_id);
        return view('backend.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateUserRequest  $request
     * @param  int                $user_id
     *
     * @return RedirectResponse
     */
    final public function update(UpdateUserRequest $request, int $user_id): RedirectResponse
    {
        $this->userService->updateUserInfoById($user_id, $request);
        return redirect()->route('admin.user.index')
            ->with('success', __('alert.update.success', ['attribute' => __('global.users.user')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $user_id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    final public function destroy(int $user_id): RedirectResponse
    {
        $this->userService->destroyUserById($user_id);
        return redirect()->route('admin.user.index')
            ->with('success', __('alert.delete.success', ['attribute' => __('global.users.user')]));
    }
}
