<?php
namespace App\Interface\Admin\Auth;

interface AdminAuthRepositoryInterface{
    public function login();
    public function store($request);
}

