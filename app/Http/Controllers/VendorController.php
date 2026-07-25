<?php

namespace App\Http\Controllers;


use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\StoreVendorRequest;
use App\Http\Requests\UpdateVendorRequest;

class VendorController extends Controller
{
    //
    public function index() : View
    {
        $vendors = Vendor::paginate(5);
        return view('vendors.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVendorRequest $request) : RedirectResponse
    {
        Vendor::create($request->validated());
        return redirect()->route('vendors.index')
                ->withSuccess('Vendor is created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor) : View
    {
        //
        return view('vendors.show', compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor) : View
    {
        //
        return view('vendors.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVendorRequest $request, Vendor $vendor) : RedirectResponse
    {
        //
        $vendor->update($request->validated());
        return redirect()->route('vendors.index')
                ->withSuccess('Vendor is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor) : RedirectResponse
    {
        //
        $vendor->delete();
        return redirect()->route('vendors.index')
                ->withSuccess('Vendor is deleted successfully.');
    }
}
