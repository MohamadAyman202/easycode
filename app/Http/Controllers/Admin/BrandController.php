<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interface\SystemInterface;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    protected $Brands, $Models = ['App\Models\Brand'], $var = ['brands'], $msg = 'Brands';

    function __construct(SystemInterface $Brands)
    {
        $this->Brands = $Brands;
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
        $brands = Brand::query()->get();
        return view('admin.brand.index', compact('brands'));
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
        $data = $request->except('_token');
        $data['user_id'] = auth()->user()->id;
        return $this->Brands->store($this->Models, $data, $this->var, $this->msg, $request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        return $this->Brands->update($this->Models, $id, $data, $this->var, $this->msg, $request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->Brands->delete($this->Models[0], $id, $this->msg);
    }
}
