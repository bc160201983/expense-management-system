@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-lg"> 
            <a style="margin-bottom:5px;" class="au-btn au-btn-icon au-btn--blue" href="/expenses/create"><i class="zmdi zmdi-plus"></i>Add Expense</a>
            
            <div class="row form-group">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                
                    <div class="col-5">
                            <div class="input-group input-daterange">
                                    <input value="Start Date" type="text" name="start_date" id="start_date" readonly class="form-control" />
                                    <div class="input-group-addon">to</div>
                                    <input value="End Date" type="text"  name="end_date" id="end_date" readonly class="form-control" />
                            </div>
                    </div>
                    
                    <button id="submit" class="btn btn-primary" type="submit" style="height: fit-content;margin-top: auto;">Search</button>
                    <button id="refresh" class="btn btn-primary" type="submit" style="height: fit-content;margin-top: auto;margin-left: 5px;">Refresh</button>
                    <div class="col-5">
                            <select name="expenseType" id="cat_search" class="form-control">
                                <option value="">~~Filer By Category~~</option>
                                @if (count($expensesType) > 0)
                                    @foreach ($expensesType as $expenseType)
                                        <option value="{{$expenseType->id}}">{{$expenseType->title}}</option>
                                    @endforeach
                                @endif
                          
                            </select>
                        
                        </div>
            </div>
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
                            
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($expenses) > 0)
                        @foreach ($expenses as $expense)
                        <tr>
                        
                                <td id="expense_id">{{$expense->id}}</td>
                                <td id="expense_name">{{$expense->name}}</td>
                                <td><strong>Rs.</strong> {{$expense->amount}}</td>
                                <td>{{$expense->date}}</td>
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
                              <td id="totalAmount">
                                    <strong>Rs.</strong> {{$totalAmount}}
                                  
                                </td>
                            </tr>
                           </tfoot>
                </table>
            </div>
        </div>
     
    </div>

    <script>
            $(document).ready(function(){
                var date = new Date();
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                    });

                $('.input-daterange').datepicker({
                    todayBtn: 'linked',
                    format: 'yyyy-mm-dd',
                    todayHighlight: true,
                    autoclose: true
                });
                
                function dateRange(start_date = '', end_date = '', cat_id = ''){
                        $.post('expenses/daterange', {start_date:start_date, end_date:end_date,cat_id:cat_id}, function(data){
                            //console.log(data.expenses[0]);
                            //for(var i = 0;)
                            console.log(data);
                            var output ="";
                            var sumAmount = 0;
                            for(var count = 0; count < data.expenses.length; count++){
                                output += '<tr>';
                                output += '<td>' + data.expenses[count].id + '</td>';
                                output += '<td>' + data.expenses[count].name + '</td>';
                                output += '<td>' + data.expenses[count].amount + '</td>';
                                output += '<td>' + data.expenses[count].date + '</td>';
                                output += '<td>' + data.expenses[count].note + '</td>';
                                output += "<td><a class='btn btn-outline-secondary' href='expenses/"+data.expenses[count].id+"/edit'>Edit</a></td>";
                                output += "<td><a class='btn btn-danger' href='#'>Delete</a></td>";
                                output +='</tr>';
                                sumAmount += data.expenses[count].amount;
                            }
                            //get_cat(data.expenseCat);
                            $('tbody').html(output);
                            $('#totalAmount').text(sumAmount);
                            
                            
                    });

                    }

                    
                    

                    $('#cat_search').change(function(){
                        var cat_id = $("#cat_search").val();
                        dateRange('', '', cat_id);
                        
                    });

                $('#submit').click(function(){

                    var start_date = $('#start_date').val();
                    var end_date = $('#end_date').val();
                    

                    if(start_date != '' && end_date != ''){
                        dateRange(start_date, end_date);
                    }else{
                        alert('Please select Date');
                    }
                });

            $('#refresh').click(function(){
                // $('#start_date').val('');
                // $('#end_date').val('');
                // dateRange();
                location.reload(true);
            });

        });

            

            
        </script>

@endsection
