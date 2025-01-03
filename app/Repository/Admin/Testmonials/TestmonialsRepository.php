<?php
namespace App\Repository\Admin\Testmonials;


use App\Interface\Admin\Testmonials\TestmonialsRepositoryInterface;
use App\Models\Testmonial;
use App\Traits\UploadTrait;
use File;



class TestmonialsRepository implements TestmonialsRepositoryInterface
{
    use UploadTrait;
    public function index()
    {
        $testmonials = Testmonial::orderBy('id', 'desc')->paginate(3, ['*'], 'Testmonial_page');
        return view('Back.Pages.Testmonials.index', get_defined_vars());
    }
    public function create()
    {
        return view('Back.Pages.Testmonials.create');
    }
    public function store($request)
    {
        $this->uploadImage($request, 'upload_image', 'image', 'Testmonials');
        Testmonial::create([
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
            'image' => $this->uploadImage($request, 'upload_image', 'image', 'Testmonials'),
        ]);
        return redirect()->route('admin.testmonials.index')->with('success', __('keyWords.added_successfully'));
    }
    public function show($Testmonial)
    {
        return view('Back.Pages.Testmonials.show', get_defined_vars());
    }
    public function edit($testmonial)
    {
        return view('Back.Pages.Testmonials.edit', get_defined_vars());
    }
    public function update($request, $testmonial)
    {
        if ($request->hasFile('image')) {
            File::delete("images/$testmonial->image");
            $this->uploadImage($request, 'upload_image', 'image', 'Testmonials');
            $testmonial->update([
                'image' => $this->uploadImage($request, 'upload_image', 'image', 'Testmonials'),
            ]);
        }
        $testmonial->update([
            'name' => $request->name,
            'position' => $request->position,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.testmonials.index')->with('success', __('keyWords.updated_successfully'));
    }
    public function destroy($testmonial)
    {
        File::delete("images/$testmonial->image");
        $testmonial->delete();
        return redirect()->route('admin.testmonials.index')->with('success', __('keyWords.deleted_successfully'));
    }

}
