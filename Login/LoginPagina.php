<?php
session_start();
//connect to database
include '../DatabaseActions/DbConnect.php';
$db = getDb();

if (isset($_GET['login_btn'])) {
    //$username=mysql_real_escape_string($_POST['username']);
    // $password=mysql_real_escape_string($_POST['password']);
    $username = $_GET['username'];
    $password = $_GET['password'];
    $password = md5($password); //Remember we hashed password before storing last time
    $sql = "SELECT * FROM gebruikers WHERe username='$username'";
    $result = mysqli_query($db, $sql);
    $result = mysqli_fetch_assoc($result);
    if ($result['Paswoord'] == $paswoord) {
        $_SESSION['message'] = "You are now Loggged In";
        $_SESSION['username'] = $username;
        header("location:WelkomPagina.php");
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- region standard head-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="manifest" href="../manifest.json"/>
    <!-- Bootstrap -->
    <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../Bootstrap/js/bootstrap.min.js"></script>

    <link href="../Stylesheet/Style.css" rel="stylesheet">
    <!-- endregion -->
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
            margin-top: 5%;
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
<div class="login2background">
    <div class="container well">
        <h1>Theoretisch rijbewijs behalen</h1>
        <div class="col-lg-6 col-md-6 col-sm-8 loginbox">
            <div class=" row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6  ">
                    <span class="singtext">Log in </span>
                </div>
            </div>
            <div class="row loginbox_content ">
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
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8  col-sm-8 col-xs-7 forgotpassword ">
                    <a href="RegistreerPagina.php">Registreren</a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4  col-xs-5 ">
                    <a href="../FullPages/WelkomPagina.php" class=" btn btn-default submit-btn">Log in<span
                                class="glyphicon glyphicon-log-in"></span> </a>
                </div>
            </div>
            <div class="row loginbox_content">
                <div class="fb-login-button" data-max-rows="2" data-size="large" data-button-type="continue_with"
                     data-show-faces="true"
                     data-auto-logout-link="true" data-use-continue-as="true"></div>
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
                    window.location.href = "../FullPages/WelkomPagina.php";
                }
            });
        });
        FB.getLoginStatus(function (response) {
            if (response.status === 'connected') {
                window.location.href = "../FullPages/WelkomPagina.php";
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