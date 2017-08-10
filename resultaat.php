<?php
ob_start();
session_start();

//connect to database
$db=mysqli_connect("localhost","id993722_mohamedbouzouf","rijbewijs","id993722_mi4rijbewijs");
//$db=mysqli_connect("localhost","root","","mi4rijbewijs");
if(isset($_SESSION['message']))
{
    echo "<div id='error_msg'>".$_SESSION['message']."</div>";
    unset($_SESSION['message']);
}

$sql = "SELECT antwoord FROM quizscript";
$result = mysqli_query($db, $sql);

$i = 0;
while($row = mysqli_fetch_assoc($result)) 
{
	$new_array[$i] = $row;
    $js_array[$i] = json_encode($row, JSON_UNESCAPED_UNICODE);
	$i = $i + 1;
}


ob_end_clean();

echo "var ans = [". implode(",",$js_array) . "];";
exit();
?>