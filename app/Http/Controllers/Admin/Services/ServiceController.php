<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServicesRequest;
use App\Interface\Admin\Services\ServicesRepositoryInterface;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $Service;
    public function __construct (ServicesRepositoryInterface $Service){
        $this->Service = $Service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->Service->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Service->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServicesRequest $request)
    {
        return $this->Service->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return $this->Service->show($service);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return $this->Service->edit($service);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicesRequest $request, Service $service)
    {
        return $this->Service->update($request,$service);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        return $this->Service->destroy($service);

    }
    public function restore( $slug)
    {
        return $this->Service->restore($slug);

    }
    public function forceDelete( $slug)
    {
        return $this->Service->forceDelete($slug);

    }
}
