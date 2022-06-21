<?php
    include_once "ayarlar.php";
    extract($_POST);
    $sql_query5 = "UPDATE bagislar SET bagis_adi='$category',bagis_tutar='$amount' WHERE id='$id'";
    $cevap = mysqli_query($db_con, $sql_query5);
    if($cevap){
        header("Location: bireyselSayfa.php");
    }
?>