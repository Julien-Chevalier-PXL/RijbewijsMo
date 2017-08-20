<?php
session_start();
//connect to database
include './DatabaseActions/DbConnect.php';
$db = getDb();

if(isset($_GET['register_btn']))
{
    $username = $_GET['name'];
    $email = $_GET['email'];

    $password = $_GET['password'];
    $password2 = $_GET['confirm'];

    if($password==$password2)
    {           //Create User
        $password=md5($password); //hash passwoord
        $sql="INSERT INTO gebruikers(username,email,password) VALUES('$username','$email','$password')";
        mysqli_query($db,$sql);
        $_SESSION['message']="You are now logged in";
        $_SESSION['name']=$username;
       // header("location:ExamenPagina.php");
        header("location:WelkomPagina.html");//redirect home page
    }
    else
    {
        $_SESSION['message']="The two password do not match";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
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

</head>
<body>
<?php
if(isset($_SESSION['message']))
{
    echo "<div id='error_msg'>".$_SESSION['message']."</div>";
    unset($_SESSION['message']);
}
?>
<div class="container well">
    <h1>Theoretisch rijbewijs behalen</h1>
    <div class="row main">
        <div class="main-login main-center">
            <h5>Slaag van de 1ste X op je theoretische rijexamen, door je registreren.</h5>
            <form class="" method="post" action="RegistreerPagina.php">

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Naam:</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="name" id="name"  placeholder="Naam:"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Email:</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="email" id="email"  placeholder="Email"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Passwoord</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm" class="cols-sm-2 control-label">Bevestig Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Bevestig je passwoord"/>
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <a href="../FullPages/WelkomPagina.php" type="button" id="button" class="btn btn-primary btn-lg btn-block login-button">Register</a>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>