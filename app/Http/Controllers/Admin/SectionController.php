<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interface\SystemInterface;
use App\Models\Image;
use App\Trait\UploadFile;
use Illuminate\Support\Facades\File;

class SectionController extends Controller
{
    protected $section, $models = ['App\Models\Section', 'App\Models\Image'],
        $vars = ['section', 'image'], $message = 'Section', $section_id = 'section_id';

    function __invoke($models, $vars, $message, $section_id)
    {
        $this->models       = $models;
        $this->vars         = $vars;
        $this->message      = $message;
        $this->section_id   = $section_id;
    }

    function __construct(SystemInterface $section)
    {
        $this->section = $section;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::query()->with('images')->get();
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
        $data = $request->except('_token', 'image');
        return $this->section->store(
            $this->models,
            $data,
            null,
            $this->vars,
            null,
            null,
            $this->section_id,
            $this->message,
            $request
        );
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
        $data = $request->except('_token', 'image');
        return $this->section->update(
            $this->models,
            $id,
            $data,
            null,
            $this->vars,
            null,
            null,
            $this->section_id,
            $this->message,
            $request,
            'images',
            'image'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->section->delete($this->models[0], $id, $this->message, 'images', 'image');
    }
}
