<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\ExpenseType;
use DB;
use PDF;

class ExpensesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        //$pdfview = $this->
        
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
        $expense->expense_type_id = $request->input('expenseType');
        $expense->note = $request->input('note');
        $employee->created_by = auth()->user()->id;
        $employee->modified_by = auth()->user()->id;

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
        $data = array();
        $expense = Expense::where('id',$id)->first();
        $expenseType = ExpenseType::where('id', $expense->expense_type_id)->first();
        $data = [
            'expense' => $expense,
            'expenseType' => $expenseType,
        ];
        return response()->json($data);
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
        $expense->expense_type_id = $request->input('expenseType');
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

    public function daterange(Request $request){
              
            if($request->ajax()){
                
                if($request->start_date != '' && $request->end_date != ''){
                    $data['expenses'] = DB::table('expenses')
                    ->whereBetween('date', array($request->start_date, $request->end_date))  
                    ->get();
                    // $expense_cat_id = array();
                    // for($count = 0; $count < count($data['expenses']); $count++){
                        
                    //     $expense_cat_id[] = $data['expenses'][$count]->expenseType_id;                      
                    //     //DB::table('expense_types')->where('id','=',$expense_cat_id)->get();
                    // }
                    // $data['expenseCat'] = ExpenseType::find($expense_cat_id);
                    
                    
                }elseif($request->cat_id != ''){

                    $data['expenses'] = Expense::where('expense_type_id', $request->cat_id)->get();
                    
                }else{
                    $data['expenses'] = Expense::orderBy('created_at', 'desc')->get();
                    
                }
                // if($request->has('download')){
                //     $pdf = PDF::loadView('index', $data);
                //     return $pdf->download('invoice.pdf');
                // }
            //$data['expenseType'] = ExpenseType::all();
            return response()->json($data);
                    
    }
}


        // public function downloadpdf(){
            
        //     $expenses = Expense::all();

        //     $pdf = PDF::loadView('expenses.pdf', compact('expenses'));
        //     return $pdf->download('invoice.pdf');
        // }
    

}