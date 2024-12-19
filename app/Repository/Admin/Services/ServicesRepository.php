<?php
namespace App\Repository\Admin\Services;


use App\Interface\Admin\Services\ServicesRepositoryInterface;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ServicesRepository implements ServicesRepositoryInterface
{
    public function index()
    {
        $services = Service::orderBy('id','desc')->paginate(3,['*'],'service_page');
        $trashedServices = Service::onlyTrashed()->paginate(3,['*'],'trashed_services');
        return view('Back.Pages.Services.index', get_defined_vars());
    }
    public function create() {
        return view('Back.Pages.Services.create');
    }
    public function store($request)
    {
        Service::create([
            'title' =>$request->title,
            'icon' =>$request->icon,
            'description' =>$request->description,
        ]);
        return redirect()->route('admin.services.index')->with('success', __('keyWords.added_successfully'));
    }
    public function show($service)
    {
        return view('Back.Pages.Services.show', get_defined_vars());
    }
    public function edit($service) {
        return view('Back.Pages.Services.edit', get_defined_vars());
    }
    public function update($request, $service) {
        $service->update([
            'title' =>$request->title,
            'icon' =>$request->icon,
            'description' =>$request->description,
        ]);
        return redirect()->route('admin.services.index')->with('success', __('keyWords.updated_successfully'));
    }
    public function destroy($service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', __('keyWords.deleted_successfully'));
    }
    public function restore($slug)
    {
       $service = Service::withTrashed()->where('slug', $slug)->first();
       if (!is_null($service)) {
           $service->restore();
           return redirect()->route('admin.services.index')->with('success', __('keyWords.restored_successfully'));
       }
       return redirect()->route('admin.services.index')->with('error', __('keyWords.not_found'));
    }
    public function forceDelete($slug){
        $service = Service::withTrashed()->where('slug', $slug)->first();
        if (!is_null($service)) {
            $service->forceDelete();
            return redirect()->route('admin.services.index')->with('success', __('keyWords.deleted_successfully'));
        }
        return redirect()->route('admin.services.index')->with('error', __('keyWords.not_found'));
    }
}
