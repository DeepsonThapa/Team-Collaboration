<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";
$port="3307";

try{
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);
}catch(mysqli_sql_exception){
    echo"Failed";
}

if ($conn) {
    echo "";
}
?>

