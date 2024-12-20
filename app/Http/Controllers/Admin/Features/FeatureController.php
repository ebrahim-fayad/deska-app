<?php

namespace App\Http\Controllers\Admin\Features;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FeatureRequest;
use App\Interface\Admin\Features\FeaturesRepositoryInterface;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    protected $Feature;
    public function __construct (FeaturesRepositoryInterface $Feature){
        $this->Feature = $Feature;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->Feature->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Feature->create();
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(FeatureRequest  $request)
    {
        return $this->Feature->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Feature $feature)
    {
        return $this->Feature->show( $feature);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        return $this->Feature->edit( $feature);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FeatureRequest $request, Feature $feature)
    {
        return $this->Feature->update($request, $feature);
    }

    /**
     * Remove the specified resource from storage.
     */
      public function destroy(Feature $feature)
    {
        return $this->Feature->destroy( $feature);

    }
    public function restore( $slug)
    {
        return $this->Feature->restore($slug);

    }
    public function forceDelete( $slug)
    {
        return $this->Feature->forceDelete($slug);

    }
}
