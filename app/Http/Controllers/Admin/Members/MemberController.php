<?php

namespace App\Http\Controllers\Admin\Members;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MemberRequest;
use App\Interface\Admin\Members\MembersRepositoryInterface;
use App\Models\Member;


class MemberController extends Controller
{
    protected$member;
    public function __construct (MembersRepositoryInterface $member){
        $this->member =$member;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->member->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->member->create();
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(MemberRequest $request)
    {
        return $this->member->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        return $this->member->show( $member);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return $this->member->edit( $member);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberRequest$request, Member $member)
    {
        return $this->member->update($request, $member);
    }

    /**
     * Remove the specified resource from storage.
     */
      public function destroy(Member $member)
    {
        return $this->member->destroy( $member);

    }
    public function restore( $slug)
    {
        return $this->member->restore($slug);

    }
    public function forceDelete( $slug)
    {
        return $this->member->forceDelete($slug);

    }
}
