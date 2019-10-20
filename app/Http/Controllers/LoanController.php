<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Loan;
use Validator;

class LoanController extends Controller
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
        $employees = Employee::all();
        $loans = Loan::all();   
        return view('loan.index')->with('employees', $employees)->with('loans', $loans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'employee_id' => 'required',
            'loan_amount' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);



        $error_array = array();
        $success_output = '';

        if($validation->fails()){
            foreach($validation->messages()->getMessages() as $field_name => $messages){
                $error_array[] = $messages;
            }
        }else{
            $loan = new Loan();
                $loan->employee_id = $request->get('employee_id');
                $loan->loan_amount = $request->get('loan_amount');
                $loan->start_date = $request->get('start_date');
                $loan->end_date = $request->get('end_date');
                $loan->amount_returned = '0.00';
                if($request->get('note') != ""){
                    $loan->note = $request->get('note');
                }else{
                    $loan->note = null;
                }
                

            $loan->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
        }

        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function employeeData($id){
        $employee =  Employee::find($id);

        return response()->json($employee);
    }
}
