<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" 
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" 
    crossorigin="anonymous">
    <title>Tambah Data Destinasi Pariwisata Yogyakarta</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700&display=swap');
        *{
            font-family: 'Nunito',sans-serif;
        }
        .container{
            padding-top: 70px;
        }
        h2{
            font-family: 'Nunito',sans-serif;
            font-weight:700;
        }
    </style>
</head>

<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";
    
    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama=input($_POST["nama"]);
        $alamat=input($_POST["alamat"]);
        $deskripsi=input($_POST["deskripsi"]);
        $gambar=input($_POST["gambar"]);
        $map=input($_POST["map"]);

        //Query input menginput data kedalam tabel data
        $sql="insert into pariwisata (nama,alamat,deskripsi,gambar,map) values
		('$nama','$alamat','$deskripsi','$gambar','$map')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:admin.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }
    }
    ?>

    <center><h2>Input Data Pariwisata Yogyakarta</h2></center><br>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama Wisata:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Wisata" required />
        </div>

        <div class="form-group">
            <label>Alamat:</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" required/>
        </div>

        <div class="form-group">
            <label>Kabupaten:</label>
            <input type="text" name="kabupaten" class="form-control" placeholder="Masukan Kabupaten" required/>
        </div>

        <div class="form-group">
            <label>Deskripsi:</label>
            <textarea name="deskripsi" class="form-control" rows="10" placeholder="Masukan Deskripsi" required></textarea>
        </div>

        <div class="form-group">
            <label>Gambar:</label>
            <input type="text" name="gambar" class="form-control" placeholder="Masukan Link Gambar" required/>
        </div>

        <div class="form-group">
            <label>Maps:</label>
            <input type="url" name="map" class="form-control" placeholder="Masukan Link Maps" required/>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a type="submit" name="submit" class="btn btn-primary" href="admin.php">Kembali</a>
    </form>
</div>
</body>
</html>