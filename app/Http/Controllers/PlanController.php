<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //show Plan
        $plans = Plan::all();
        return view('plan.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('plan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate Plan Details
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
        ]);

        // Create a new Plan
        Plan::create($validated);

        return redirect()->route('plan.index')->with('success', 'Plan created successfully.');
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
        $planId = $id;
        $plan = Plan::find($planId);

        return view('plan.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate Plan Details
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
        ]);

        // Update Plan
        $plan = Plan::find($id);
        $plan->update($validated);

        return redirect()->route('plan.index')->with('success', 'Plan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Delete Plan
        $plan = Plan::find($id);
        $plan->delete();

        return redirect()->route('plan.index')->with('success', 'Plan deleted successfully.');
    }
}
