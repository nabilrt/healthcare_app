<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>

        <style>
            #customers {
              font-family: Arial, Helvetica, sans-serif;
              border-collapse: collapse;
              width: 100%;
            }

            #customers td, #customers th {
              border: 1px solid #ddd;
              padding: 8px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {background-color: #ddd;}

            #customers th {
              padding-top: 12px;
              padding-bottom: 12px;
              text-align: left;
              background-color: #5128cd;
              color: white;
            }
            </style>
</head>
<body>
<div class="container">

    <div style="text-align: center;">
        <h3>AS Health Care Systems</h3>
        <h4>Earning Report</h4>
        <small>Thanks for being with us</small><br>

    </div> <br>

    Seller Name :{{ $seller->seller_name }} <br> <br>


    <div class="table-wrap">

        <table id="customers">
            <tr>
            <th>Order ID</th>
            <th>Status</th>
            <th>Total Price</th>
            <th>Order Date</th>
            <th></th>

        </tr>
        @foreach($orders as $item)
        <tr>
        <td><br>{{ $item->order_id }}<br></td>
        <td>{{ $item->status  }}</td>
        <td>{{ $item->total_price ."$" }}</td>
        <td>{{ $item->order_date }}</td>
        <td></td>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Total</td>
            <td>{{ $amount."$" }}</td>
        </tr>

        </table> <br>
        </div>

</div>
</body>
</html>
