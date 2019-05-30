@extends('layouts.app')
@section('title', 'EMS | Edit Expense')
@section('content')


    
        <div class="row">
            <div style="margin:auto" class="col-lg-8">
                    <div class="card">
                            <div class="card-header">
                                <strong>Expense Transaction<span class="float-right"><a href="/expenses" class="btn btn-outline-secondary btn-sm">Go Back</a><span></strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{action('ExpensesController@update', [$expense->id])}}" method="post" class="form-horizontal">
                                   {{ csrf_field() }}
                                   {{ method_field('PUT') }}
                                
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input value="{{$expense->name}}" type="text" id="text-input" name="name" placeholder="Name" class="form-control">
                                        
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Amount</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input value="{{$expense->amount}}" type="number" id="email-input" name="amount" placeholder="Enter Amount" class="form-control">
                                         
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="password-input" class=" form-control-label">Date</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                                <div class="input-group input-daterange">
                                                        <input value="{{$expense->date}}" type="text" name="date" id="date" readonly class="form-control" />
                                                </div>

                                        </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="select" class=" form-control-label">Expense Category</label>
                                            </div>
                                           
                                            <div class="col-12 col-md-9">
                                                <select name="expenseType" id="select" class="form-control">
                                                    <option value="">~~Select~~</option>
                                                    @if (count($expensesType) > 0)
                                                        @foreach ($expensesType as $expenseType)
                                                            @if ($expenseType->id == $expense->expenseType_id)
                                                                <option value="{{$expenseType->id}}" selected>{{$expenseType->title}}</option>
                                                            @else
                                                            <option value="{{$expenseType->id}}">{{$expenseType->title}}</option>
                                                            @endif                                                            
                                                        @endforeach
                                                    @endif
                                              
                                                </select>
                                            </div>
                                        </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="note" class=" form-control-label">Note</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="note" id="textarea-input" rows="5" placeholder="Content..." class="form-control">{{$expense->note}}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="card-footer">
                                
                                            <button id="click" type="submit" class="btn btn-primary btn-sm">
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
                var date = new Date();
                $('.input-daterange').datepicker({
                    todayBtn: 'linked',
                    format: 'yyyy-mm-dd',
                    todayHighlight: true,
                    setDate: 'today',
                    autoclose: true
            });
            });
                </script>
@endsection

