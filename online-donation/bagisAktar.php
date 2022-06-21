<?php 
    include_once "ayarlar.php";
    session_start();

    if ( !isset($_SESSION['email']) ) {
        header("Location: girisYap.php");
        exit();
    }
    
    $posta = $_SESSION['email'];
    
    $sql_query = mysqli_query($db_con, "SELECT * FROM kullanicilar WHERE id=( SELECT id FROM kullanicilar WHERE mail='$posta')");
    
    $dizi = mysqli_fetch_assoc($sql_query);

    $kullaniciId = $dizi['id'];

    if (isset($_POST['amount']) and isset($_POST['category'])){
        extract($_POST);

    $sql_query2 = "INSERT INTO bagislar(bagis_adi,bagis_tutar,kullanici_id) VALUES ('$category','$amount','$kullaniciId')";

    $cevap = mysqli_query( $db_con,$sql_query2);

        if(!$cevap){
            echo '<br>Hata:' . mysqli_error($baglanti);
        }
        else{
            //Bagis eklendi mesaji cikabilir.
            header("Location: bireyselSayfa.php");
        }
    }
?>