<?php
/**
 * Created by PhpStorm.
 * User: mo-bo_000
 * Date: 27/03/2017
 * Time: 15:58
 */
session_start();
//connect to database
//$db=mysqli_connect("localhost","id993722_mohamedbouzouf","rijbewijs","id993722_mi4rijbewijs");
//$dn=mysqli_connect("localhost","id993722_mohamedbouzouf","rijbewijs","id993722_mi4rijbewijs");
$db=mysqli_connect("localhost","root","","mi4rijbewijs");

//$db=mysqli_connect("sql11.freemysqlhosting.net","sql11168139	","1Rt1bfRWrz","sql11168139");

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
    <title>RijbewijsL</title>
    <link rel="stylesheet" type="text/css" href="StylerRegistratie.css"/>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="../Script/jquery-3.2.1.min.js"></script>
    <link rel="manifest"href="manifest.json"/>
    <script type="text/javascript" src="bootstrap/bootstrap.js"></script>
    <script type="text/javascript" src="bootstrap/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="header">
    <h1>Theoretisch rijbewijs behalen</h1>
</div>
<?php
if(isset($_SESSION['message']))
{
    echo "<div id='error_msg'>".$_SESSION['message']."</div>";
    unset($_SESSION['message']);
}
?>


<div class="container">
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
                    <a href="WelkomPagina.html" type="button" id="button" class="btn btn-primary btn-lg btn-block login-button">Register</a>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>