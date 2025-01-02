<?php
namespace App\Interface\Admin\Testmonials;

interface TestmonialsRepositoryInterface{
    public function index();
    public function create();
    public function store($request);
    public function show($testmonial);
    public function edit($testmonial);
    public function update($request,$testmonial);
    public function destroy($testmonial);

}

