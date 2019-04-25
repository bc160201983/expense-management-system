<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\ExpenseType;
use DB;

class ChartDataController extends Controller
{
    public function getAllMonths(){
        $month_array = array();
        $expensesTotalMonth = Expense::orderBy('date', 'ASC')->get();
        $expensesTotalMonth = json_decode($expensesTotalMonth);

        if(!empty($expensesTotalMonth))
         {
             foreach($expensesTotalMonth as $unformatted_date)
             {
                $date = new \DateTime($unformatted_date->date);
                $month_no = $date->format('m');
                $month_name = $date->format('M');
                $month_array[$month_no] = $month_name;
                
             }

         }   
         return $month_array;
    }

    public function getMonthlyExpenseSum($month)
    {
        $monthly_expense_total = DB::table('expenses')->whereMonth('date', $month)->sum('amount');
        return $monthly_expense_total;
    }

    public function getAllExpenseData()
    {
        
        $monthly_expense_sum_array = array();
        $month_array = $this->getAllMonths();
        $month_name_array = array();
        if(!empty($month_array))
        {
            foreach($month_array as $month_no => $month_name)
            {
                $monthly_expense_sum = $this->getMonthlyExpenseSum($month_no);
                array_push($monthly_expense_sum_array, $monthly_expense_sum);
                array_push($month_name_array, $month_name);
            }
        }

        // return $month_array = $this->getAllMonths();
        // return $monthly_expense_sum_array;
        $max_no = max($monthly_expense_sum_array);
        $monthly_expense_data_array = array(
            'months' => $month_name_array,
            'months_expense_sum' => $monthly_expense_sum_array,
            'max' => $max_no,
        );

        return response()->json($monthly_expense_data_array);

    }

}
