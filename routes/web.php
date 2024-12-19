<?php

use App\Http\Controllers\ComboPlanController;
use App\Http\Controllers\EligibilityCriteriaController;
use App\Http\Controllers\PlanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');

    return redirect()->route('plan.index');
});

// Plan Routes
Route::resource('plan', PlanController::class);

// Combo Plan Routes
Route::resource('comboplan', ComboPlanController::class);


Route::resource('eligibility_criteria', EligibilityCriteriaController::class);
