<?php

namespace App\Http\Controllers\Admin\Messages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MessageRequest;
use App\Interface\Admin\Messages\MessagesRepositoryInterface;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    protected $Message;
    public function __construct (MessagesRepositoryInterface $Message){
        $this->Message = $Message;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->Message->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Message->create();
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(MessageRequest $request)
    {
        return $this->Message->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        return $this->Message->show( $message);

    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Message $message)
    // {
    //     return $this->Message->edit( $message);
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update({{ updateRequest }} $request, Message $message)
    // {
    //     return $this->Message->update($request, $message);
    // }

    /**
     * Remove the specified resource from storage.
     */
      public function destroy(Message $message)
    {
        return $this->Message->destroy( $message);

    }
    // public function restore( $slug)
    // {
    //     return $this->Message->restore($slug);

    // }
    // public function forceDelete( $slug)
    // {
    //     return $this->Message->forceDelete($slug);

    // }
}
