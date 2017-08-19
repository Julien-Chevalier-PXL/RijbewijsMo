<?php
function getCachedExamenCentras($db)
{
    mysqli_query($db,'SET CHARACTER SET utf8');
    $sql = "SELECT centravlaanderen.id id, centravlaanderen.adres adres, centravlaanderen.postcode postcode, centravlaanderen.plaats plaats, centravlaanderen.tel tel, ".
            "centravlaanderen.openingsuren openingsuren, centralocationcache.Longitude longitude, centralocationcache.Latitude latitude ".
            "FROM centravlaanderen ".
            "JOIN centralocationcache ".
            "ON (centravlaanderen.id = centralocationcache.CentraId)";
    $result = mysqli_query($db, $sql);
    if($result){
        $js_array = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($result))
        {
            $js_array[$i] = json_encode($row, JSON_UNESCAPED_UNICODE);
            $i = $i + 1;
        }
    }else{
        die("SQL command failed. Reason: " .mysqli_error($db));
    }

    return $js_array;
}