<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;
 

class BudgetController extends Controller
{
    public function index()
    {
        $budgets = Budget::with('category')->get();
        return view('budgets.index', compact('budgets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric|min:0',
        ]);

        Budget::create($request->all());
        return redirect()->route('budgets.index')->with('success', 'Budget set successfully.');
    }
}