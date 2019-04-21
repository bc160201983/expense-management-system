@extends('layouts.app')

@section('content')


    
        <div class="row ">
            <div class="col-lg-6">
                <div class="card float-center">
                    <div class="card-header">Expense<span class="float-right"><a href="/expenses" class="btn btn-outline-secondary btn-sm">Go Back</a><span></div>
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Add Expense</h3>
                        </div>
                        <hr>
                        {{ Form::open(['action' => 'ExpensesController@store', 'method' => 'POST' , 'novalidate' => 'novalidate']) }}
                            <div class="form-group">
                                {{Form::label('Add', 'Add', ['class' => 'control-label mb-1'])}}
                                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'e.g Bills'])}}
                            </div>
                            {{ Form::button('<i class="fa fa-save fa-lg"></i>&nbsp;Save', ['type' => 'submit', 'class' => 'btn btn-lg btn-info btn-block'] )  }}
                            
                        {{ Form::close() }}
                    
                            
                    </div>
                </div>
            </div>
            
        </div>
  

@endsection