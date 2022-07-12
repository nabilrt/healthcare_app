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
              background-color: #04AA6D;
              color: white;
            }
            </style>
</head>
<body>
<div class="container">

    <div style="text-align: center;">
        <h3>AS Health Care Systems</h3>
        <h4>Earning History</h4>
        <small>Thanks for your contribution</small><br>

    </div> <br>

    Name : Dr.{{ $doctor->doctor_name }} <br><br>
    Type : {{ $doctor->doctor_type }} <br><br>
    Email : {{ $doctor->doctor_email }} <br><br>

    Checkout your earnings. <br> <br>


    <div class="table-wrap">

        <table id="customers">
            <tr>
            <th>Payment ID</th>
            <th>Amount</th>
            <th>Appointment</th>
            <th>Patient ID</th>

        </tr>
        @foreach($payments as $payment)
        <tr>
        <td><br>{{ $payment->payment_id }}<br></td>
        <td>{{ $payment->paid_amount ."$" }}</td>
        <td>{{ $payment->appointment_id }}</td>
        <td>{{ $payment->patient_id }}</td>
        @endforeach
        </table> <br>
        </div>
        Total Earning : {{ $amount }}$ <br>

</div>
</body>
</html>
