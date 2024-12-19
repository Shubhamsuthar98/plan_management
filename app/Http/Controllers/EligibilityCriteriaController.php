<?php

namespace App\Http\Controllers;

use App\Models\EligibilityCriteria;
use Illuminate\Http\Request;

class EligibilityCriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ecList = EligibilityCriteria::all();
        return view('eligibility_criteria.index', compact('ecList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('eligibility_criteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            "age_less_than" => 'nullable|integer',
            "age_greater_than" => 'nullable|integer',
            "last_login_days_ago" => 'nullable|integer',
            "income_less_than" => 'nullable|numeric',
            "income_greater_than" => 'nullable|numeric'
        ]);

        // Create a new Plan
        EligibilityCriteria::create($validated);

        return redirect()->route('eligibility_criteria.index')->with('success', 'Eligibility_criteria created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $eligibilityCriteria = EligibilityCriteria::find($id);


        return view('eligibility_criteria.edit', compact('eligibilityCriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            "age_less_than" => 'nullable|integer',
            "age_greater_than" => 'nullable|integer',
            "last_login_days_ago" => 'nullable|integer',
            "income_less_than" => 'nullable|numeric',
            "income_greater_than" => 'nullable|numeric'
        ]);

        // Update Plan
        $eligibilityCriteria = EligibilityCriteria::find($id);
        $eligibilityCriteria->update($validated);

        return redirect()->route('eligibility_criteria.index')->with('success', 'Eligibility_criteria updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $eligibilityCriteria = EligibilityCriteria::find($id);
        $eligibilityCriteria->delete();

        return redirect()->route('eligibility_criteria.index')->with('success', 'Eligibility_criteria deleted successfully.');
    }
}
