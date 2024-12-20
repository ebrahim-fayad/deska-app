<?php
namespace App\Repository\Admin\Features;


use App\Interface\Admin\Features\FeaturesRepositoryInterface;
use App\Models\Feature;

class FeaturesRepository implements FeaturesRepositoryInterface
{
    public function index()
    {
        $Features = Feature::orderBy('id','desc')->paginate(3,['*'],'feature_page');
        $trashedFeatures = Feature::onlyTrashed()->paginate(3,['*'],'trashed_Features');
        return view('Back.Pages.Features.index', get_defined_vars());
    }
    public function create() {
        return view('Back.Pages.Features.create');
    }
    public function store($request)
    {
        Feature::create([
            'title' =>$request->title,
            'icon' =>$request->icon,
            'description' =>$request->description,
        ]);
        return redirect()->route('admin.features.index')->with('success', __('keyWords.added_successfully'));
    }
    public function show($feature)
    {
        return view('Back.Pages.Features.show', get_defined_vars());
    }
    public function edit($feature) {
        return view('Back.Pages.Features.edit', get_defined_vars());
    }
    public function update($request, $feature) {
        $feature->update([
            'title' =>$request->title,
            'icon' =>$request->icon,
            'description' =>$request->description,
        ]);
        return redirect()->route('admin.features.index')->with('success', __('keyWords.updated_successfully'));
    }
    public function destroy($feature)
    {
        $feature->delete();
        return redirect()->route('admin.features.index')->with('success', __('keyWords.deleted_successfully'));
    }
    public function restore($slug)
    {
       $feature = Feature::withTrashed()->where('slug', $slug)->first();
       if (!is_null($feature)) {
           $feature->restore();
           return redirect()->route('admin.features.index')->with('success', __('keyWords.restored_successfully'));
       }
       return redirect()->route('admin.features.index')->with('error', __('keyWords.not_found'));
    }
    public function forceDelete($slug){
        $feature = Feature::withTrashed()->where('slug', $slug)->first();
        if (!is_null($feature)) {
            $feature->forceDelete();
            return redirect()->route('admin.features.index')->with('success', __('keyWords.deleted_successfully'));
        }
        return redirect()->route('admin.features.index')->with('error', __('keyWords.not_found'));
    }
}
