<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $accounts = $user->accounts;
        return view('accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'account_name' => 'required',
            'account_type' => 'required',
            'balance' => 'required|numeric',
        ]);
        $user = Auth::user();
        $user->accounts()->create($request->all());
        return redirect()->route('accounts.index')->with('success', 'Account created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $account = Account::find($id);
        return view('accounts.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $account = Account::find($id);
        return view('accounts.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'AccountName' => 'sometimes',
            'AccountType' => 'sometimes',
            'Balance' => 'sometimes|numeric',
        ]);

        $account = Account::find($id);
        $account->update($request->all());
        return redirect()->route('accounts.index')->with('success', 'Account updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $account = Account::find($id);
        $account->delete();
        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully');
    }
}
