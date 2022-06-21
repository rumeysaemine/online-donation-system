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
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Bireysel Sayfa</title>
  </head>
  <body>

    <nav class="navbar bg-dark">
      <div class="container-fluid">
        <img class="d-block mx-auto my-2" src="image/birinci.png" alt="" width="60" height="60">
      </div>
    </nav>

    <!-- Code -->
    <div class="container mt-5">
      <div class="row">
        <div class="col-4"> 
          <div class="card shadow p-3 bg-body rounded">
            <div class="card-header">
              <img src="image/profile.png" alt="Profile" style="width:100px;height:100px;">
              <label class="text-primary" style="font-size:20px"><?php echo $dizi['adSoyad'] ?> </label>
            </div>
            <div class="list-group" id="list-tab" role="tablist">
              <a class="list-group-item list-group-item-action" id="list-donate-list" data-bs-toggle="collapse" href="#list-donate" role="tab" aria-expanded="false" aria-controls="list-donate">Bağışlarım</a>
              <a class="list-group-item list-group-item-action" id="list-addDonate-list" data-bs-toggle="collapse" href="#list-addDonate" role="tab" aria-expanded="false" aria-controls="list-addDonate">Bağış Ekle</a>
              <a class="list-group-item list-group-item-action" id="list-updateDonate-list" data-bs-toggle="collapse" href="#list-updateDonate" role="tab" aria-expanded="false" aria-controls="list-updateDonate">Bağış Güncelle</a>

              <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="collapse" href="#list-profile" role="tab" aria-expanded="true" aria-controls="list-profile">Hesap Bilgileri</a>
              <a href="cikisYap.php" class="list-group-item list-group-item-action">Çıkış Yap</a>
            </div>
            
          </div>

          <div class="collapse my-3 shadow-sm bg-body rounded" id="list-profile">
            <div class="card card-body">
              <form>
                <fieldset disabled="">
                  <legend class="text-primary">Hesap Bilgileri</legend>
                  <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Adı Soyadı</label>
                    <input type="text" id="disabledTextInput" class="form-control" 
                    placeholder= <?php echo $dizi['adSoyad'] ?> >
                  </div>

                  <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">E-Posta</label>
                    <input type="text" id="disabledTextInput" class="form-control" placeholder=<?php echo $dizi['mail'] ?>>
                  </div>  

                  <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Telefon</label>
                    <input type="text" id="disabledTextInput" class="form-control" placeholder=<?php echo $dizi['telNo'] ?>>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>

        <div class="col-6">
          <div class="collapse mb-3 ms-5 shadow-sm bg-body rounded" id="list-donate">
            <div class="card card-body">
            <legend class="text-primary">Bağışlarım</legend>
              <table class="table table-light table-hover">
                <thead>
                  <tr>
                    <th scope="col">Bağış İd</th>
                    <th scope="col">Bağış Adı</th>
                    <th scope="col">Bağış Tutarı</th>
                    <th scope="col">Bağış Sil</th>
                  </tr>
                </thead>
                <tbody>
                  <?php                          
                    $sql_query3 = " SELECT bagislar.id, bagislar.bagis_adi, bagislar.bagis_tutar FROM kullanicilar".
                                  "  JOIN bagislar ON bagislar.kullanici_id = kullanicilar.id".
                                  "  WHERE kullanicilar.id = '$kullaniciId' ";
                    $bagislarDizi = mysqli_query($db_con,$sql_query3);

                    while($bagis = mysqli_fetch_assoc($bagislarDizi))
                    {
                        echo "<tr>";
                        echo '<th scope="row">'.$bagis["id"].'</th>';
                        echo '<td>' . $bagis["bagis_adi"] . '</td> <td>' . $bagis["bagis_tutar"] . '</td>';
                        echo '<td>' . " <a class='btn btn-outline-danger' href='bagisSil.php?id={$bagis["id"]}'>SİL</a>" .'</td>';
                        echo "</tr>";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="collapse mb-3 ms-5 shadow-sm bg-body rounded" id="list-addDonate">
            <div class="card card-body">
              <legend class="text-primary">Bağış Ekle</legend>
              <form action='bagisAktar.php' method='POST'>
                
                <div class="mb-3">
                  <label for="inputDonation" class="form-label">Bağış Adı</label>
                  <select class="form-select" name="category" aria-label="Default select example" required>

                    <option value="Kurban">Kurban</option>
                    <option value="Zekat">Zekat</option>
                    <option value="Eğitim">Eğitim</option>
                    <option value="Yetim">Yetim</option>
                    <option value="Afet">Afet</option>
                    <option value="Fidan">Fidan</option>
                    <option value="Su Kuyusu">Su Kuyusu</option>
                    <option value="Sağlık">Sağlık</option>
                    <option selected value="Genel Bağış">Genel Bağış</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="inputMoney" class="form-label">Bağış Bedeli</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text">₺</span>
                    <input type="text" name="amount" class="form-control" aria-label="Amount (to the nearest dollar)" required>
                  </div>
                </div>
                
                <button type="submit" class="btn btn-outline-primary">Bağış Ekle</button>
              </form>
            </div>
          </div> 


          <div class="collapse mb-3 ms-5 shadow-sm bg-body rounded" id="list-updateDonate">
            <div class="card card-body"> 
              <legend class="text-primary">Bağış Güncelle</legend>
              <form action='bagisGuncelle.php' method='POST'>
               
                <div class="mb-3">
                  <label for="inputDonation" class="form-label">Bağış Id</label>
                  <select class="form-select" name="id" aria-label="Default select example" required>
  
                    <?php
                      $sql_query4 = " SELECT bagislar.id, bagislar.bagis_adi, bagislar.bagis_tutar FROM kullanicilar".
                                    "  JOIN bagislar ON bagislar.kullanici_id = kullanicilar.id".
                                    "  WHERE kullanicilar.id = '$kullaniciId' ";
                      $bagislarDizi = mysqli_query($db_con,$sql_query4);
                      while($bagis = mysqli_fetch_assoc($bagislarDizi)){
                          echo "<option value= '".$bagis["id"]."'>".$bagis["id"]."</option>";    
                      }
                    ?>
                  </select>
                </div>
           
                <div class="mb-3">
                  <label for="inputDonation" class="form-label">Bağış Adı</label>
                  <select class="form-select" name="category" aria-label="Default select example" required>
                    <option selected value="Genel Bağış">Open this select menu</option>
                    <option value="Kurban">Kurban</option>
                    <option value="Zekat">Zekat</option>
                    <option value="Eğitim">Eğitim</option>
                    <option value="Yetim">Yetim</option>
                    <option value="Afet">Afet</option>
                    <option value="Fidan">Fidan</option>
                    <option value="Su Kuyusu">Su Kuyusu</option>
                    <option value="Sağlık">Sağlık</option>
                    <option value="Genel Bağış">Genel Bağış</option>
                  </select>
                </div>
           
                <div class="mb-3">
                  <label for="inputMoney" class="form-label">Bağış Bedeli</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text">₺</span>
                    <input type="text" name="amount" class="form-control" aria-label="Amount (to the nearest dollar)" required>
                  </div>
                </div>
               
                <button type="submit" class="btn btn-outline-primary">Bağış Güncelle</button>
              </form>

            </div>
          </div>

        </div>

      </div>
    </div>

    <!-- End Code -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>