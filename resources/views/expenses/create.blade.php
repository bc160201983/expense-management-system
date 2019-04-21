@extends('layouts.app')

@section('content')


    
        <div class="row">
            <div style="margin:auto" class="col-lg-8">
                    <div class="card">
                            <div class="card-header">
                                <strong>Expense Transaction</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{action('ExpensesController@store')}}" method="post" class="form-horizontal">
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
                                            <label for="email-input" class=" form-control-label">Amount</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" id="email-input" name="amount" placeholder="Enter Amount" class="form-control">
                                         
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="password-input" class=" form-control-label">Date</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="date" id="password-input" name="date" placeholder="date" class="form-control datepicker">
                                            
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
                                                            <option value="{{$expenseType->id}}">{{$expenseType->title}}</option>
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
                                            <textarea name="note" id="textarea-input" rows="5" placeholder="Content..." class="form-control"></textarea>
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
  

@endsection

<script>


</script>