<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>Admin Login</title>

        <!-- Bootstrap CSS -->
        <link href="{{URL::to('public/admin_assets/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="{{URL::to('public/admin_assets/css/bootstrap-theme.css')}}" rel="stylesheet">
        <!--external css-->
        <!-- font icon -->
        <link href="{{URL::to('public/admin_assets/css/elegant-icons-style.css')}}" rel="stylesheet" />
        <link href="{{URL::to('public/admin_assets/css/font-awesome.css')}}" rel="stylesheet" />
        <!-- Custom styles -->
        <link href="{{URL::to('public/admin_assets/css/style.css')}}" rel="stylesheet">
        <link href="{{URL::to('public/admin_assets/css/style-responsive.css')}}" rel="stylesheet" />

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="login-img3-body">

        <div class="container">

            <form class="login-form" action="{{ URL::to('/admin_login_check')}}" method="POST">
            {{ csrf_field() }}

            <div class="login-wrap">
                <h4 style="color:red;">
                    <?php
$exception = Session::get('exception');

if ($exception) {
	echo $exception;
	Session::put('exception', null);
}
?>
                </h4>
                <h4 style="color:green;">
                    <?php
$message = Session::get('message');

if ($message) {
	echo $message;
	Session::put('message', null);
}
?>
                </h4>
                <h3 class="text-info" style="font-weight: bolder">Login to your account</h3>

                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_profile"></i></span>
                    <input type="text" class="form-control" name="admin_email_address" placeholder="Email" required="1">
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    <input type="password" class="form-control" name="admin_password" placeholder="Password" required="1">
                </div>
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> Remember me
                    <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
                </label>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

            </div>
            </form>



        </div>


    </body>
</html>
