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
                    <form role="form" class="sign-box" method="POST" action="{{ route('user.verifyOTP.submit') }}">
                        {{ csrf_field() }}
                        <div class="form-group mbl-otp-p">
                            <p>P-HUB have sent you an OTP on <span class="user-mbl-dgt"><b>+91-{{ $phone_number }}</b></span> kindly enter the OTP to verify your mobile number.</p>
                        </div>
                        <input type="text" placeholder="4 Digit OTP" maxlength="4" name="otp" class="form-control" id="otp" required />
                        <br/>
                        <div class="form-group mbl-otp-p">
                            <p id="otp_30sec_mess">In case of any inconvenience you can EDIT your number or can RESEND OTP after 30 seconds. Till than Sit back & Relax! while we process your mobile number.</p>
                        </div>
                        <div class="clearfix">
                            <div class="pull-left">
                                <a href="/cancel-otp">
                                    <button type="button" class="otp_frm_btn btn-rounded btn btn-danger disabled" disabled>Edit</button>
                                </a>
                            </div>
                            <div class="pull-right">
                                <a href="/resend-otp">
                                    <button type="button" class="otp_frm_btn btn-rounded btn btn-primary disabled" disabled>Resend OTP</button>
                                </a>
                            </div>
                            <button type="submit" class="btn btn-rounded btn-success sign-up">Verify</button>
                        </div>
                    </form>
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
        setTimeout(function () { 
            $('.otp_frm_btn').removeClass('disabled').removeAttr("disabled");
            $('#otp_30sec_mess').remove();
        }, 30000);
      </script>
      <script src="js/app_delta.js"></script>
   </body>
</html>