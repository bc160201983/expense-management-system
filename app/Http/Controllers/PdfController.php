<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;

class PdfController extends Controller
{
    public function showDataPdf(){

        //return view('pdf');
    }
    public function genratePdf(Request $request){
       
        $total = 0;
        //$totalAmount = DB::table('expenses')->sum('amount');
        if($request->ajax()){
            if($request->checkVal != ''){
                $expense_id =  explode(',',$request->checkVal);          
                $expenses = Expense::find($expense_id);
                foreach($expenses as $totalAmount){
                    $total += $totalAmount->amount; 
                }
            }else{
                $expenses = "No Request Fount";
            }
        }else{
            $expenses = "No data";
        }
        

       
        return view('pdf')->with('expenses', $expenses)->with('totalAmount', $total);
        

    // $expenses = Expense::all();
    // $fileName = 'new_file.pdf';
    // $mpdf = new \Mpdf\Mpdf();
    // $html = \View::make('pdf')->with('expenses', $expenses);
    // $html = $html->render();
    // $mpdf->WriteHTML($html);
    
    // $mpdf->Output($fileName, 'I');

        
    }
}
