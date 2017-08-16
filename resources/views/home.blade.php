<!--
  Designed and Developed by GDG JSS Noida (http://gdgjss.in)
  For any Suggestions/Feedback please write to Himanshu Agrawal at himanshuagrawal1998@gmail.com
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">
    <title>Avatar~Zealicon'17</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('home.css')}}">
    <script type="text/javascript">
        if (window.location.hash && window.location.hash == '#_=_') {
            window.location.hash = '';
        }
    </script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-93796708-1', 'auto');
      ga('send', 'pageview');
    </script>
</head>
<body>
    <nav class="transparent">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">Zealicon'17</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="/policy">Terms & Conditions</a></li>
                <li><a href="/logout">Logout</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="/policy">Terms & Conditions</a></li>
                <li><a href="/logout" target="_blank"> Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="center">
                    <br><br>
                    <div class="">
                        <img src="{!! $base64 !!}" alt="Updated Profile Pic" width="300px;" height="300px;">
                    </div>

                    <form action="/post" method="post" id="form">
                        <input type="hidden" name="image" value="{{$base64}}">
                        <br><br>
                        {{ csrf_field() }}
                        <input type="image" src="{{asset('img/fb-share.png')}}" width="300px;" >
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    <script type="text/javascript">
        $(".button-collapse").sideNav();
    </script>
</body>
</html>