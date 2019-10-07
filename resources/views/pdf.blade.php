<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Expenses Incoice</title>
    <!-- Jquery JS-->
<script src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('pdf/style.css') }}" media="all" />
  </head>
  <body>
    <main>
      {{-- <button onclick="myfunction()">Print</button> --}}
      <h1  class="clearfix"><small><span>DATE</span><br /><span class="todayDate"></span></small> Expense Invoice</h1>
      <table>
        <thead>
          <tr>
            <th class="service">Name</th>
            <th class="desc">Note</th>
            <th>Expense Category</th>
            <th>Date</th>
            <th>Amount</th>
          </tr>
        </thead>
        @if (count($expenses) > 0)
            @foreach ($expenses as $expense)
                <tr>
                    <td class="service">{{$expense->name}}</td>
                    <td class="desc">{{$expense->note}}</td>
                    <td class="unit">{{$expense->expense_type->title}}</td>
                    <td class="qty">{{$expense->created_at}}</td>
                    <td class="total"><strong>Rs.</strong>{{$expense->amount}}</td>
                </tr>
            @endforeach
            
        @endif
        <tbody>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            
            <td class="grand total">Rs. {{$totalAmount}}</td>
          </tr>
        </tbody>
      </table>
    </main>

<script>
    $(document).ready(function(){
        var date = new Date();
        const monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
        var strDate = monthNames[date.getMonth()] + " " + (date.getDate()) + "," + date.getFullYear();

        $('.todayDate').text(strDate);
        console.log(strDate);
    });

    
</script>

  </body>
</html>