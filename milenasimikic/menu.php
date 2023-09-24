<?php 
if (!defined('IN_APP')) {
  header("Location:home.php"); 
}
$tekuca_strana = $strana;
require "model.php";
?>
<link rel="stylesheet" href="style/menu.css">
<nav class="nav">
<a class="navbar-brand" href="home.php" id= "logo">      
            <img src="images/MS_menu_logo.png" height="70" alt="logo">            
        </a>
  <!-- <a class="nav-link" href="home.php">početna</a>
  <a class="nav-link" href="projekti.php">projekti</a>
  <a class="nav-link" href="kontakt.php">kontakt</a> -->
  <?php 
            foreach ($menu as $stavka) {                
              if ($stavka[0] == $tekuca_strana ) {
              echo "<a class='nav-link active' href='$stavka[0]'>$stavka[1]</a>";
              }
              else{
                echo "<a class='nav-link' href='$stavka[0]'>$stavka[1]</a>";
              }
            }
            ?>    
</nav>