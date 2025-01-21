<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::all();
        return view('accounts.index', compact('accounts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'balance' => 'required|numeric|min:0',
        ]);

        Account::create($request->only('name', 'balance'));
        return redirect()->route('accounts.index')->with('success', 'Account created successfully.');
    }

    public function edit($id)
{
    $account = Account::findOrFail($id);
    return view('accounts.edit', compact('account'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'balance' => 'required|numeric|min:0',
    ]);

    $account = Account::findOrFail($id);
    $account->update($request->only('name', 'balance'));

    return redirect()->route('accounts.index')->with('success', 'Account updated successfully.');
}

public function destroy($id)
{
    $account = Account::findOrFail($id);
    $account->delete();

    return redirect()->route('accounts.index')->with('success', 'Account deleted successfully.');
}

    public function create()
{
    return view('accounts.create');
}
}


