<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $bills = $user->bills;
        return view('bills.index', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bill_name' => 'required',
            'frequency' => 'nullable',
            'due_date' => 'required|date',
            'amount' => 'required|numeric',
        ]);
        $user = Auth::user();
        $user->bills()->create($request->all());
        return redirect()->route('bills.index')->with('success', 'Bill created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bill $bill)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bill = Bill::find($id);
        return view('bills.edit', compact('bill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'bill_name' => 'sometimes',
            'frequency' => 'nullable',
            'due_date' => 'sometimes|date',
            'amount' => 'sometimes|numeric',
        ]);

        $bill = Bill::find($id);
        $bill->update($request->all());
        return redirect()->route('bills.index')->with('success', 'Bill updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bill = Bill::find($id);
        $bill->delete();
        return redirect()->route('bills.index')->with('success', 'Bill deleted successfully');
    }
}
