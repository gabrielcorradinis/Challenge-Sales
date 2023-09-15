<!DOCTYPE html>
<html>
<head>
    <title>Daily Sales Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            background-color: #007BFF;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Daily Sales Report</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Seller Name</th>
                <th>Seller Email</th>
                <th>Amount</th>
                <th>Commission</th>
                <th>Date of sale</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->seller->name }}</td>
                    <td>{{ $sale->seller->email }}</td>
                    <td>R$ {{ $sale->amount }}</td>
                    <td>R$ {{ $sale->commission }}</td>
                    <td>{{ $sale->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

{{-- 
<!DOCTYPE html>
<html>
<head>
    <title>Daily Sales Report</title>
</head>
<body>
    <h1>Daily Sales Report</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Amount</th>
                <th>Commission</th>
                <th>Date of sale</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->seller->name }}</td>
                    <td>{{ $sale->seller->email }}</td>
                    <td>R$ {{ $sale->amount }}</td>
                    <td>R$ {{ $sale->commission }}</td>
                    <td>{{ $sale->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> --}}
