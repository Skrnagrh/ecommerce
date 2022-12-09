<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Details</title>
</head>
<body>
    <h1>Order Details</h1>

  <table>
    <tr>
        <td><strong>Nama</strong></td>
        <td>:</td>
        <td>{{ $order->name }}</td>
    </tr>
    <tr>
        <td><strong>Phone</strong></td>
        <td>:</td>
        <td>{{ $order->phone }}</td>
    </tr>
    <tr>
        <td><strong>Address</strong></td>
        <td>:</td>
        <td>{{ $order->address }}</td>
    </tr>
  </table>
</body>
</html>