<?php
namespace App\Repository\Admin\Members;



use App\Interface\Admin\Members\MembersRepositoryInterface;
use App\Models\Member;
use App\Traits\UploadTrait;
use File;
use Illuminate\Support\Facades\DB;



class MembersRepository implements MembersRepositoryInterface
{
    use UploadTrait;
    public function index()
    {
        $members = Member::orderBy('id', 'desc')->paginate(3, ['*'], 'Member_page');
        return view('Back.Pages.Members.index', get_defined_vars());
    }
    public function create()
    {
        return view('Back.Pages.Members.create');
    }
    public function store($request)
    {
        DB::beginTransaction();
        try {
            $this->uploadImage($request, 'upload_image', 'image', 'Members');
            Member::create([
                'name' => $request->name,
                'position' => $request->position,
                'description' => $request->description,
                'image' => $this->uploadImage($request, 'upload_image', 'image', 'Members'),
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
            ]);
            DB::commit();
            return redirect()->route('admin.members.index')->with('success', __('keyWords.added_successfully'));
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function show($Member)
    {
        return view('Back.Pages.Members.show', get_defined_vars());
    }
    public function edit($member)
    {
        return view('Back.Pages.Members.edit', get_defined_vars());
    }
    public function update($request, $Member)
    {
        if ($request->hasFile('image')) {
            File::delete("images/$Member->image");
            $this->uploadImage($request, 'upload_image', 'image', 'Members');
            $Member->update([
                'image' => $this->uploadImage($request, 'upload_image', 'image', 'Members'),
            ]);
        }
        $Member->update([
                'name' => $request->name,
                'position' => $request->position,
                'description' => $request->description,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,

        ]);
        return redirect()->route('admin.members.index')->with('success', __('keyWords.updated_successfully'));
    }
    public function destroy($Member)
    {
        File::delete("images/$Member->image");
        $Member->delete();
        return redirect()->route('admin.members.index')->with('success', __('keyWords.deleted_successfully'));
    }

}
