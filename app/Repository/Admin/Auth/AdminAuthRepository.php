<?php
namespace App\Repository\Admin\Auth;

use App\Interface\Admin\Auth\AdminAuthRepositoryInterface;

class AdminAuthRepository implements AdminAuthRepositoryInterface{

    /**
     * @inheritDoc
     */
    public function login() {
        return view('Back.Auth.login');
    }
    public function store($request)
    {
        // $request->ensureIsNotRateLimited;
        return $request->authenticate();
    }
}
