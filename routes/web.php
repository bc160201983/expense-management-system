<?php
use App\Expense;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/dashboard');
Route::get('/dashboard', 'SiteController@index');

Route::resource('/expensestype', 'ExpensesTypeController');
Route::resource('/expenses', 'ExpensesController');
Route::post('expenses/daterange', 'ExpensesController@daterange');

Route::get('test', function(){
    $expenses = Expense::all();
    return view('welcome')->with('expenses', $expenses);
}); 

// function(){

//     if(Request::ajax()){
//         $data = Request::all();
//         return Response::json($data);
//     }

// });