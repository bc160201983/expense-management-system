<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\ExpenseType;
use DB;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::orderBy('created_at', 'desc')->get();
        $totalAmount = DB::table('expenses')->sum('amount');
        $expensesType = ExpenseType::all();
        
        return view('expenses.index')->with('expenses', $expenses)->with('expensesType', $expensesType)->with('totalAmount' , $totalAmount);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $expensesType = ExpenseType::all();

        return view('expenses.create')->with('expensesType', $expensesType);

        
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
            'name' => 'required',
            'amount' => 'numeric',
            'date' => 'date',
            'note' => 'required',
            
        ]);


        $expense = new Expense;
        $expense->name = $request->input('name');
        $expense->amount = $request->input('amount');
        $expense->date = $request->input('date');
        $expense->expenseType_id = $request->input('expenseType');
        $expense->note = $request->input('note');

        $expense->save();

        return redirect('/expenses')->with('success', 'Expense Created');

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
        $expense = Expense::find($id);
        $expensesType = ExpenseType::all();

        return view('expenses.edit')->with('expense', $expense)->with('expensesType', $expensesType);
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
            'name' => 'required',
            'amount' => 'numeric',
            'date' => 'date',
            'note' => 'required',
            
        ]);


        $expense = Expense::find($id);
        $expense->name = $request->input('name');
        $expense->amount = $request->input('amount');
        $expense->date = $request->input('date');
        $expense->expenseType_id = $request->input('expenseType');
        $expense->note = $request->input('note');

        $expense->save();

        return redirect('/expenses')->with('success', 'Expense Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = Expense::find($id);
        $expense->delete();

        return redirect('/expenses')->with('success', 'Expense Deleted');
    }

    public function expensesBydate(Request $request){
              
            if($request->ajax()){
                if($request->input('start_date') == "" && $request->input('end_date') == ""){
                    $data = "Noting in request";
                }else{
                    $data = "Tere is a data";
                }
            }
            

            return response()->json($data);
        
       
                    
    }
}
