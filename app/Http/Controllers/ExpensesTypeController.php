<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExpenseType;

class ExpensesTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        //$this->middleware('user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expensesType = ExpenseType::orderBy('created_at', 'desc')->get();

        return view('expensesType.index')->with('expensesType', $expensesType);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expensesType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        
        $expenseType = new ExpenseType;

        $expenseType->title = $request->input('title');
        $expenseType->created_by = auth()->user()->id;
        $expenseType->modified_by = auth()->user()->id;
        $expenseType->save();

        return redirect('/expensestype')->with('success', 'Expense Type Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $expenseType = ExpenseType::find($id);

        return view('expensesType.edit')->with('expenseType' , $expenseType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        
        $expenseType = ExpenseType::find($id);

        $expenseType->title = $request->input('title');
        $expenseType->modified_by = auth()->user()->id;
        $expenseType->save();

        return redirect('/expensestype')->with('success', 'Expense Type Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expenseType = ExpenseType::find($id);
        $expenseType->delete();

        return redirect('/expensestype')->with('success', 'Expense Type Deleted');
    }
}
