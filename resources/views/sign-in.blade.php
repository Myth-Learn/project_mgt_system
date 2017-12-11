<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>P-Hub | Online platform for peer to peer services as well as business needs</title>

	<link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
	<link href="img/favicon.png" rel="icon" type="image/png">
	<link href="img/favicon.ico" rel="shortcut icon">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<link rel="stylesheet" href="css/separate/pages/login.min.css">
    <link rel="stylesheet" href="css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <style type="text/css">
         .main-bg{background-image: url(img/lgn.jpg);
         background-position: center;background-size: cover;}
         </style>
</head>
<body>

    <div class="page-center main-bg">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                    <div class="sign-avatar">
                        <img src="img/avatar-sign.png" alt="">
                    </div>
                    <header class="sign-title">Sign In</header>
                    @if (session('Success'))
                        <p class="text-success"><strong>{{ session('Success') }}</strong></p>
                    @endif
                    @if (session('Warning'))
                        <p class="text-warning"><strong>{{ session('Warning') }}</strong></p>
                    @endif
                    <div class="form-group">
                        <input placeholder="E-Mail" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus/>
                        @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <input placeholder="Password" id="password" type="password" class="form-control" name="password" required/>
                        @if ($errors->has('password'))
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="checkbox float-left">
                            <input type="checkbox" id="signed-in" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="signed-in">Keep me signed in</label>
                        </div>
                        <div class="float-right reset">
                            <a href="{{ route('password.request') }}">Reset Password</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-rounded">Sign in</button>
                    <p class="sign-note">New to our website? <a href="{{ route('register') }}">Sign up</a></p>
                </form>
            </div>
        </div>
    </div><!--.page-center-->


<script src="js/lib/jquery/jquery-3.2.1.min.js"></script>
<script src="js/lib/popper/popper.min.js"></script>
<script src="js/lib/tether/tether.min.js"></script>
<script src="js/lib/bootstrap/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script type="text/javascript" src="js/lib/match-height/jquery.matchHeight.min.js"></script>
<script>
    $(function() {
        $('.page-center').matchHeight({
            target: $('html')
        });

        $(window).resize(function(){
            setTimeout(function(){
                $('.page-center').matchHeight({ remove: true });
                $('.page-center').matchHeight({
                    target: $('html')
                });
            },100);
        });
    });
</script>
<script src="js/app_delta.js"></script>
</body>
</html>