<?php
namespace App\Interface\Admin\Messages;

interface MessagesRepositoryInterface{
    public function index();
    public function create();
    public function store($request);
    public function show($message);
    // public function edit($feature);
    // public function update($request,$feature);
    public function destroy($feature);
    // public function restore($feature);
    // public function forceDelete($feature);


}

