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
    <p>Your Ticket has received a response from our staff:</p>
    <h5>Ticket Reference Number: {{ $data['ref_no'] }}</h5>
    <h4>
        Our Response:
    </h4>
    <p>{{ $data['reply'] }}</p>
    <p>Thanks!</p>
</body>
</html>