@extends('layouts.app')

@section('content')



        <div class="row ">          
            <div class="col-lg-6">
                <div class="card float-center">
                    <div class="card-header">Expense Category <span class="float-right"><a href="/expensestype" class="btn btn-outline-secondary btn-sm">Go Back</a><span></div>
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Add Expense Category</h3>
                        </div>
                        <hr>
                        {{ Form::open(['action' => ['ExpensesTypeController@update', $expenseType->id], 'method' => 'POST' , 'novalidate' => 'novalidate']) }}
                            <div class="form-group">
                                {{Form::label('Add', 'Add', ['class' => 'control-label mb-1'])}}
                                {{Form::text('title', $expenseType->title, ['class' => 'form-control', 'placeholder' => 'e.g Bills'])}}
                            </div>
                            {{Form::hidden('_method', 'PUT')}}
                            {{ Form::button('<i class="fa fa-save fa-lg"></i>&nbsp;Save', ['type' => 'submit', 'class' => 'btn btn-lg btn-info btn-block'] )  }}
       
                        {{ Form::close() }}
                    
                            
                    </div>
                </div>
            </div>
            
        </div>
  

@endsection