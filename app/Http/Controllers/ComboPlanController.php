<?php

namespace App\Http\Controllers;

use App\Models\ComboPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class ComboPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $comboPlans = ComboPlan::with('plan')->get();
        // dd($comboPlans);

        foreach ($comboPlans as $key => $relatedPlan) {
            $relatedPlan->plan_name = $relatedPlan->plan->name;
        }

        return view('comboplan.index', compact('comboPlans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $planList = Plan::all();
        return view('comboplan.create', compact('planList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate Combo Plan
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'plan_id' => 'required|array',
            'plan_id.*' => 'exists:plans,id',
        ]);
        // dd($validated);

        // Create a new Combo Plan
        foreach ($validated['plan_id'] as $planId) {
            ComboPlan::create([
                'name' => $validated['name'],
                'price' => $validated['price'],
                'plan_id' => $planId,
            ]);
        }

        return redirect()->route('comboplan.index')->with('success', 'ComboPlan created successfully.');
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
        $comboPlan = ComboPlan::find($planId);

        $planList = Plan::all();
        return view('comboplan.edit', compact('comboPlan', 'planList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate Combo Plan
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'plan_id' => 'required|array',
            'plan_id.*' => 'exists:plans,id',
        ]);
        // dd($validated);

        // Update a new Combo Plan
        $comboPlan = ComboPlan::find($id);
        $comboPlan->name = $validated['name'];
        $comboPlan->price = $validated['price'];
        $comboPlan->plan_id = $validated['plan_id'];

        return redirect()->route('comboplan.index')->with('success', 'ComboPlan Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $plan = ComboPlan::find($id);
        $plan->delete();

        return redirect()->route('comboplan.index')->with('success', 'Combo Plan deleted successfully.');
    }
}
