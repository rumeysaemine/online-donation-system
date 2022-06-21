<?php 
    session_start();
    include_once "ayarlar.php";

    if (isset($_POST['email']) and isset($_POST['password'])){
        extract($_POST);

        $password = hash('sha256', $password);
        $sql = "SELECT * FROM kullanicilar WHERE mail='$email' and sifre='$password'";
        $cevap = mysqli_query($db_con, $sql);

        if(!$cevap ){
            echo '<br>Hata:' . mysqli_error($db_con);
        }

        $say = mysqli_num_rows($cevap);
        if ($say == 1){
            $_SESSION['email'] = $email;
        }else{
            $mesaj = "Hatalı Kullanıcı adı veya Şifre!";
        }

        if (isset($_SESSION['email'])){
            header("Location: bireyselSayfa.php");
        }
        else{
            header("Location: girisYap.php");
        }
    }
?>