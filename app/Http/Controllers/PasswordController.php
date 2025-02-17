<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordController extends Controller
{

    /**
     * Show the form to request a password reset link.
     *
     * @return Factory|View|Application
     */
    public function showLinkRequestForm(): Factory|View|Application
    {
        return view('auth.passwords.email');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function sendResetLinkEmail(Request $request): RedirectResponse
    {
        // 1、验证邮箱
        $request->validate(['email' => 'required|email']);
        $email = $request->email;

        // 2、获取对应的用户
        $user = User::where('email', $email)->first();

        // 3、如果用户不存在
        if (is_null($user)) {
            session()->flash('danger', 'Email not found.');
            return redirect()->back()->withInput();
        }

        // 4、生成 Token，会在视图 emails.reset_link 里拼接链接
        $token = hash_hmac('sha256', Str::random(40), config('app.key'));

        // 5、将 Token 存储到数据库中, 使用 updateOrInsert 方法来确保每个用户(邮箱)只有一个重置密码的 Token
        DB::table('password_resets')->updateOrInsert(['email' => $email], [
            'email' => $email,
            'token' => $token,
            'created_at' => new Carbon,
        ]);

        // 6、将 Token 链接发送给用户
        Mail::send('emails.reset_link', compact('token'), function ($message) use ($email) {
            $message->to($email)->subject('忘记密码');
        });

        session()->flash('success', 'The reset email was sent successfully, please check it.');
        return redirect()->back();
    }
}
