<?php
namespace App\Repository\Admin\Messages;


use App\Interface\Admin\Messages\MessagesRepositoryInterface;
use App\Models\Message;

class MessagesRepository implements MessagesRepositoryInterface
{
    public function index()
    {
        $messages = Message::orderBy('id','desc')->paginate(3,['*'],'Message_page');
        return view('Back.Pages.Messages.index', get_defined_vars());
    }
    public function create() {
        return view('Back.Pages.Messages.create');
    }
    public function store($request)
    {
        Message::create([
            'title' =>$request->title,
            'icon' =>$request->icon,
            'description' =>$request->description,
        ]);
        return redirect()->route('admin.Messages.index')->with('success', __('keyWords.added_successfully'));
    }
    public function show($message)
    {
        return view('Back.Pages.Messages.show', get_defined_vars());
    }
    // public function edit($Message) {
    //     return view('Back.Pages.Messages.edit', get_defined_vars());
    // }
    // public function update($request, $Message) {
    //     $Message->update([
    //         'title' =>$request->title,
    //         'icon' =>$request->icon,
    //         'description' =>$request->description,
    //     ]);
    //     return redirect()->route('admin.Messages.index')->with('success', __('keyWords.updated_successfully'));
    // }

    public function destroy($message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', __('keyWords.deleted_successfully'));
    }
    // public function restore($slug)
    // {
    //    $Message = Message::withTrashed()->where('slug', $slug)->first();
    //    if (!is_null($Message)) {
    //        $Message->restore();
    //        return redirect()->route('admin.Messages.index')->with('success', __('keyWords.restored_successfully'));
    //    }
    //    return redirect()->route('admin.Messages.index')->with('error', __('keyWords.not_found'));
    // }
    // public function forceDelete($slug){
    //     $Message = Message::withTrashed()->where('slug', $slug)->first();
    //     if (!is_null($Message)) {
    //         $Message->forceDelete();
    //         return redirect()->route('admin.Messages.index')->with('success', __('keyWords.deleted_successfully'));
    //     }
    //     return redirect()->route('admin.Messages.index')->with('error', __('keyWords.not_found'));
    // }
}
