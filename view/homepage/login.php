<?php


session_start();
?>
<?php
include '../../config/config.php';

$jsonData = json_decode(file_get_contents('php://input'), true);

$email = $jsonData['email'];
$password=$jsonData["password"];
if($email==""||$password=="")
{
    echo "Please enter email or password";
    exit;
}
$conn=connection();
$sql="SELECT userid FROM user WHERE emailid='{$email}' and password='{$password}'";
//echo $sql;
$result=query_dml($conn,$sql);
$val=mysqli_num_rows($result);
if($val==0)
{
    echo "invalid credentials";
    exit;
}
$ans=$result->fetch_assoc();
$_SESSION["userid"]=$ans["userid"];
echo "success";
?>