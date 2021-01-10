<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
<h1>{{$details['title']}}</h1>
<p>{{$details['body']}}</p>
<p>{{$details['message']}}</p>
<p>{{$details['dateTime']}}</p>
<p>Your Badge:</p>
<p>http://127.0.0.1:8000/generate-badge/{{encrypt($details['schedule_id'])}}</p>
<p>Thank you!</p>
</body>
</html>
