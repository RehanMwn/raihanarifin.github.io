<div class="page">
<html>
 <head> <div class="page">
         <h1 class="heading">Menampilkan Tabel Restoran</h1>
         <link rel="stylesheet" type="text/css" href="table.css"> </div> 
        </head> 
        <body>
<a href="tambahrestoran.php" class="add">Tambahkan Data</a> 
<a href="index.php?page=dash" class="bk">Kembali</a>
<h2>Cari Kuliner</h2>
  <form method="post" action="">
    <label for="kategori">Berdasarkan:</label>
    <select id="kategori" name="kategori">
      <option value="nama_restoran">Nama restoran</option>
      <option value="menu">Menu</option>
      <option value="rating_restoran">Rating</option>
      <option value="alamat">Alamat</option>
    </select>
    <label for="search">Search:</label>
    <input type="text" name="search" id="search" autocomplete="off" placeholder="Cari...">
    <input type="submit" name="submit" value="Search">
  </form>

  <?php
  // Koneksi ke database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "kuliner_sukodono";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!isset($_SESSION['username'])) {
    // jika belum login, redirect ke halaman login
    header('Location: alert.php');
    exit();
  }
  

  // Cek koneksi
  if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
  }

  // Cek apakah form pencarian telah di-submit
  if(isset($_POST['submit'])) {
    // Tangkap kata kunci pencarian dan kategori yang dipilih
    $search = $_POST['search'];
    $kategori = $_POST['kategori'];

    // Kolom yang akan digunakan dalam query
    $column = '';
    if ($kategori === 'nama_restoran') {
      $column = 'nama';
    } elseif ($kategori === 'rating_restoran') {
      $column = 'rating_restoran';
    } elseif ($kategori === 'alamat') {
    $column = 'alamat';
    } elseif ($kategori === 'menu') {
      $column = 'menu';
    }

    // Query pencarian
    $sql = "SELECT * FROM restoran WHERE $column LIKE '%$search%'";

    // Eksekusi query
    $result = mysqli_query($conn, $sql);

    // Cek apakah hasilnya ada
    if(mysqli_num_rows($result) > 0) {
        echo "Menampilkan Pencarian untuk '$search'";

      // Simpan data histori pencarian ke dalam database
      $sql = "INSERT INTO histori (kategori, search) VALUES ('$kategori', '$search')";
      mysqli_query($conn, $sql);
    } else {
      // Tampilkan pesan bahwa tidak ditemukan hasil pencarian
      echo "Tidak ditemukan hasil pencarian untuk '$search'";

      // Simpan data histori pencarian ke dalam database
      $sql = "INSERT INTO histori (kategori, search) VALUES ('$kategori', '$search')";
      mysqli_query($conn, $sql);
    }
  } else {
    // Query untuk menampilkan semua data restoran
    $sql = "SELECT * FROM restoran";

    // Eksekusi query
    $result = mysqli_query($conn, $sql);

    // Tampilkan semua data restoran dalam kotak-kotak

    // Tutup koneksi
    mysqli_close($conn);
  }
  ?>
</div>
<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Restoran</th>
                <th>Gambar Restoran</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Jam Buka - Jam Tutup</th>
                <th>Deskripsi</th>
                <th>Menu</th>
                <th>Rating Restoran</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";

            // Cek apakah form pencarian telah di-submit
            if (isset($_POST['submit'])) {
                // Tangkap kata kunci pencarian dan kategori yang dipilih
                $search = $_POST['search'];
                $kategori = $_POST['kategori'];

                // Kolom yang akan digunakan dalam query
                $column = '';
                if ($kategori === 'nama_restoran') {
                    $column = 'nama';
                } elseif ($kategori === 'rating_restoran') {
                    $column = 'rating_restoran';
                } elseif ($kategori === 'alamat') {
                    $column = 'alamat';
                } elseif ($kategori === 'menu') {
                    $column = 'menu';
                }

                // Query pencarian
                $query_mysql = mysqli_query($mysqli, "SELECT * FROM restoran WHERE $column LIKE '%$search%'");
            } else {
                $query_mysql = mysqli_query($mysqli, "SELECT * FROM restoran");
            }

            $nomor = 1;
            if (mysqli_num_rows($query_mysql) > 0) {
                while ($data = mysqli_fetch_array($query_mysql)) {
                    ?>
                    <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['gambar']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                        <td><?php echo $data['telepon']; ?></td>
                        <td><?php echo $data['jam_buka_jam_tutup']; ?></td>
                        <td><?php echo $data['deskripsi']; ?></td>
                        <td><?php echo $data['menu']; ?></td>
                        <td><?php echo $data['rating_restoran']; ?></td>
                        <td><a href="hapusrestoran.php?id=<?php echo $data['id_restoran']; ?>"
                               class="delete">Delete</a></td>
                        <td><a href="editrestoran.php?id=<?php echo $data['id_restoran']; ?>" class="edit">Edit</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="10"></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
