<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contactus;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact_uses = Contactus::query()->get();
        return view('admin.contact-us.index', compact('contact_uses'));
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
    public function show($id)
    {
        $contact_us = Contactus::query()->findOrFail($id);
        return view('admin.contact-us.view', compact('contact_us'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contactus $contactus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $contact_us = Contactus::query()->findOrFail($id);
        $contact_us->update([
            'see' => $request->see,
        ]);
        if ($request->see === 0) {
            toastr()->success('Successfully See Message', 'successs');
            return redirect()->back();
        } else {
            toastr()->success('Successfully Remove See Message', 'successs');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contactus $contactus)
    {
        //
    }
}
