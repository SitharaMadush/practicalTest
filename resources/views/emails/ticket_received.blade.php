<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>We received your Support Ticket</title>
</head>
<body>
    <h3>{{ $data['title'] }}</h3>
    <p>{{ $data['body'] }}</p>
    <p>Your Ticket Reference Number: <b>{{ $data['ref_no'] }}</b></p>
    <p>Thanks!</p>
</body>
</html>