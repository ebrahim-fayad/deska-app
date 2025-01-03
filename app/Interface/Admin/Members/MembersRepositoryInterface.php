<?php
namespace App\Interface\Admin\Members;

interface MembersRepositoryInterface{
    public function index();
    public function create();
    public function store($request);
    public function show($member);
    public function edit($member);
    public function update($request,$member);
    public function destroy($member);

}

