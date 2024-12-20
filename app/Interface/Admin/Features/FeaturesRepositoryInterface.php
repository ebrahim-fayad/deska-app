<?php
namespace App\Interface\Admin\Features;

interface FeaturesRepositoryInterface{
    public function index();
    public function create();
    public function store($request);
    public function show($feature);
    public function edit($feature);
    public function update($request,$feature);
    public function destroy($feature);
    public function restore($feature);
    public function forceDelete($feature);


}

