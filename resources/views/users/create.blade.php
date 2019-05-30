@extends('layouts.app')
@section('title', 'EMS | Create Expense')
@section('content')
{{-- //<meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    
        <div class="row">
            <div class="col-lg-8">
                    <div class="card">
                            <div class="card-header">
                                <strong>Add New User<span class="float-right"><a href="/users" class="btn btn-outline-secondary btn-sm">Go Back</a><span></strong>
                            </div>
                            <div class="card-body card-block">

                                <form action="{{action('UsersController@store')}}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Name</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="name" name="name" placeholder="Name" class="form-control">
                                                    
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="email-input" class=" form-control-label">Email</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control">
                                                     
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="password-input" class=" form-control-label">Password</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input id="password" name="password" class="form-control" placeholder="Enter password" type="password">
                                                        
                                                    </div>
                                                </div>
                                               
                                                <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="select" class=" form-control-label">Role</label>
                                                        </div>
                                                       
                                                        <div class="col-12 col-md-9">
                                                            <select name="role" id="role" class="form-control">
                                                                <option value="">~~Select~~</option>                                               
                                                                    <option value="admin">Admin</option>
                                                                    <option value="user">User</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                               
                                                    {{-- image area --}}
            
                                            
                                        {{-- image area --}}
                            
                                    
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
  
@endsection

