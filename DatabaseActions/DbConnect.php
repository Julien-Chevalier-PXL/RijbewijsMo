<?php

function getDb(){
    //connect to online database
    //$db=mysqli_connect("localhost","id993722_mohamedbouzouf","rijbewijs","id993722_mi4rijbewijs");

    // connect to local database
    $db=mysqli_connect("localhost","root","","mi4rijbewijs");

    if($db)
    {
        return $db;
    }
    else
    {
        die("Connection failed . Reason: " .mysqli_connect_error());
    }
}