<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<script type="text/javascript">
    window.fbAsyncInit = function () {
        FB.init({
            appId: '1741589282521605',
            cookie: true,
            xfbml: true,
            version: 'v2.8'
        });
        FB.Event.subscribe('auth.logout', function () {
            FB.init({
                appId: '1741589282521605',
                cookie: true,
                xfbml: true,
                version: 'v2.8'
            });
        });
        FB.getLoginStatus(function(response) {
                FB.logout(function(response) {
                    
                    window.location.href = "LoginPagina.php";
                });
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
<?php
/**
 * Created by PhpStorm.
 * User: mo-bo_000
 * Date: 27/03/2017
 * Time: 16:00
 */

session_start();
session_destroy();
unset($_SESSION['username']);
$_SESSION['message'] = "You are now logged out";
//header("location:LoginPagina.php");
?>
</body>
</html>