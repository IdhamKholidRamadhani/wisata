<?php
     include "koneksi.php";

     //Fungsi untuk mencegah inputan karakter yang tidak sesuai
     function input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
     }
     //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id
     if (isset($_GET['id'])) {
         $id=input($_GET["id"]);
 
         $sql="select * from pariwisata where id=$id";
         $hasil=mysqli_query($kon,$sql);
         $data = mysqli_fetch_assoc($hasil);
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_index_konten.css">
    <title>Wisata Yogyakarta</title>
</head>
<body>
    <!--Navigasi-->
    <header>
        <h2 style="color: white;">Wisata Jogja</h2>
        <nav>
            <ul class="nav_links">
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Kontak</a></li>
                <li><a href="#">Tentang</a></li>
                <li><a href="#">Disclaimer</a></li>
                <a class="cta" href="admin.php"><button>Author</button></a>
            </ul>
        </nav>
    </header>

    <!--Pencarian-->
    <div class="cari">
        <form>
            <h1>Maksimalkan Liburanmu di Yogyakarta</h1>
            <h4>Manfaatkan liburan kamu untuk melepaskan semua beban agar pikiran dan tubuh menjadi sehat kembali</h4>
                <input type="text" class="search" placeholder="Tujuan" style="font-weight:400;">
                <a class="cta" href="#"></a><button style="width: 150px;height: 51px; border-radius: 0 25px 25px 0; font-size: 14px; text-align: center;margin-left: -5px; font-weight: bold; color:white;">Cari</button>
            </div>
        </form>
    </div>

    <!--Detail Konten-->
    <h1 style="color: #7D89F5; margin-top: 40px;">Destinasi Pariwisata Yogyakarta</h1>
    <h4 style="color: dimgray;">Mari Berpetualang Bersama Kami di Daerah Istimewa</h4>

    <table style=" width:100%; height: auto; padding-left: 140px; padding-right: 140px;">
        <tr>
            <td colspan="2" style="width: 900px;"><h2 style="color:#2b305c;"><?php echo $data['nama']; ?></h2></td><br><br>
        </tr>
        <tr>
            <td style="width: 900px;"><h5><?php echo $data["alamat"];?></h5></td>
            <td rowspan="2" style="width: 900px; padding-left: 50px"><h5>Lokasi :</h5><br>
                <iframe style="border:none; height: 400px" class="modified-img2" src=<?php echo $data["map"];?>></iframe>
            </td>
        </tr>
        <tr>
            <td style="width: 900px;"><img class="modified-img2" style="width: 600px; height: 340px; border-radius: 15px;" src=<?php echo $data["gambar"];?>></td>
        </tr>
        <tr>
            <td colspan="2" style="width: 900px;">
                <p style="font-size: 15px"><br><?php echo $data["deskripsi"];?></p>
            </td>
        </tr>
        <tr>
            <td style="padding-bottom: 50px;"><br><button style="border-radius: 10px;"><a style="color: white; font-weight: bold;" href="index.php">Kembali</a></button></td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="disqus_thread"></div>
                <script>
                    /**
                    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                    /*
                    var disqus_config = function () {
                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    */
                    (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://http-localhost-website-index-konten-php.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            </td>
        </tr>
    </table>
    
    <!--Footer-->
    <div class="footer">
        <h2 style="text-align: left;padding-top: 30px;display: inline-block; font-size: 16px; color: white">Wisata Jogja | </h2>
        <h6 style="font-size: 16px; font-weight: lighter;">Copyright Wisata Jogja &copy; 2021 - <script>document.write(new Date().getFullYear())</script></h6><br>
        <h6 style="font-size: 16px;">Follow Us</h6><br>
        <div class="icon">
                <!--facebook-->
                <a href="#"><img src="https://img.icons8.com/carbon-copy/40/f5f5f5/facebook.png"/></a>
                <!--instagram-->
                <a href="#"><img src="https://img.icons8.com/carbon-copy/40/f5f5f5/instagram-new.png"/></a>
                <!--pinterest-->
                <a href="#"><img src="https://img.icons8.com/carbon-copy/40/f5f5f5/pinterest.png"/></a>
                <!--youtube-->
                <a href="#"><img src="https://img.icons8.com/carbon-copy/40/f5f5f5/youtube-play.png"/></a>
            </div>
        </div>
    </div>
</body>
</html>