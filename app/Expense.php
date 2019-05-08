<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ExpenseType;

class Expense extends Model
{

    protected $table = 'expenses';
    protected $primaryKey = 'id';
    // protected $guarded = [];

    protected $filable = [
        'name',
        'amount',
        'date',
        'expense_type_id',
        'note'
    ];

    public function expense_type(){
        return $this->belongsTo('App\ExpenseType');
    }


    
}
