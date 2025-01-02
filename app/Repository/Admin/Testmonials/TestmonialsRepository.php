<?php
namespace App\Repository\Admin\Testmonials;


use App\Interface\Admin\Testmonials\TestmonialsRepositoryInterface;
use App\Models\Testmonial;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Auth;


class TestmonialsRepository implements TestmonialsRepositoryInterface
{
    use UploadTrait;
    public function index()
    {
      $testmonials = Testmonial::orderBy('id','desc')->paginate(3,['*'],'Testmonial_page');
        return view('Back.Pages.Testmonials.index', get_defined_vars());
    }
    public function create() {
        return view('Back.Pages.Testmonials.create');
    }
    public function store($request)
    {
        $this->uploadImage($request,'upload_image','image','Testmonials');
        // dd($this->uploadImage($request,'upload_image','image','Testmonials'));
        Testmonial::create([
            'name' =>$request->name,
            'position' =>$request->position,
            'description' =>$request->description,
            'image' =>$this->uploadImage($request,'upload_image','image','Testmonials'),
        ]);
        return redirect()->route('admin.testmonials.index')->with('success', __('keyWords.added_successfully'));
    }
    public function show($Testmonial)
    {
        return view('Back.Pages.Testmonials.show', get_defined_vars());
    }
    public function edit($Testmonial) {
        return view('Back.Pages.Testmonials.edit', get_defined_vars());
    }
    public function update($request,$testmonial) {
      $testmonial->update([
            'title' =>$request->title,
            'icon' =>$request->icon,
            'description' =>$request->description,
        ]);
        return redirect()->route('admin.testmonials.index')->with('success', __('keyWords.updated_successfully'));
    }
    public function destroy($testmonial)
    {
      $testmonial->delete();
        return redirect()->route('admin.testmonials.index')->with('success', __('keyWords.deleted_successfully'));
    }

}
