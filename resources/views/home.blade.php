<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <title>Zealicon</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body style="background-image: url(avatarbg.png); ">
    <!-- <div class="img-top"><img class="img-fluid" src="top.png"></div>
    <div class="img-logo"><img class="img-fluid" src="zealicon.png"></div>
    <div class="img-water"><img class="img-fluid" src="water.png"></div>
    <div class="img-date"><img class="img-fluid img-1" src="date.png"> <img class="img-fluid img-2" src="date-mobile.png"></div> -->
    <a href="/logout" target="_blank" style="color: #fff; text-decoration: none; margin-left: 20px;"> Logout</a>
    <div class="img-share" style="margin-left: 10%; margin-top: 10%; position: absolute;"><img src="{!! $base64 !!}"></div>
                    <form action="/post" method="post" id="form">
                        <input type="hidden" name="image" value="{{$base64}}">
                        <br><br>
                        {{ csrf_field() }}
                        <input class="img-share" type="image" src="{{asset('img/fb-share.png')}}" >
                    </form>    
</body>
</html>