<?php 
    include_once "ayarlar.php";

    if (isset($_POST['adSoyad']) && isset($_POST['sifre'])){
        
        extract($_POST);
        $sifre = hash('sha256', $sifre);

        $sql = "INSERT INTO kullanicilar (adSoyad,mail,telNo,sifre) VALUES ( '$adSoyad','$mail', '$telNo', '$sifre')";

        $cevap = mysqli_query( $db_con,$sql);

        if(!$cevap){
            echo '<br>Hata:' . mysqli_error($baglanti);
        }
        else{
            header("location: bireyselSayfa.php");
        }
    }
    
    //mysqli_close($baglanti);
?>