<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioRequest;
use App\Interface\SystemInterface;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    protected $Portfolio, $Models = ['App\Models\Portfolio'], $var = ['portfolio'], $msg = 'Portfolio';
    function __construct(SystemInterface $Portfolio)
    {
        $this->Portfolio = $Portfolio;
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
        $portfolios = Portfolio::query()->get();
        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PortfolioRequest $request)
    {
        $data = $request->except('_token');
        $data['skills'] = explode(',', $data['skills']);
        $data['user_id'] = Auth::user()->id;
        return $this->Portfolio->store($this->Models, $data, $this->var, $this->msg, $request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $portfolio = Portfolio::query()->findOrFail($id);
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PortfolioRequest $request, $id)
    {
        $data = $request->except('_token');
        $data['skills'] = explode(',', $data['skills']);
        $data['user_id'] = Auth::user()->id;
        return $this->Portfolio->update($this->Models, $id, $data, $this->var, $this->msg, $request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->Portfolio->delete($this->Models[0], $id, $this->msg);
    }
}
