@extends('layouts.app')

@section('content')
<div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Employees</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected">Today</option>
                                                <option value="">3 Days</option>
                                                <option value="">1 Week</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a href='employees/create' class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add Employee</a>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                            <select class="js-select2" name="type">
                                                <option selected="selected">Export</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </th>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>Phone Number</th>
                                                <th>date</th>
                                                <th>Delegation</th>
                                                <th>Salary</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($employees) > 0)
                                                @foreach ($employees as $employee)
                                                <tr class="tr-shadow">
                                                        <td>
                                                                <label class="au-checkbox">
                                                                    <input type="checkbox">
                                                                    <span class="au-checkmark"></span>
                                                                </label>
                                                           
                                                            </td>
                                                    <td>{{$employee->name}}</td>
                                                    <td>{{$employee->email}}</td>
                                                    <td>{{$employee->number}}</td>
                                                    <td>{{$employee->date}}</td>
                                                    <td>{{$employee->delegation}}</td>
                                                    <td>{{$employee->salary}}</td>
                                                    <td>
                                                            <div class="table-data-feature">
                                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                                    <i class="zmdi zmdi-mail-send"></i>
                                                                </button>
                                                                <a href="/employees/{{$employee->id}}/edit" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                    <i class="zmdi zmdi-edit"></i>
                                                                </a>
                                                                {!! Form::open(['action' => ['EmployeesController@destroy', $employee->id], 'method' => 'Post', 'class' => 'pull-left']) !!}
                                                                        {{Form::hidden('_method', 'DELETE')}}
                                                                        <button type="submit" class="item" data-toggle="tooltip" data-placement="top" title="Delete"><i class="zmdi zmdi-delete"></i></button>
                                                                {!! Form::close() !!}                                                           
                                                                <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                                    <i class="zmdi zmdi-more"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                </tr>
                                                @endforeach
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                        
                            </div>
                        </div>

@endsection
