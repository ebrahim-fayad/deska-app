<?php

namespace App\Http\Controllers\Admin\Testmonials;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TestmonialsRequest;
use App\Interface\Admin\Testmonials\TestmonialsRepositoryInterface;
use App\Models\Testmonial;
use Illuminate\Http\Request;

class TestmonialController extends Controller
{
    protected $Testmonial;
    public function __construct (TestmonialsRepositoryInterface $Testmonial){
        $this->Testmonial = $Testmonial;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->Testmonial->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Testmonial->create();
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(TestmonialsRequest $request)
    {
        return $this->Testmonial->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Testmonial $testmonial)
    {
        return $this->Testmonial->show( $testmonial);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testmonial $testmonial)
    {
        return $this->Testmonial->edit( $testmonial);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestmonialsRequest $request, Testmonial $testmonial)
    {
        return $this->Testmonial->update($request, $testmonial);
    }

    /**
     * Remove the specified resource from storage.
     */
      public function destroy(Testmonial $testmonial)
    {
        return $this->Testmonial->destroy( $testmonial);

    }
    public function restore( $slug)
    {
        return $this->Testmonial->restore($slug);

    }
    public function forceDelete( $slug)
    {
        return $this->Testmonial->forceDelete($slug);

    }
}
