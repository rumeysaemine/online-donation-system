<?php 
    include_once "ayarlar.php";
    $id = $_GET["id"];
    $sql_query4 = "DELETE FROM bagislar WHERE id = '$id' ";
    $sonuc = mysqli_query($db_con,$sql_query4);
    if($sonuc){
       header("location: bireyselSayfa.php");
    }
    
?>