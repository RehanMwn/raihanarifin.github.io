<!DOCTYPE html>
<html>
<head>
    <title>Tabel Data - Restoran</title>
    <link rel="stylesheet" type="text/css" href="dash.css">
</head>
<body>
    <div class="header">
        <h1 class="heading">Tabel Data</h1>
        <nav class="navigation">
            <ul>
                <li><a href="index.php?page=restoran">Restoran</a></li>
                <li><a href="index.php?page=user">User</a></li>
                <li><a href="index.php?page=review">Review</a></li>
                <li><a href="index.php?page=histori">Histori</a></li>
            </ul>
        </nav>
    </div>
    <div class="page">
        <!-- Konten tabel -->
    </div>
</body>
</html>
<?php
if (!isset($_SESSION['username'])) {
    // jika belum login, redirect ke halaman login
    header('Location: alert.php');
    exit();
  }
  ?>