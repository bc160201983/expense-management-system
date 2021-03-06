<?php
use App\Expense;
use App\ExpenseType;
use App\User;
//use App\DB;

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
Route::get('/expenses/{id}', 'ExpensesController@show');
Route::post('expenses/upload-image', 'ExpensesController@UploadImage');

Route::resource('/employees', 'EmployeesController');
Route::post('employees/{id}', 'EmployeesController@show');
Route::get('/downloadpdf', 'ExpensesController@downloadpdf');
Route::resource('loan', 'LoanController');
Auth::routes();

Route::resource('users', 'UsersController');
Route::get('get-employee-data/{id}', 'LoanController@employeeData');
Route::post('expenses/genpdf', 'PdfController@genratePdf');
//Route::get('expenses/pdf','PdfController@showDataPdf');
// if(auth()->user()->role == 'user' && route('/user')){
//     redirect('dashboard');
// }

Route::get("ahmad", function(){

	$users = User::all();

	print_r($users);

});


//Route::post('/users/save', 'UsersController@saveUser');
// Route::get('test', function(){
//     $expenseTotalWeek = array();
//     $expenses = Expense::orderBy('date', 'ASC')->get();
	

// 	return $expenses;

    
// });

// Route::get('/test', function(){
//     $totalExpense = DB::table('expenses')->sum('amount');
//     $expensesToday = DB::table('expenses')->whereDate('date', date('Y-m-d'))->get();

//     return $expensesToday;
// });


//Route::get('/home', 'HomeController@index')->name('home');

// Route::get('mpdf1', function(){
//     $id = array(1, 2, 3);;
//     $data = array();
//     $total = 0;
//     $data = Expense::find($id);

//         foreach($data as $totalAmount){
//             $total += $totalAmount->amount; 
//         }
    
   

//     return response()->json([
//         'expenses' => $data,
//         'total' => $total,
//     ]);
// });
