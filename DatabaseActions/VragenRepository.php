<?php
function getVragen($db)
{
    mysqli_query($db,'SET CHARACTER SET utf8');
    $sql = "SELECT id,vraag,afbeelding,optie1,optie2,optie3,uitleg FROM quizscript";
    $result = mysqli_query($db, $sql);
    if($result){
        $js_array = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($result))
        {
            // echo implode(",",$row);
            $js_array[$i] = json_encode($row, JSON_UNESCAPED_UNICODE);
            $i = $i + 1;
        }
    }else{
        die("SQL command failed. Reason: " .mysqli_error());
    }

    return $js_array;
}