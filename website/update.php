<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Anggota</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" 
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" 
    crossorigin="anonymous">
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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id
    if (isset($_GET['id'])) {
        $id=input($_GET["id"]);

        $sql="select * from pariwisata where id=$id";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id=htmlspecialchars($_POST["id"]);
        $nama=input($_POST["nama"]);
        $alamat=input($_POST["alamat"]);
        $kabupaten=input($_POST["kabupaten"]);
        $deskripsi=input($_POST["deskripsi"]);
        $gambar=input($_POST["gambar"]);
        $map=input($_POST["map"]);

        //Query update data pada tabel pariwisata
        $sql="update pariwisata set
			nama='$nama',
			alamat='$alamat',
            kabupaten='$kabupaten',
			deskripsi='$deskripsi',
			gambar='$gambar',
			map='$map'
			where id='$id'";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:admin.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";
        }

    }

    ?>
    <center><h2>Update Data</h2></center>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nama Wisata:</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" placeholder="Masukan Nama Wisata" required />
        </div>

        <div class="form-group">
            <label>Alamat:</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" placeholder="Masukan Alamat" required/>
        </div>

        <div class="form-group">
            <label>Kabupaten:</label>
            <input type="text" name="kabupaten" class="form-control" value="<?php echo $data['kabupaten']; ?>" placeholder="Masukan Kabupaten" required/>
        </div>

        <div class="form-group">
            <label>Deskripsi:</label>
            <textarea name="deskripsi" class="form-control" rows="10" placeholder="Masukan Deskripsi" required><?php echo $data['deskripsi']; ?></textarea>
        </div>

        <div class="form-group">
            <label>Gambar:</label>
            <input type="text" name="gambar" class="form-control" value="<?php echo $data['gambar']; ?>" placeholder="Masukan ID Gambar" required/>
        </div>

        <div class="form-group">
            <label>Maps:</label>
            <input type="text" name="map" class="form-control" value="<?php echo $data['map']; ?>" placeholder="Masukan ID Maps" required/>
        </div>

        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a type="submit" name="submit" class="btn btn-primary" href="admin.php">Kembali</a>
    </form>
</div>
</body>
</html>