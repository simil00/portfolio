<?php 
    define('IN_APP',true); 
    $strana =basename($_SERVER['PHP_SELF']);
    include "konekcija.php";
    include "menu.php";
    include "stranadal.php";
    $str = StranaDal::VratiStranu($strana);
?> 