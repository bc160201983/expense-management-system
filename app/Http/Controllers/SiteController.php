<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use DB;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        //$this->middleware('user');
    }
    public function index(){

        $totalExpense = DB::table('expenses')->sum('amount');
        $expensesToday = DB::table('expenses')->whereDate('date', date('Y-m-d'))->get();

        return view('dashboard.index')->with('totalExpense', $totalExpense)->with('expensesToday', $expensesToday);
    }

    

    // public function getAllSiteData(){
    //     $data = $this->index();

    //     return $data;
    // }


}
