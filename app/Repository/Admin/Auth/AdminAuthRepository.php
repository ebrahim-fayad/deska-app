<?php
namespace App\Repository\Admin\Auth;

use App\Interface\Admin\Auth\AdminAuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AdminAuthRepository implements AdminAuthRepositoryInterface{

    /**
     * @inheritDoc
     */
    public function login() {
        return view('Back.Auth.login');
    }
    public function store($request)
    {
        return $request->authenticate();
    }
    public function logout($request)
    {
        Auth::guard('admin')->logout();

        $request->session()->forget('guard.admin');
        // $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('admin.login')->with('success', 'Admin Logged Out Successfully');
    }
}
