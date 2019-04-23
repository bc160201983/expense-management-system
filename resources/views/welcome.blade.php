<table class="table table-borderless table-striped">
                    <thead class="thead-dark">
                        <tr>
                            
                            <th>ID</th>
                            <th>name</th>
                            <th>Amount</th>
                            <th>Created At</th>
                            <th>Expense Category</th>
                            <th>Note</th>
                            <th></th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>
@if (count($expenses) > 0)
                            @foreach ($expenses as $expense)
                            <tr>
                            
                                    <td>{{$expense->id}}</td>
                                    <td id="name">{{$expense->name}}</td>
                                    <td><strong>Rs.</strong> {{$expense->amount}}</td>
                                    <td>{{$expense->date}}</td>
        
                                    <td>
                                        {{-- @if (count($expensesType) > 0)
                                            @foreach ($expensesType as $expenseType)
                                                @if ($expense->expenseType_id == $expenseType->id)
                                                    {{$expenseType->title}}
                                                @endif        
                                            @endforeach
                                        @endif --}}
                                        {{$expense->expensetype}}
                                    </td>

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
</table>