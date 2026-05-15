<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body { font-family: Arial; background: #f3f4f6; }
        .container { padding: 20px; }
        .card {
            display: inline-block;
            background: white;
            padding: 20px;
            margin: 10px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            width: 200px;
            text-align: center;
        }
        h1 { margin-bottom: 20px; }
        .number { font-size: 30px; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h1>Admin Dashboard</h1>

    <div class="card">
        <h3>Total Lapangan</h3>
        <div class="number">{{ $totalFields }}</div>
    </div>

    <div class="card">
        <h3>Total Booking</h3>
        <div class="number">{{ $totalBookings }}</div>
    </div>

</div>

</body>
</html>