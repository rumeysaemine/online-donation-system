

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Giriş Formu</title>
  </head>
  <body> 
  
    <nav class="navbar bg-dark">
      <div class="container-fluid">
        <a class="mx-auto my-2" href="index.php">
          <img class="d-block" src="image/birinci.png" alt="" width="60" height="60">
        </a>
      </div>
    </nav>


    <div class='container'>
      <div class='row mt-5'>
        <div class='col-sm-3 mx-auto'>
          <div class="card px-3 shadow-lg rounded" style="width: 23rem">
            <div class="card-body">
              <h5 class="card-title mt-2 mb-2">GİRİŞ FORMU</h5>
              <form action='girisAktar.php' method='POST'>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">E-posta adresi</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Şifre</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Giriş bilgilerimi hatırla</label>
                </div>
                <button type="submit" class="btn btn-primary">Giriş Yap</button>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>