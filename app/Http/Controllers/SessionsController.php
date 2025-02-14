<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    /**
     * Show the form for login.
     *
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('sessions.create');
    }


    /**
     * Store a new session. (Login)
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)) {
            session()->flash('danger', 'Sorry! Email or password invalid!');
            return redirect()->back()->withInput();
        }

        session()->flash('success', 'Welcome back!');
        return redirect()->route('users.show', [Auth::user()]);
    }
}
