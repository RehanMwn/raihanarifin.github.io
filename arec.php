<div class="page">
<head>
    <body>
        <div class="container">
        <h1>Coming Soon!</h1>
    </body>
</head>
</div>
<?php
if (!isset($_SESSION['username'])) {
    // jika belum login, redirect ke halaman login
    header('Location: alert.php');
    exit();
  }
?>
<body>
    <a href="https://jogjagamers.org/profile/109119-kangsmwn/">Tes doang</a>
</body>