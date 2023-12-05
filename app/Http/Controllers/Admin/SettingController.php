<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interface\SystemInterface;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $Setting;
    function __construct(SystemInterface $Setting)
    {
        $this->Setting = $Setting;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::query()->first();
        return view('admin.setting.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $setting = Setting::query()->findOrFail($id);
        return view('admin.setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token', 'change_api_token');
        if ($request->change_api_token == true) {
            $data['api_token'] = \Str::random(80);
        }
        return $this->Setting->update(['App\Models\Setting'], $id, $data, ['setting'], 'Setting', $request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
