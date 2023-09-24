<?php 
class Konekcija{
 const servername = "localhost";
 const username = "root";
 const password = "";
 const dbname = "mojsajtdb";

 public static function Connect()
 {
    $cnn = new mysqli(self::servername, self::username, self::password, self::dbname);
    if ($cnn->connect_error) {
        return null;
    }
    return $cnn;

 }
}
?>