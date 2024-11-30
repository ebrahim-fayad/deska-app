<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use App\Interface\Admin\Auth\AdminAuthRepositoryInterface;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    protected $Admin;
    public function __construct(AdminAuthRepositoryInterface $Admin){
        $this->Admin = $Admin;
    }
    public function login()
    {
        return $this->Admin->login();
    }
    public function store(AdminLoginRequest $request )
    {
        return $this->Admin->store($request);
    }
}
