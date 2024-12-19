<?php
namespace App\Interface\Admin\Services;

interface ServicesRepositoryInterface{
    public function index();
    public function create();
    public function store($request);
    public function show($service);
    public function edit($service);
    public function update($request,$service);
    public function destroy($service);
    public function restore($service);
    public function forceDelete($service);


}

