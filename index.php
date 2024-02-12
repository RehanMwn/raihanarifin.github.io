<html lang="en">
<head>
<title>Informasi Kuliner Sukodono | SUKO FOOD</title>
    <meta charset="UTF-8">
    <meta name="description" contents="Kuliner Sukodono">
    <link rel="stylesheet" href="iicss.css">
</head>
<body>
    <header>
    <h1 class="title">SUKO FOOD</h1>
    <br>
        <h3 class="desc">Informasi Kuliner Sukodono</h3>
        
        <hr>
        <nav id="navigation">
  <ul>
    <li><a href="index.php?page=home">Home</a></li>
    <li><a href="index.php?page=about">About</a></li>
    <li><a href="index.php?page=contacts">Contacts</a></li>
    <?php
    session_start();
    // Cek apakah pengguna sudah login
    if(isset($_SESSION['username'])) {
      echo '<li><a href="index.php?page=dash">Dashboard</a></li>';
      echo '<li><a href="index.php?page=profil">Profil</a></li>';
      echo '<li><a href="index.php?page=logout" onclick="return confirmLogout()">Logout</a></li>';
    } else {
      echo '<li><a href="login.php">Login</a></li>';
    }
    ?>
  </ul>
</nav>
    </header>
    <div id="contents">
        <?php 
        if(isset($_GET['page'])){
            $page = $_GET['page'];
 
            switch ($page) {
                case 'home':
                include "home.php";
                break;
                case 'about':
                include "about.php";
                break;
                case 'contacts':
                include "contacts.php";
                break;    
                case 'dash':
                include "dash.php";
                break;
                case 'profil':
                include "profil.php";
                break;
                case 'logout':
                include "logout.php";
                break;
                case 'rec':
                include "arec.php";
                break;
                case 'restoran':
                include "restoran.php";
                break;
                case 'user':
                include "user.php";
                break;
                case 'review':
                include "review.php";
                break;
                case 'histori':
                include "histori.php";
                break;
                case 'revieu':
                include "revieu.php";
                break;
            }
        }
else{
            include "home.php";
        }
        ?>
 
    </div>
    <script>
    function confirmLogout() {
        var confirmation = confirm("Apakah Anda yakin ingin logout?");
        if (confirmation) {
            window.location.href = "logout.php";
        } else {
            return false;
        }
    }
</script>
<br><br><br><br><br><br><br><br><br><br><br>
<hr>
    <footer>
        &copy Hak Cipta PT. SUKO FOOD 2023 | Web Kuliner Terbaik Sukodono by @Raihan Arifin <br><br> Terkait dalam dalam ketentuan Pasal 65 ayat (1) dan (3) jo. Pasal 67 ayat (1) dan (3) UU PDP, <br> Barang siapa dengan sengaja ngehack website ini, maka akan dikenakan pidana mati tanpa terkecuali. <br><br><br><br>
    </footer>
    
</body>
</html>
<?php




?>