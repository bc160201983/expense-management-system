<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ExpenseType;

class Expense extends Model
{


    protected $guarded = [];


    public function expenseType(){

        return $this->belongsTo(ExpenseType::class);
    }
}
