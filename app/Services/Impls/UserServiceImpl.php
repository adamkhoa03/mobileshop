<?php

namespace App\Services\Impls;

use App\Constants\App;
use App\Http\Requests\StoreUserRequest;
use App\Repositories\UserRepository;
use App\Services\Contracts\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
     * Update user info from request by id
     *
     * @param  int     $user_id
     * @param  object  $request
     */
    final public function updateUserInfoById(int $user_id, object $request): void
    {
        $data = $this->getClientRequestData($request);
        $this->repo->findAndUpdate($user_id, $data);
    }

    /**
     * Get client request data
     *
     * @param  object  $request
     *
     * @return array
     */
    private function getClientRequestData(object $request): array
    {
        $password = $request->password;
        if (blank($password)) {
            $data = $request->all();
        } else {
            $data = array_merge($request->all(), ['password' => bcrypt($password)]);
        }
        return $data;
    }

    /**
     * Handle logic for destroy user from DB by ID
     *
     * @param  int  $user_id
     *
     * @throws \Exception
     */
    final public function destroyUserById(int $user_id): void
    {
        if (!$this->getUserInfoById($user_id)->exists()) {
            throw new NotFoundHttpException(__('global.http_exception.not_found',
                ['attribute' => __('global.users.user')]));
        }
        $this->repo->findAndDelete($user_id);
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
     * Handle update avatar for authorized user
     *
     * @param  string|null  $image
     */
    final public function updateAvatar(?string $image): void
    {
        $user = Auth::user();
        $avatarFromDatabase = $user->avatar;
        if (blank($image)) {
            $image = $avatarFromDatabase;
        } else {
            $this->removeImageIfExist($avatarFromDatabase);
        }

        $this->repo->findAndUpdate($user->id, ['avatar' => $image]);
    }

    /**
     * Remove image if exist
     *
     * @param  string|null  $avatarFromDatabase
     */
    private function removeImageIfExist(?string $avatarFromDatabase): void
    {
        if (filled($avatarFromDatabase) &&
            file_exists(App::PATH_OF_AVATAR_UPLOAD.'/'.$avatarFromDatabase)) {
            unlink(App::PATH_OF_AVATAR_UPLOAD.'/'.$avatarFromDatabase);
        }
    }
}
