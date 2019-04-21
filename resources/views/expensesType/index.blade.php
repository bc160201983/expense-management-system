@extends('layouts.app')

@section('content')


    
<div class="row">
        <div class="col-lg-9">
            <a style="margin-bottom:5px;" class="au-btn au-btn-icon au-btn--blue" href="/expensestype/create"><i class="zmdi zmdi-plus"></i>Add Expense Category</a>
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            
                            <th>ID</th>
                            <th>name</th>
                            <th>date</th>
                            <th></th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($expensesType) > 0)
                            @foreach ($expensesType as $expenseType)
                            <tr>
                            
                                    <td>{{$expenseType->id}}</td>
                                    <td>{{$expenseType->title}}</td>
                                    <td>{{$expenseType->created_at}}</td>
                                    <td><a href="expensestype/{{$expenseType->id}}/edit" class="btn btn-outline-secondary">Edit</a></td>
                                    <td>
                                        {!! Form::open(['action' => ['ExpensesTypeContoller@destroy', $expenseType->id], 'method' => 'Post', 'class' => 'pull-left']) !!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!! Form::close() !!}
                                    </td>                                   
                                </tr>
                            @endforeach
                        
                        @endif
                        
                    
                     
                    </tbody>
                </table>
            </div>
        </div>
     
    </div>
  

@endsection