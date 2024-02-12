<?php 
     
      if (empty($_SESSION['username']))
       { echo " <script> alert('Login is required to view this page')
        document.location = 'login.php' </script>"; }
         ?>