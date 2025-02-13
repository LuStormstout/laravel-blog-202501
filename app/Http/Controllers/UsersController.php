<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Show the form for signup.
     *
     * @return Application|Factory|View
     */
    public function create(): Factory|View|Application
    {
        return view('users.create');
    }

    /**
     * Show user information.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function show(User $user): View|Factory|Application
    {
        return view('users.show', compact('user'));
    }
}
