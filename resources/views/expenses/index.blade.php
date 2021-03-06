@extends('layouts.app')

@section('title', 'EMS | Expenses')

@section('content')

    
        <div class="col-lg"> 
            <a style="margin-bottom:5px;" class="au-btn au-btn-icon au-btn--blue" href="/expenses/create"><i class="zmdi zmdi-plus"></i>Add Expense</a>
 
            <div class="row form-group">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                
                    <div class="col-4">
                            <div class="input-group input-daterange">
                                    <input  type="text" name="start_date" id="start_date" readonly class="form-control" />
                                    <div class="input-group-addon">to</div>
                                    <input  type="text"  name="end_date" id="end_date" readonly class="form-control" />
                            </div>
                    </div>
                    <div class="col-4">
                    <button id="submit" class="btn btn-primary" type="submit" >Filter</button>
                    <button id="refresh" class="btn btn-primary" type="submit">Refresh</button>
                    </div>
                    <div class="col-4">
                            <select name="expenseType" id="cat_search" class="form-control" style="width:auto; float:left">
                                <option value="">~~Filter By Category~~</option>
                                @if (count($expensesType) > 0)
                                    @foreach ($expensesType as $expenseType)
                                        <option value="{{$expenseType->id}}">{{$expenseType->title}}</option>
                                    @endforeach
                                @endif
                          
                            </select>
                            <div class="dropdown show" style="float:right">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Export
                                    </a>
                                  
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                      <a class="dropdown-item" href="#">CSV</a>
                                      <a class="dropdown-item" id="pdfGen" href="#">PDF</a>
                                    </div>
                                  </div>
                        </div>
            </div>

            <div class="table-responsive table--no-card m-b-30">
                <table id="expense_table" class="table table-borderless table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>
                                
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="selectAll">
                                    <label class="form-check-label" for="selectAll">
                                      Select All
                                    </label>
                                  </div>
                                    
                                
                            </th>
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

                        @if (count($expenses) > 0)
                        @foreach ($expenses as $expense)
                        <tr>
                                <td>
                                        <div class="form-check">
                                                <input class="form-check-input checkbox" type="checkbox" value="{{$expense->id}}">
                                                <label class="form-check-label" for="defaultCheck1">
                                                  
                                                </label>
                                              </div>
                                </td>
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
    

    <script>
            $(document).ready(function(){
                $("#expense_table").DataTable();


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
                            //console.log(data);
                            var output ="";
                            var sumAmount = 0;
                            for(var count = 0; count < data.expenses.length; count++){
                                output += '<tr>';
                                output +='<td><div class="form-check"> <input class="form-check-input checkbox" type="checkbox" value="'+data.expenses[count].id+'"> <label class="form-check-label" for="defaultCheck1"> </label> </div></td>';
                                output += '<td>' + data.expenses[count].id + '</td>';
                                output += '<td>' + data.expenses[count].name + '</td>';
                                output += '<td>' + data.expenses[count].amount + '</td>';
                                output += '<td>' + data.expenses[count].date + '</td>';
                                output += '<td>' + data.expenses[count].note + '</td>';
                                output += '<td><button value="'+ data.expenses[count].id +'" class="bilal btn btn-outline-primary" data-toggle="modal" data-target="#smallmodal">View</button></td>';
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
                        dateRange(start_date, end_date, );
                    }else{
                        alert('Please select Date');
                    }
                });

            $('#refresh').click(function(){
                // $('#start_date').val('');
                // $('#end_date').val('');
                //dateRange();
                location.reload(true);
            });
// view data
        
        $('.viewData').click(function(){
            var expenses_id = $(this).val();
            //console.log(expenses_id);
            $.get('expenses/'+expenses_id,function(data){
                //console.log(data);
                var output = "";
                    output += '<ul class="list-group">';
                    output += '<li class="list-group-item"><strong>Name: </strong>'+data.expense.name+'</li>';
                    output += '<li class="list-group-item"><strong>Expense Amount: </strong>'+data.expense.amount+'</li>';
                    output += '<li class="list-group-item"><strong>Expense Date: </strong>'+data.expense.date+'</li>';
                    output += '<li class="list-group-item"><strong>Expense Category: </strong>'+data.expenseType.title+'</li>';
                    output += '<li class="list-group-item"><strong>Note: </strong>'+data.expense.note+'</li>';
                    // output += '<li class="list-group-item"><strong>Designation: </strong>'+data.delegation+'</li>';
                    // output += '<li class="list-group-item"><strong>Salary: </strong>'+data.salary+'</li>';
                    output +='</ul>';

                $('.modal-body').html(output);
            });
        });
        
        $('#selectAll').click(function(){
            
                if (this.checked) {
                
                    $('.checkbox').each(function(){
                        this.checked = true;
                    });
                    
                }else{
                    $('.checkbox').each(function(){
                        this.checked = false;
                        
                    });
                }
                
        });

        $('.checkbox').click(function(){
            // var not_all_checked = [];
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#selectAll').prop('checked',true);
            
        }else{
            $('#selectAll').prop('checked',false);
            //not_all_checked.push($('.checkbox:checked').val());
        }

            // console.log(not_all_checked);
        });

       $('#pdfGen').click(function(){
           //alert(getCheckedValues());
           var checkVal = getCheckedValues();
           //alert(checkVal);
            $.post('expenses/genpdf', {checkVal:checkVal}, function(data){
                
                //console.log(data);
                    
                var win = window.open('about:blank');
                win.document.open();
                win.document.write(data);
                //win.prin();
                win.document.close();

            });
       });

//ready function close
});

        
        // $('.bilal').click(function(){
        //     alert('Hello Bilal');
        // });

function getCheckedValues(){
    var checkArry = [];

    $('.checkbox:checked').each(function(){
        checkArry.push($(this).val());
    });

    var selected;
    selected = checkArry.join(',');
    if(selected.length > 0){
        return selected;
    }else{
        return "Please select some Check Box's";
    }

}


            
        </script>

@endsection
<!-- modal small -->
<div style="display:none" class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="smallmodalLabel">Employee Data</h5>
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