<?php


session_start();
?>
<?php
include '../../config/config.php';

$jsonData = json_decode(file_get_contents('php://input'), true);

$name = $jsonData['name'];
$email=$jsonData["email"];
$password=$jsonData["password"];
$confirm=$jsonData["confirm"];
$conn=connection();

if($confirm!=$password)
{
    echo "Incorrect Password";
    exit;
}

$sql="INSERT INTO user (username, emailid, password)VALUES ('{$name}','{$email}','{$password}')";

$val=query_ddl($conn,$sql);
if($val==0)
{
    echo "Please resubmit";
    exit;
}
echo "success";
?>