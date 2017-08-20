<?php

function getDb(){
    //connect to online database
    $db=mysqli_connect("sql11.freemysqlhosting.net","sql11179363","kgKMlhMgp9","sql11179363");

    // connect to local database
    //$db=mysqli_connect("localhost","root","","mi4rijbewijs");

    if($db)
    {
        return $db;
    }
    else
    {
        die("Connection failed . Reason: " .mysqli_connect_error());
    }
}