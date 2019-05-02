@extends('layouts.app')

@section('content')


    
        <div class="row">
            <div style="margin:auto" class="col-lg-8">
                    <div class="card">
                            <div class="card-header">
                                <strong>Add Employee<span class="float-right"><a href="/employees" class="btn btn-outline-secondary btn-sm">Go Back</a><span></strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{action('EmployeesController@store')}}" method="post" class="form-horizontal">
                                   {{ csrf_field() }}
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="name" placeholder="Name" class="form-control">
                                        
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Email</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="email" id="email-input" name="email" placeholder="Enter Email" class="form-control">
                                         
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="password-input" class=" form-control-label">Phone Number</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input id="cell" name="cell" class="form-control" placeholder="03xx-xxxxxxx" type="text">
                                            
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="password-input" class=" form-control-label">Date</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input id="date" name="date" class="form-control" placeholder="MM/DD/YYY" type="text">
                                            
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="password-input" class=" form-control-label">Designation</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input id="designation" name="designation" class="form-control" placeholder="H.R Manager" type="text">
                                            
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="password-input" class=" form-control-label">Salary</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input id="salary" name="salary" class="form-control" placeholder="e.g 1000" type="text">
                                            
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="card-footer">
                                
                                            <button id="submit" type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Submit
                                            </button>
            
                                        </div>
                                </form>
                            </div>
                            
                        </div>
            </div>
            
        </div>
  

        <script>
                $(document).ready(function(){
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
                })
            </script>

@endsection

