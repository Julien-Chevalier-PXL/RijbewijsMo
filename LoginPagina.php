<?php
/**
 * Created by PhpStorm.
 * User: mo-bo_000
 * Date: 04/04/2017
 * Time: 14:20
 */


session_start();
//connect to database
//$db=mysqli_connect("localhost","root","","mi4rijbewijs");
$db = mysqli_connect("localhost", "id993722_mohamedbouzouf", "rijbewijs", "id993722_mi4rijbewijs");

if (isset($_GET['login_btn'])) {
    //$username=mysql_real_escape_string($_POST['username']);
    // $password=mysql_real_escape_string($_POST['password']);
    $username = $_GET['username'];
    $password = $_GET['password'];
    $password = md5($password); //Remember we hashed password before storing last time
    $sql = "SELECT * FROM gebruikers WHERe username='$username'";
    $result = mysqli_query($db, $sql);
    $result = mysqli_fetch_assoc($result);
    if ($result['Paswoord'] == $Paswoord) {
        $_SESSION['message'] = "You are now Loggged In";
        $_SESSION['username'] = $username;
        header("location:WelkomPagina.html");
    } else {
        $_SESSION['message'] = "username and password combiation incorrect";
    }
}

if (isset($_SESSION['message'])) {
    echo "<div id='error_msg'>" . $_SESSION['message'] . "</div>";
    unset($_SESSION['message']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>LoginPagina</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="../Script/jquery-3.2.1.min.js"></script>
    <link rel="manifest" href="manifest.json"/>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body, h1, h2, h3, h4, h5, h6 {
            font-family: "Montserrat", sans-serif
        }

        .w3-row-padding img {
            margin-bottom: 12px
        }

        .bgimg {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100%;
        }

        .loginbox {
            background: white;
            color: black;
            margin-top: 30%;
            left: 0;
            padding: 20px;
            box-shadow: 0 8px 50px -2px #000;
            border-radius: 5px;

        }

        .logo {
            width: 130px;
            height: 55px;
            margin-left: 10%;
        }

        @media (max-width: 767px) {
            .loginbox {
                margin-top: 10%;
            }
        }

        .loginbox_content {
            padding: 5% 11% 5% 11%;

        }

        .singtext {
            font-family: "Open Sans", sans-serif;
            font-size: 27px;
            color: #82C226;
            float: right;
            padding-right: 25%;
        }

        .submit-btn {
            float: right;
            margin-right: 28%;
        }

        .forgotpassword {
            padding-left: 10%;
        }

        @media (max-width: 800px) {
            .submit-btn {

                margin-right: 23%;
            }
    </style>
</head>
<body>
<div class="header">
    <h1>Theoretisch rijbewijs behalen </h1>
</div>

<div class="login2background">
    <div class="container">
        <div class="col-lg-6 col-md-6 col-sm-8  loginbox">
            <div class=" row">

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6  ">
                    <span class="singtext">Log in </span>
                </div>

            </div>
            <div class=" row loginbox_content ">
                <div class="input-group input-group-sm">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-user"></span>
                        </span>
                    <input class="form-control" type="email" placeholder="Email">
                </div>
                <br>
                <div class="input-group input-group-sm">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-lock"></span>
                        </span>
                    <input class="form-control" type="password" placeholder="Passwoord">
                </div>
                <div class="fb-login-button" data-max-rows="2" data-size="large" data-button-type="continue_with"
                     data-show-faces="true"
                     data-auto-logout-link="true" data-use-continue-as="true"></div>
            </div>
            <div class="row ">
                <div class="col-lg-8 col-md-8  col-sm-8 col-xs-7 forgotpassword ">
                    <a href="RegistreerPagina.php">Registreren</a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4  col-xs-5 ">
                    <a href="WelkomPagina.html" class=" btn btn-default submit-btn">Verzenden<span
                                class="glyphicon glyphicon-log-in"></span> </a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-4 "></div>
    </div>
</div>

<script type="text/javascript">
    window.fbAsyncInit = function () {
        FB.init({
            appId: '1741589282521605',
            cookie: true,
            xfbml: true,
            version: 'v2.8'
        });
        FB.Event.subscribe('auth.login', function () {
            FB.init({
                appId: '1741589282521605',
                cookie: true,
                xfbml: true,
                version: 'v2.8'
            });
            FB.getLoginStatus(function (response) {
                if (response.status === 'connected') {
                    window.location.href = "WelkomPagina.html";
                }
            });
        });
        FB.getLoginStatus(function (response) {
            if (response.status === 'connected') {
                window.location.href = "WelkomPagina.html";
            }
        });
    };
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>


<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/nl_NL/sdk.js#xfbml=1&version=v2.9&appId=1741589282521605";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
</body>
</html>