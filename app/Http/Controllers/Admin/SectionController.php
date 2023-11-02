<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Trait\UploadFile;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::query()->get();
        return view('admin.section.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.section.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->except('_token', 'image');
            if (!empty($data)) {

                $section =  Section::query()->create($data);
                if ($request->hasFile('image')) {
                    $images = [];

                    foreach ($request->image as $key => $value) {
                        $image = UploadFile::File("images/sections/", $value);
                        $images[] = $image;
                    }

                    foreach ($images as $key => $value) {
                        $image = new Image();
                        $image->image = $value;
                        $image->section_id = $section->id;
                        $image->save();
                    }
                }

                toastr()->success("Successfully Created {$data['title']}", 'success');
                return redirect()->route('sections.index');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $section = Section::query()->with('images')->first();
        return view('admin.section.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->except('_token', 'image');
            $section = Section::query()->findOrFail($id);
            if (!empty($data)) {

                $section->update($data);
                if ($request->hasFile('image')) {
                    $images = [];

                    foreach ($request->image as $key => $value) {
                        $image = UploadFile::File("images/sections/", $value);
                        $images[] = $image;
                    }


                    Image::query()->where('section_id', $id)->delete();
                    foreach ($images as $key => $value) {
                        $image = new Image();
                        $image->image = $value;
                        $image->section_id = $section->id;
                        $image->save();
                    }
                }

                toastr()->success("Successfully Created {$data['title']}", 'success');
                return redirect()->route('sections.index');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (!empty($id)) {
            Section::query()->where('id', $id)->delete();
            toastr()->success("Successfully Deleted Section", 'Delete');
            return redirect()->back()->route('sections.index');
        }
    }
}
