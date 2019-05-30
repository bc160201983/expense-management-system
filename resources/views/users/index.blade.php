@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
    
        <div class="col-lg"> 
            <a href="{{url('users/create')}}" style="margin-bottom:5px;" class="au-btn au-btn-icon au-btn--blue"><i class="zmdi zmdi-plus"></i>Add User</a>
 
            

            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped">
                    <thead class="thead-dark">
                        <tr>
                            
                            <th>ID</th>
                            <th>name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($users) > 0)
                        @foreach ($users as $user)
                        <tr>
                        
                                <td id="expense_id">{{$user->id}}</td>
                                <td id="expense_name">{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>
                                {{-- <select id="select" class="form-control">
                                    <option value="">~~Select Role~~</option>
                                    <option value="admin" selected>{{$user->role}}</option>
                                    <option value="user" selected>{{$user->role}}</option>
                                </select> --}}
                                <td>{{$user->created_at}}</td>
                                {{-- <td><button value="{{$user->id}}" class="viewData btn btn-outline-primary" data-toggle="modal" data-target="#smallmodal">View</button></td> --}}
                                <td><a href="users/{{$user->id}}/edit" class="btn btn-outline-secondary">Edit</a></td>
                                <td>
                                    {!! Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'Post', 'class' => 'pull-left', 'onclick' => 'return confirm("Are you sure?");']) !!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
                                    {!! Form::close() !!}
                                </td>                                   
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
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                    });

                    $('#submit').click(function(){
                        var name = $('#name').val();
                        var email = $('#email').val();
                        var password = $('#password').val();
                        var role = $('#role').val();
                        //alert(name);
                        //console.log(name + email + password + role);

                    $.post("{{url('users')}}", {name:name, email:email, password:password, role:role}, function(data){
                        console.log(data);
                        // if(data.errors){
                        //     $('.alert-danger').html('');
                            
                        //     jQuery.each(data.errors, function(key, value){
                  		// 	jQuery('.alert-danger').show();
                  		// 	jQuery('.alert-danger').append('<li>'+value+'</li>');
                  		// });

                        // }else{
                        //     jQuery('.alert-danger').hide();
                        //     $('#open').hide();
                        //     $('#myModal').modal('hide');
                        // }

                       
                    });
                });


                    
              });  
    </script>

@endsection
<!-- modal small -->
<div style="display:none" class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    <div class="alert alert-danger" style="display:none"></div>
                <div class="modal-header">
                    <h5 class="modal-title" id="smallmodalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="card-body card-block">
                                <form action="{{url('users')}}" method="post" class="form-horizontal">
                                   
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

                                </form>
                            </div>

                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="submit" type="submit" class="btn btn-primary">Save</button>
                </div>
                
            </div>
        </div>
    </div>
    <!-- end modal small -->