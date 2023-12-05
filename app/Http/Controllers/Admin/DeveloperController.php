<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeveloperRequest;
use App\Interface\SystemInterface;
use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    protected $Developer, $Models = ['App\Models\Developer'], $var = ['developer'], $msg = 'Developer';

    function __construct(SystemInterface $Developer)
    {
        $this->Developer = $Developer;
    }

    function __invoke($Models, $var, $msg)
    {
        $this->Models   = $Models;
        $this->var      = $var;
        $this->msg      = $msg;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $developers = Developer::query()->get();
        return view('admin.developer.index', compact('developers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.developer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeveloperRequest $request)
    {
        $data = $request->except('_token');
        $data['skills'] = explode(',', $data['skills']);
        $data['user_id'] = auth()->user()->id;
        return $this->Developer->store($this->Models, $data, $this->var, $this->msg, $request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Developer $developer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $developer = Developer::query()->findOrFail($id);
        return view('admin.developer.edit', compact('developer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeveloperRequest $request, $id)
    {
        $data = $request->except('token');
        $data['skills'] = explode(',', $data['skills']);
        $data['user_id'] = auth()->user()->id;
        return $this->Developer->update($this->Models, $id, $data, $this->var, $this->msg, $request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->Developer->delete($this->Models[0], $id, $this->msg);
    }
}
