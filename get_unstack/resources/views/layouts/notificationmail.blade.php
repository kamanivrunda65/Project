<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GET - UNSTACK</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
        <h1>{{$nmaildata['title']}}</h1>
        <br>
        <p>{{$nmaildata['body']}}</p>

        <p>Check Your Profile</p>
        <br>
        {{-- Code : {{$passwordmailData['token']}} --}}
        <a  href="{{url('/')}}/notification">{{$nmaildata['msg']}}</a>
</body>

</html>