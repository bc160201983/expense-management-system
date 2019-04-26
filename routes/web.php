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
Route::get('/expenses/pdfview', 'ExpensesController@pdfview');
Route::resource('/employees', 'EmployeesController');


// Route::get('test', function(){
//     $id = [1, 3];
//     $expenses['expenses'] = Expense::find($id);
    
//     for($count = 0; $count < count($expenses['expenses']); $count++){
//         $expense_cat_id = $expenses['expenses'][$count]->expenseType_id;
//         echo "<hr>";
//         echo $expenseCat['expenseCat'] = ExpenseType::find($expense_cat_id);
//     }

    
//     //echo count($expenses['expenses']);
   
// }); 

// function(){

//     if(Request::ajax()){
//         $data = Request::all();
//         return Response::json($data);
//     }

// });