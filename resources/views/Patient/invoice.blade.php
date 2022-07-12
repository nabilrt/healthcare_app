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
        <h4>Invoice</h4>
        <small>Thanks for coming</small><br>

    </div> <br>

    Buyer Name :{{ $patient->patient_name }} <br><br>


    <div class="table-wrap">

        <table id="customers">
            <tr>
                <th>Medicine Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
                <th></th>

            </tr>
            @foreach($items as $item)
                <tr>
                    <td><br>{{ $item->item_name }}<br></td>
                    <td>{{ $item->item_quantity  }}</td>
                    <td>{{ $item->unit_price ."$" }}</td>
                    <td>{{ $item->total_price ."$" }}</td>
                    <td></td>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Total</td>
                <td>{{ $amount."$" }}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Discount</td>
                <td>{{ $discount ."%" }}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Grand Total</td>
                <td>{{ $after_discount."$" }}</td>
            </tr>
        </table> <br>
    </div>

</div>
</body>
</html>
