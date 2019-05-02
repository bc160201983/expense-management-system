<?php
use App\Expense;
use App\ExpenseType;
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
//Route::get('/dashboard', 'SiteController@getAllSiteData');
Route::get('/dashboard/get-monthly-expense', 'ChartDataController@getAllExpenseData');



Route::resource('/expensestype', 'ExpensesTypeController');
Route::resource('/expenses', 'ExpensesController');
Route::post('expenses/daterange', 'ExpensesController@daterange');
Route::resource('/employees', 'EmployeesController');
Route::get('/downloadpdf', 'ExpensesController@downloadpdf');

// Route::get('/test', function(){
//     $totalExpense = DB::table('expenses')->sum('amount');
//     $expensesToday = DB::table('expenses')->whereDate('date', date('Y-m-d'))->get();

//     return $expensesToday;
// });