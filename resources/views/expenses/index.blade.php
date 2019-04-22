@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-lg">
            <a style="margin-bottom:5px;" class="au-btn au-btn-icon au-btn--blue" href="/expenses/create"><i class="zmdi zmdi-plus"></i>Add Expense</a>
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped">
                    <thead class="thead-dark">
                        <tr>
                            
                            <th>ID</th>
                            <th>name</th>
                            <th>Amount</th>
                            <th>Created At</th>
                            <th>Expense Category</th>
                            <th>Note</th>
                            <th></th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($expenses) > 0)
                            @foreach ($expenses as $expense)
                            <tr>
                            
                                    <td>{{$expense->id}}</td>
                                    <td>{{$expense->name}}</td>
                                    <td><strong>Rs.</strong> {{$expense->amount}}</td>
                                    <td>{{$expense->date}}</td>
        
                                    <td>
                                        @if (count($expensesType) > 0)
                                            @foreach ($expensesType as $expenseType)
                                                @if ($expense->expenseType_id == $expenseType->id)
                                                    {{$expenseType->title}}
                                                @endif        
                                            @endforeach
                                        @endif
                                        
                                    </td>

                                    <td>{{$expense->note}}</td>
                                    <td><a href="expenses/{{$expense->id}}/edit" class="btn btn-outline-secondary">Edit</a></td>
                                    <td>
                                        {!! Form::open(['action' => ['ExpensesController@destroy', $expense->id], 'method' => 'Post', 'class' => 'pull-left']) !!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!! Form::close() !!}
                                    </td>                                   
                                </tr>
                            @endforeach
                        
                        @endif
                        
                    
                     
                    </tbody>
                    <tfoot>
                            <tr>
                                <th></th>
                              <th id="total" colspan="1">Total :</th>
                              <td>
                                    <strong>Rs.</strong> {{$totalAmount}}
                                  
                                </td>
                            </tr>
                           </tfoot>
                </table>
            </div>
        </div>
     
    </div>
@endsection
