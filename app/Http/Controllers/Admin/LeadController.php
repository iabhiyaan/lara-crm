<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Lead::class);

        $details = Lead::latest()->get();
        return view('admin.lead.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Lead::class);
        return view('admin.lead.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Lead::class);

        $validatedData = $request->validate([
            'name' => ['string', 'max:255', 'required'],
            'mobile_number' => ['string', 'max:13', 'required'],
        ]);

        Lead::create($validatedData);

        return redirect()->route('leads.index')->with('successMessage', 'Lead created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead)
    {
        $this->authorize('update', Lead::class);
        return view('admin.lead.edit', compact('lead'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lead $lead)
    {
        $this->authorize('update', Lead::class);

        $validatedData = $request->validate([
            'name' => ['string', 'max:255', 'required'],
            'mobile_number' => ['string', 'max:13', 'required'],
        ]);

        $lead->update($validatedData);
        return redirect()->route('leads.index')->with('successMessage', 'Lead updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        $this->authorize('delete', Lead::class);
        $lead->delete();
        return redirect()->route('leads.index')->with('successMessage', 'Lead deleted successfully');
    }
}
