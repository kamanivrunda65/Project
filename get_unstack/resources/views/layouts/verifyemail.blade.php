<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GET - UNSTACK</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
    .btn-primary {
    color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
}
.btn {
    display: inline-block;
    margin-bottom: 0;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
</style>
<body>
        <h1>{{$passwordmailData['title']}}</h1>
        <br>
        <p>{{$passwordmailData['body']}}</p>

        <p>Please click the button below to verify your email address</p>
        <br>
        <a style="background-color: #371fea;color:#fff;padding:6px 12px;border-radius: 4px;border-color:#fff;" type="button" href="{{url('/')}}/resetpassword">Verify Email</a>
</body>
<script>
    function verifyemail(){
        var confirmemail = confirm('Do you want to reset your password?');
        if (confirmemail) {
            window.location.href = '/setting';
        }
    }
</script>
</html>