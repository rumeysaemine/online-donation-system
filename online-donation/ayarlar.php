<?php 

    $db_host = "localhost"; 
    $db_username = "root";
    $db_userpass = "";
    $db_name = "387144";

    $db_con = mysqli_connect($db_host, $db_username, $db_userpass, $db_name);

    if (!$db_con) {
        echo "MySQL sunucu ile baglanti kurulamadi! </br>";
        echo "HATA: " . mysqli_connect_error();
        exit;
    }

?>