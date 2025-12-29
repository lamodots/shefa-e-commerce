
<?php

    $hostname = DB_HOST;
    $username = DB_USER;
    $password = DB_PASS;
    $database = DB_NAME;
    $port = DB_PORT;

$con = mysqli_connect($hostname, $username, $password, $database, $port);

if(!$con){
    die("Connection failed: " . mysqli_connect_error());
}
