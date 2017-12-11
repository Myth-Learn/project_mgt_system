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
         .main-bg{background-image: url(img/signup.jpg);
         background-position: center;background-size: cover;}
         button.social-signin.facebook {
         background: #32508E;
         }
         button.social-signin:active {
         box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
         transition: 0.2s ease;
         }
         button.social-signin:hover, button.social-signin:focus {
         box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
         transition: 0.2s ease;
         }
         button.social-signin {
         margin-bottom: 20px;
         width: 220px;
         height: 36px;
         border: none;
         border-radius: 2px;
         color: #FFF;
         font-family: 'Roboto', sans-serif;
         font-weight: 500;
         transition: 0.2s ease;
         cursor: pointer;
         }
         button.social-signin.google {
         background: #DD4B39;
         }
         .mrgn-btm15{margin-bottom: 15px;}
         .top-heading h1 {
    color: #fff;
    font-size: 30px;
    font-weight: 100;
}
.top-heading {
    padding: 30px 80px 30px 80px;
}
.top-heading h4 {
    color: #fff;
}
.upr-img img {
    width: 70px;
    margin: 25px;
}
.blw-txt p {
    color: #fff;
    font-size: 22px;
    font-weight: 300;
}
.signup-salient-ftr {
    color: #fff;
    border: 1px solid rgba(255,255,255,0.2);
    padding: 20px;
}
.pd20{padding: 20px;}
      </style>
   </head>
   <body>
      <div class="page-center main-bg">
         <div class="page-center-in">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="text-center pd20">
                            <div class="top-heading">
                                <h4>Welcome to P-Hub</h4>
                                <h1><strong>Communicate</strong>, <strong>Collaborate</strong>, and <strong>Reach consensus</strong>. <br/>Use <em>P-Hub</em> to keep up with your team, no matter where you are.</h1>
                            </div>
                            <div class="signup-salient-ftr">
                                <h4>Yes this is what makes us different</h4>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="upr-img">
                                            <img src="img/store.png">
                                        </div>
                                        <div class="blw-txt">
                                            <p>Unlimited <br/>Storage </p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="upr-img">
                                            <img src="img/folder1.png">
                                        </div>
                                        <div class="blw-txt">
                                            <p>Doc Multiple <br/>Projects</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="upr-img">
                                            <img src="img/usr.png">
                                        </div>
                                        <div class="blw-txt">
                                            <p>Verified <br/>Users</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="upr-img">
                                            <img src="img/stats.png">
                                        </div>
                                        <div class="blw-txt">
                                            <p>Overall <br/>Statistics</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                    @if (empty($phone_number))
                        <form class="sign-box" method="POST" action="{{ route('user.phonenumber.submit') }}">
                            {{ csrf_field() }}
                            <header class="sign-title">Sign Up</header>
                            <div class="text-center">
                                <div class="text-center mrgn-btm15">
                                    <label>Are you Social! <br/>Sign-up with any social accounts</label>
                                </div>
                                <a href="{{ url('auth/facebook') }}"> 
                                    <button type="button" class="social-signin facebook">Sign-up with Facebook</button>
                                </a>
                                <a href="{{ url('auth/google') }}">
                                    <button type="button" class="social-signin google">Sign-up with Google+</button>
                                </a>
                            </div>
                            <div class="text-center mrgn-btm15">
                                <label>Or try this</label>
                            </div>
                            @if (session('Success'))
                                <p class="text-success"><strong>{{ session('Success') }}</strong></p>
                            @endif
                            <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                <input placeholder="Mobile" id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required />
                                @if ($errors->has('phone_number'))
                                    <p class="text-danger">{{ $errors->first('phone_number') }}</p>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-rounded btn-success sign-up">Send OTP</button>
                            <p class="sign-note">Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
                        </form>
                    @else
                        <form class="sign-box" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <header class="sign-title">Sign Up</header>
                            <div class="form-group">
                                @if (Session::has('userName'))
                                    <input id="name" type="text" placeholder="Name" class="form-control" name="name" value="{{ Session::get('userName') }}" readonly autofocus />                            
                                @else
                                    <input id="name" type="text" placeholder="Name" class="form-control" name="name" value="{{ old('name') }}" required autofocus />
                                @endif                            
                                @if ($errors->has('name'))
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                @if (Session::has('userEmail'))
                                    <input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ Session::get('userEmail') }}" readonly />                            
                                @else
                                    <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required />
                                @endif
                                @if ($errors->has('email'))
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                @if (Session::has('phone_number'))
                                    <input id="phone_number" type="text" placeholder="Mobile" class="form-control" name="phone_number" value="{{  Session::get('phone_number') }}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10" readonly />
                                @else
                                    <input id="phone_number" type="text" placeholder="Mobile" class="form-control" name="phone_number" value="{{ old('phone_number') }}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10" required />
                                @endif
                                @if ($errors->has('phone_number'))
                                    <p class="text-danger">{{ $errors->first('phone_number') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <select id="user_role" name="user_role" class="form-control" required>
                                    <option value="" selected="true" disabled="disabled">-- Select a Role --</option>
                                    @foreach($roles as $role) 
                                        @if ($role->id != 1)
                                            <option value="{{ $role->id }}">{{ strtoupper(str_replace("_"," ",$role->role)) }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('user_role'))
                                    <p class="text-danger">{{ $errors->first('user_role') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <select id="country_code" name="country_code" class="form-control" required>
                                    <option value="" selected="true" disabled="disabled">-- Select a Country --</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->code }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('country_code'))
                                    <p class="text-danger">{{ $errors->first('country_code') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <select id="city" name="city" class="form-control" required>
                                    <option value="" selected="true" disabled="disabled">-- Select a City --</option>
                                </select>
                                @if ($errors->has('city'))
                                    <p class="text-danger">{{ $errors->first('city') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control" placeholder="Password" name="password" required />
                                @if ($errors->has('password'))
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required />
                            </div>
                            @if (Session::has('provider') && Session::has('providerID'))
                                <input id="provider" type="hidden" name="provider" value="{{ Session::get('provider') }}" />
                                <input id="provider_id" type="hidden" name="provider_id" value="{{ Session::get('providerID') }}" />                        
                            @endif        
                        <button type="submit" class="btn btn-rounded btn-success sign-up">Register</button>
                    </form>
                @endif
                    </div>
                </div>
            </div>
         </div>
      </div>
      <!--.page-center-->
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
        $('#country_code').change(function(e) {
            var country_code = e.target.value;
            $.get('/country/cities?country_code=' + country_code, function(data) {
                $('#city').empty();
                //var option = $("<option></option>").attr('selected', true).attr('disabled','disabled').attr("value", '').text('-- Select a City --');
                $.each(data, function(key, value) {
                    var option = $("<option></option>").attr("value", value).text(value);
                    $('#city').append(option);
                });        
            });
        });
      </script>
      <script src="js/app_delta.js"></script>
   </body>
</html>