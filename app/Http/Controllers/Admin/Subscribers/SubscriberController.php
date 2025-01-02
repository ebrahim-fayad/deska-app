<?php

namespace App\Http\Controllers\Admin\Subscribers;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;


class SubscriberController extends Controller
{

    public function index()
    {
        $subscribers = Subscriber::paginate(10);
        return view('Back.Pages.Subscribers.index', get_defined_vars());
    }
      public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return redirect()->route('admin.subscribers.index')->with('success', __('keyWords.deleted_successfully'));
    }

}
