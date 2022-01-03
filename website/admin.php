<!DOCTYPE html>
<html>
<head>
    <title>Data Pariwisata</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<div class="container">
    <h2>Data Destinasi Pariwisata Yogyakarta</h2>
<?php

    include "koneksi.php";

    //Cek apakah ada nilai dari method GET dengan nama id
    if (isset($_GET['id'])) {
        $id=htmlspecialchars($_GET["id"]);

        $sql="delete from pariwisata where id='$id' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:admin.php");
            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>
    <div>
        <button><a href="tambah.php">Tambah Data</a></button>
        <button><a href="index.php">Preview</a></button>
        <button style="background: #f43648;"><a style="color: white" href="login.php">Log Out</a></button>
    </div>
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Wisata</th>
            <th>Alamat</th>
            <th>Kabupaten</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Maps</th>
            <th>Aksi</th>

        </tr>
        </thead>
        <?php
        include "koneksi.php";
        $sql="select * from pariwisata order by id asc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["alamat"];?></td>
                <td><?php echo $data["kabupaten"];?></td>
                <td><?php echo substr($data["deskripsi"],0,700);?>...</td>
                <td><div class="card"><img class="modified-img" src=<?php echo $data["gambar"];?>></div></td>
                <td><?php echo substr($data["map"],0,60);?>...</td>
                <td class="opt">
                    <a class="tombol1" href="update.php?id=<?php echo htmlspecialchars($data['id']); ?>">Update</a><br><br>
                    <a class="tombol2" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id=<?php echo $data['id']; ?>">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table><br><br>
</div>
</body>
</html>