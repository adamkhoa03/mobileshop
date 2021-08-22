<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class LoginController extends Controller
{
    protected $redirectTo = '/home';

    /**
     * Show form login
     *
     * @return \Illuminate\Contracts\View\View
     */
    final public function showFormLogin(): View
    {
        return view('backend.login');
    }

    public function login()
    {
        return "login";
    }
}
