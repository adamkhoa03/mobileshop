<?php

namespace App\Http\Controllers\Admin;

use App\Services\Contracts\RoleService;
use App\Services\Contracts\UserService;
use Illuminate\Http\Request;

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
        $users = $this->userService->getListUser();
        return [
            'roles' => $roles,
            'users' => $users,
        ];
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
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
