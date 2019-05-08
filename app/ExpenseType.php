<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseType extends Model
{
    protected $table = 'expense_types';
    protected $primaryKey = 'id';
    protected $filable = [
        'title'
    ];
    

    public function expenses(){
        return $this->hasMany('App\Expense');
    }
}
