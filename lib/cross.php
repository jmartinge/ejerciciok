<?php
    require_once 'cred.php';

    $conn = mysqli_connect($host, $us, $pass, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully";
    //mysqli_close($conn);
?>