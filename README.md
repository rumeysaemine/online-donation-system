# Online Bağış Sistemi
Yardım Eli; PHP, MySQL, Html, BootStrap kullanılarak geliştirilmiş online bağış sistemidir. *[Buraya](http://onlinedonation.eu5.org/)* tıklayarak siteye ulaşabilirsiniz. 
## Kurulum
1) Önce yukarıdaki **Code** butonuna daha sonra **Download ZIP**'e tıklayarak zip dosyasını indirin.
2) İndirdiğiniz zip dosyasında bulunan **online-donation** dosyasını bilgisayarınızdaki **C:\xampp\htdocs** klasörüne aktarın.
3) Aktardıktan sonra **online-donation** içerisindeki **ayarlar.php** dosyasında tanımlanan değişkenlerin kendi veritabanı bilgilerinizle uyumlu olup olmadığını kontrol edin. 
4) Daha sonra bilgisayarınızdaki **C:\xampp\xampp-control-exe**'yi çalıştırın. Apache ve MySQL'i başlattığınızdan emin olun.
5) Web tarayıcınızın adres çubuğuna http://localhost:8000/phpmyadmin/ yazarak phpMyAdmin programını başlatın.
6) phpMyAdmin programı aracılığıyla **387144** adlı veri tabanı oluşturun.
7) Oluşturduğunuz **387144** adlı veri tabanının içine indirdiğiniz zip dosyasındaki **387144(1).sql** dosyasını aktarın.
8) Artık tarayıcınızın adres çubuğuna http://localhost:8000/online-donation/ yazarak web sitesine ulaşabilirsiniz.

## Site Görüntüleri
### Anasayfa
![Anasayfa](https://user-images.githubusercontent.com/72495362/174910790-d74d7492-1ba7-4973-82cc-7c254758b07b.jpg)
### Kayıt Formu
![kayıtFormu](https://user-images.githubusercontent.com/72495362/174910823-41252f2d-282a-40d7-9299-c2d864538829.jpg)
### Kullanıcının Sayfası
![bagisListe](https://user-images.githubusercontent.com/72495362/174910836-b8ebec23-547c-4b7e-8815-d1aa8d3d7619.jpg)
![bagisEkle](https://user-images.githubusercontent.com/72495362/174910846-86c5147b-19a8-46a0-a5ea-383a403a0a49.jpg)
![bagisGuncelle](https://user-images.githubusercontent.com/72495362/174910851-d24e9334-1ed9-484a-bc95-dd378d1abaf9.jpg)
