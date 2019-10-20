@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

        <div class="col-lg"> 
            <button id="add_loan" style="margin-bottom:5px;" class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#smallmodal"><i class="zmdi zmdi-plus"></i>Add Loan</button>
 
            

            <div class="table-responsive table--no-card m-b-30">
                <table id="loan_table" class="table table-borderless table-striped">
                    <thead class="thead-dark">
                        <tr>
                            
                            <th>ID</th>
                            <th>name</th>
                            <th>Amount</th>
                            <th>Contract Date</th>
                            <th>Contract End-Date</th>
                            <th>Returned Amount</th>
                            <th>Note</th>
                            <th>Created At</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>

                            @if (count($loans))
                            @foreach ($loans as $loan)
                                <tr>
                                    <td>{{$loan->id}}</td>
                                    <td>{{$loan->employee_id}}</td>
                                    <td>{{$loan->loan_amount}}</td>
                                    <td>{{$loan->start_date}}</td>
                                    <td>{{$loan->end_date}}</td>
                                    <td>{{$loan->amount_returned}}</td>
                                    <td>{{$loan->note}}</td>
                                    <td>{{$loan->created_at}}</td>
                                </tr>
                                
                            @endforeach
                        @endif
                    
                     
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
        $(document).ready(function(){
            $("#loan_table").DataTable();

            date_style();

            $("#loanForm").unbind('submit').bind('submit', function(e){
                e.preventDefault();
                $('.text-danger').remove();
                $("#save_data").button("loading");

                    var employee_id = $("#employee").val();
                    var loan_amount = $("#amount").val();
                    var start_date = $("#date_start").val();
                    var end_date = $("#date_end").val();
                    var note = $("#detail").val()

                   

                    if(employee_id == "~~Select Employee~~"){
                        $("#employee").after("<p class='text-danger'>Please fill the required filed</p>");
                    }else{
                        $("#employee").find('.text-danger').remove();
                    }

                    if(isNaN(loan_amount) || loan_amount < 1 || loan_amount == ""){
                        $("#amount").after("<p class='text-danger'>Please fill the required filed</p>");
                    }else{
                        $("#amount").find('.text-danger').remove();
                    }

                    if(start_date == ""){
                        $("#date_start").after("<p class='text-danger'>Please fill the required filed</p>");
                    }else{
                        $("#date_start").find(".text-danger").remove();
                    }

                    if(end_date == ""){
                        $("#date_end").after("<p class='text-danger'>Please fill the required filed</p>");
                    }else{
                        $("#date_end").find(".text-danger").remove();
                    }

                    if(employee_id != "~~Select Employee~~" && loan_amount && start_date && end_date){
                        $.post("{{action('LoanController@store')}}",
                            {employee_id:employee_id, loan_amount:loan_amount, start_date:start_date, end_date:end_date, note:note},
                             function(data){
                                    console.log(data);
                             });
                    }

            });




            
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                    });


            $('#employee').change(function(){
                
                var emp_id = $('#employee').val();
                if(emp_id != "~~Select Employee~~"){
                    //console.log(emp_id);
                $.get('get-employee-data/'+emp_id, function(data){
                //console.log(data.salary);
                if(data != ''){
                    $('#salary').val("Rs. " + data.salary);
                }
            });

                }
                
            });

                //$('.datepicker').datepicker();
                $("#add_loan").on("click", function(){
                    $('#loanForm')[0].reset();

                    
                //     var loan_amount = $("#amount").val();
                //     var start_date = $("#date_start").val();
                //     var end_date = $("#date_end").val();
                //     console.log(loan_amount  + " " + start_date +" "+ end_date);
                    
                //     if(isNaN(loan_amount) || loan_amount < 1){
                //         $("#amount").after("<p class='text-danger'>Please fill the required filed</p>");
                        
                //     }else{
                //         $("#amount").find('.text-danger').remove();
                //         //alert(loan_amount);
                //}

                    

                    
                //         //alert(loan_amount);
                });

                
                
        });



       function date_style(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
                  var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                  var options={
                    format: 'yyyy-mm-dd',
                    container: container,
                    todayHighlight: true,
                    autoclose: true,
                  };
                  date_input.datepicker(options);
                  date_input.datepicker('setDate', 'today');
       } 
        
    </script>

@endsection
<!-- modal small -->
<div style="display:none" class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <form class="form-horizontal" id="loanForm">
            <div class="modal-content" style="width: 70%;">
                <div class="modal-header">
                    <h5 class="modal-title" id="smallmodalLabel">Add Loan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                        <div class="form-group">
                                <label for="employee">Select Loaner</label>
                                <select class="form-control employee" id="employee">
                                    <option>~~Select Employee~~</option>
                                    @if (count($employees))
                                        @foreach ($employees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                                        @endforeach    
                                    @endif
                                </select>                                
                              </div>
                              {{csrf_field()}}
                              <div class="form-group">
                                    <label for="salary">Employee Salary</label>
                                    <input id="salary" value="0.00" type="text" class="form-control" readonly>
                              </div>
                              
                                <div class="form-group">
                                        <label for="amount">Loan Amount</label>
                                        <input type="text" class="form-control" name="amount" id="amount" >
                                        
                                    </div>
                                    <div class="form-group">
                                            <label for="date_start">Loan Contract Date</label>
                                            <input type="text" class="form-control datepicker" name="date" id="date_start" required="" autocomplete="off">
                                            
                                        </div>
                                        <div class="form-group">
                                                <label for="date_end">Loan Contract End-Date</label>
                                                <input type="text" class="form-control datepicker" name="date" id="date_end" required="" autocomplete="off">
                                                
                                            </div>
                                            <div class="form-group">
                                                    <label for="date_end">Contract Detail (Optional)</label>
                                                    <textarea id="detail" name="detail" id="textarea-input" rows="3" placeholder="Content..." class="form-control"></textarea>
                                                    
                                                </div>

                </div>
                <div class="modal-footer">
                        <button data-loading-text="Loading..." type="submit" class="btn btn-secondary" id="save_data">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                </div>
            </div>
            <form> 
                {{-- form end --}}
        </div>
    </div>
    <!-- end modal small -->