@extends('layouts.app')

@section('content')

    
        <div class="col-lg"> 
            <button style="margin-bottom:5px;" class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#smallmodal"><i class="zmdi zmdi-plus"></i>Add Loan</button>
 
            

            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped">
                    <thead class="thead-dark">
                        <tr>
                            
                            <th>ID</th>
                            <th>name</th>
                            <th>Amount</th>
                            <th>Created At</th>
                            <th>Note</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>

                        {{-- @if (count($expenses) > 0)
                        @foreach ($expenses as $expense)
                        <tr>
                        
                                <td id="expense_id">{{$expense->id}}</td>
                                <td id="expense_name">{{$expense->name}}</td>
                                <td><strong>Rs.</strong> {{$expense->amount}}</td>
                                <td>{{$expense->date}}</td>
                                <td>{{$expense->note}}</td>
                                <td><button value="{{$expense->id}}" class="viewData btn btn-outline-primary" data-toggle="modal" data-target="#smallmodal">View</button></td>
                                <td><a href="expenses/{{$expense->id}}/edit" class="btn btn-outline-secondary">Edit</a></td>
                                <td>
                                    {!! Form::open(['action' => ['ExpensesController@destroy', $expense->id], 'method' => 'Post', 'class' => 'pull-left', 'onclick' => 'return confirm("Are you sure?");']) !!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
                                    {!! Form::close() !!}
                                </td>                                   
                            </tr>
                        @endforeach
                    
                    @endif
                                     --}}
                    
                     
                    </tbody>
                    <tfoot>
                            {{-- <tr>
                                <th></th>
                              <th id="total" colspan="1">Total :</th>
                              <td id="totalAmount">
                                    <strong>Rs.</strong> {{$totalAmount}}
                                  
                                </td>
                            </tr> --}}
                           </tfoot>
                </table>
            </div>


        </div>
    

    <script>
                 
        </script>

@endsection
<!-- modal small -->
<div style="display:none" class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="smallmodalLabel">Add Loan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- end modal small -->