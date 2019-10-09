<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>E-library</title>
    <style>
    html, body{
        font-family: 'Roboto', sans-serif;
        font-size: 12px;
    }
    .table>thead>tr>th {
        vertical-align: bottom;
        border-bottom: 2px solid #ddd;
    }
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
        padding: 8px;
        line-height: 1.42857143;
        vertical-align: top;
        border-top: 1px solid #ddd;
    }
    .table>tbody>tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }
    </style>
</head>

<body>

@yield('content')

</body>
</body>

</html>
