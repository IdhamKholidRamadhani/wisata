<?php
    require 'koneksi.php';  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <!--Navigasi-->
    <header>
        <h2>Wisata Jogja</h2>
        <nav>
            <ul class="nav_links">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="#">Kontak</a></li>
                <li><a href="#">Tentang</a></li>
                <li><a href="#">Disclaimer</a></li>
                <a class="cta" href="admin.php"><button>Author</button></a>
            </ul>
        </nav>
    </header>

    <!--Pencarian-->
    <div class="cari">
        <form action="index.php" method="post">
            <h1>Maksimalkan Liburanmu di Yogyakarta</h1>
            <h4>Manfaatkan liburan kamu untuk melepaskan semua beban agar pikiran dan tubuh menjadi sehat kembali</h4>
                <input type="text" class="search" placeholder="Tujuan" style="font-weight:400;" name="cari">
                <a class="cta" href="#"></a><button style="width: 150px;height: 51px; border-radius: 0 25px 25px 0; font-size: 14px; text-align: center;margin-left: -5px; font-weight: bold; color:white;">Cari</button>
            </div>
        </form>
    </div>

    <!--Destinasi Disukai-->
    <h1 style="color: #7D89F5; margin-top: 50px;">Destinasi Paling Disukai</h1>
    <h4 style="color: dimgray;">Berdasarkan rating yang diberikan</h4>
    <div class="recommended">
        <!--Image favorit 1-->
        <div class="card">
            <?php
                $dt1 = mysqli_query($kon, "select * from pariwisata where id='5'");
                $data1 = mysqli_fetch_array($dt1);
            ?>
            <a href="index_konten.php?id=5"><img class="modified-img" src=<?php echo $data1["gambar"];?>></a>
            <span></span>
            <h6 style="color: #2b305c;text-align: center;"><?php echo $data1["nama"]; ?></h6>
            <h5><?php echo $data1["alamat"];?></h5>
            <p><?php echo substr($data1["deskripsi"],0,350);?>...<a href="index_konten.php?id=5" style="color: #2b305c; font-weight: bold; font-size: 14px;">Read More</a></p>
        </div>
        <!--Image favorit 2-->
        <div class="card">
            <?php
                $dt2 = mysqli_query($kon, "select * from pariwisata where id='9'");
                $data2 = mysqli_fetch_array($dt2);
            ?>
            <a href="index_konten.php?id=9"><img class="modified-img" src=<?php echo $data2["gambar"];?>></a>
            <span></span>
            <h6 style="color: #2b305c;text-align: center;"><?php echo $data2["nama"]; ?></h6>
            <h5><?php echo $data2["alamat"];?></h5>
            <p><?php echo substr($data2["deskripsi"],0,350);?>...<a href="index_konten.php?id=9" style="color: #2b305c; font-weight: bold; font-size: 14px;">Read More</a></p>
        </div>
        <!--Image favorit 3-->
        <div class="card">
            <?php
                $dt3 = mysqli_query($kon, "select * from pariwisata where id='10'");
                $data3 = mysqli_fetch_array($dt3);
            ?>
            <a href="index_konten.php?id=10"><img class="modified-img" src=<?php echo $data3["gambar"];?>></a>
            <span></span>
            <h6 style="color: #2b305c;text-align: center;"><?php echo $data3["nama"]; ?></h6>
            <h5><?php echo $data3["alamat"];?></h5>
            <p><?php echo substr($data3["deskripsi"],0,350);?>...<a href="index_konten.php?id=10" style="color: #2b305c; font-weight: bold; font-size: 14px;">Read More</a></p>
        </div>
    </div>

    <!--Konten-->
    <h1 style="color: #7D89F5; margin-top: 280px;">Destinasi Pariwisata Yogyakarta</h1>
    <h4 style="color: dimgray;">Mari Berpetualang Bersama Kami di Daerah Istimewa</h4><br><br>
    <div>
        <nav>
            <ul>
                <li class="active">
                    <a style="font-size: 15px; color: black;" href="index.php">Semua</a></li>
                <li style="display: inline-block; padding-left: 30px;">
                    <a style="font-size: 15px; color: black;" href="#" >Kota Madya</a></li>
                <li style="display: inline-block; padding-left: 30px;">
                    <a style="font-size: 15px; color: black;" href="#" >Sleman</a></li>
                <li style="display: inline-block; padding-left: 30px;">
                    <a style="font-size: 15px; color: black;" href="#">Bantul</a></li>
                <li style="display: inline-block; padding-left: 30px;">
                    <a style="font-size: 15px; color: black;" href="#">Kulon Progo</a></li>
                <li style="display: inline-block; padding-left: 30px;">
                    <a style="font-size: 15px; color: black;" href="#">Gunung Kidul</a></li>
            </ul>
        </nav>
    </div>

        <!--List Data-->
        <div class="content-img">
            <?php
                $sql="select * from pariwisata where id";
                $hasil=mysqli_query($kon,$sql);
                while ($data = mysqli_fetch_array($hasil)) {
            ?>
            <div class="card2">
                <a href="index_konten.php?id=<?php echo htmlspecialchars($data['id']);?>"><img class="modified-img2" src=<?php echo $data["gambar"];?>></a>
                <span></span>
                <h6 style="color: #333;"><?php echo $data["nama"]; ?></h6>
                <h5><?php echo $data["alamat"];?></h5>
                <p><?php echo substr($data["deskripsi"],0,350);?>...<a href="index_konten.php?id=<?php echo htmlspecialchars($data['id']);?>" style="color: #2b305c; font-weight: bold; font-size: 14px;">Read More</a></p><br><br>
            </div>
            <?php } ?>
        </div>
    
    <div class="button-content">
        <button><a style="color: white; font-weight: bold; font-size: 17px;" href="#">Kembali</a></button>
        <button><a style="color: white; font-weight: bold;" href="#">Selanjutnya</a></button>
    </div>
    
    <!--Footer-->
    <div class="footer">
        <h2 style="text-align: left;padding-top: 30px;display: inline-block; font-size: 16px;">Wisata Jogja | </h2>
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