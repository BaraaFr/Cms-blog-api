<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        From:<h4>{{$data['name']}}</h4>
        Email:<strong>{{$data['email']}}</strong><br>
        Telephone:<strong>{{$data['tel']}}</strong>
    </head>
    <body>
        <br>
        <strong>About</strong>:{{$data['reason']}}
        <br>
        Content:
        <p>{{$data['message']}}</p>
    </body>
</html>