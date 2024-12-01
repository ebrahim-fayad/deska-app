<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Interface\Admin\Auth\AdminForgotPasswordRepositoryInterface;
use Illuminate\Http\Request;

class AdminForgotPasswordController extends Controller
{
    protected $Admin;
    public function __construct(AdminForgotPasswordRepositoryInterface $Admin)
    {
        $this->Admin = $Admin;
    }
    public function create()
    {
        return $this->Admin->create();
    }
    public function store(Request $request)
    {
        return $this->Admin->store($request);

    }
    public function sendLink(Request $request)
    {
        return $this->Admin->sendLink($request);

    }
    public function edit(Request $request)
    {
        return $this->Admin->edit($request);

    }
}
