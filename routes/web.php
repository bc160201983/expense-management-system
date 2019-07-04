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
Route::get('/expenses/{id}', 'ExpensesController@show');
Route::post('expenses/upload-image', 'ExpensesController@UploadImage');

Route::resource('/employees', 'EmployeesController');
Route::post('employees/{id}', 'EmployeesController@show');
Route::get('/downloadpdf', 'ExpensesController@downloadpdf');
Route::resource('loan', 'LoanController');
Auth::routes(['register' => false]);

Route::resource('users', 'UsersController');
Route::get('get-employee-data/{id}', 'LoanController@employeeData');

// if(auth()->user()->role == 'user' && route('/user')){
//     redirect('dashboard');
// }


//Route::post('/users/save', 'UsersController@saveUser');
// Route::get('test', function(){
//     $expenseTotalWeek = array();
//     $expenses = Expense::orderBy('date', 'ASC')->get();
//     $expenses = json_decode($expenses);

//     foreach($expenses as $unformatted_date)
//              {
//                 $date = new \DateTime($unformatted_date->date);
//                 $week_no = $date->format('d');
//                 $week_name = $date->format('D');
//                 $expenseTotalWeek[$week_no] = $week_name;
                
//              }

//     return $expenseTotalWeek;
// });

// Route::get('/test', function(){
//     $totalExpense = DB::table('expenses')->sum('amount');
//     $expensesToday = DB::table('expenses')->whereDate('date', date('Y-m-d'))->get();

//     return $expensesToday;
// });


//Route::get('/home', 'HomeController@index')->name('home');
