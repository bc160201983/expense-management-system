@extends('layouts.app')

@section('content')


    
<div class="row">
        <div class="col-lg-9">
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            
                            <th>ID</th>
                            <th>name</th>
                            <th>date</th>
                            <th>Action</th>
                            
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
                                </tr>
                            @endforeach
                        
                        @endif
                        
                    
                     
                    </tbody>
                </table>
            </div>
        </div>
     
    </div>
  

@endsection