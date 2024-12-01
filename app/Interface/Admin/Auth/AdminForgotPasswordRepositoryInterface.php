<?php
namespace App\Interface\Admin\Auth;

interface AdminForgotPasswordRepositoryInterface{
    public function create();
    public function store($request);
    public function sendLink($request);
    public function edit($request);

}

