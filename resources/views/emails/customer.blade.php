<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1>
        {{$details['title']}}
    </h1>
    <a href="{{$details['message']}}" target="blank"><button type="button" class="btn btn-primary">Pay</button></a>
    <h2> URL for payment
        <p>
            {{$details['message']}}
    
        </p>
    </h2>
   
    
</body>
</html>