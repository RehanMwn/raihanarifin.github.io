<html>
     <head> <div class="page">
         <h1 class="heading">Menampilkan Tabel Histori Pencarian</h1>
         <link rel="stylesheet" type="text/css" href="table.css"> </div> 
        </head> 
        <body>
<a href="index.php?page=dash" class="bk">Kembali</a>
<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Histori Pencarian</th>
                <th>Waktu Pencarian</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            if (!isset($_SESSION['username'])) {
                // jika belum login, redirect ke halaman login
                header('Location: alert.php');
                exit();
              }
            $query_mysql = mysqli_query($mysqli, "SELECT * FROM histori");
            $nomor = 1;
            while ($data = mysqli_fetch_array($query_mysql)) {
            ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $data['kategori']; ?></td>
                    <td><?php echo $data['search']; ?></td>
                    <td><?php echo $data['created_at']; ?></td>
                    <td><a href="hapushistori.php?id=<?php echo $data['id_histori']; ?>" class="delete">Delete</a></td>
                    <td><a href="edithistori.php?id=<?php echo $data['id_histori']; ?>" class="edit">Edit</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</div>
</body>
 </html>
