<?php 
include "konekcija.php";
class Korisnik{
    public $korisnik_id;
    public $korisnicko_ime;
    public $lozinka;

    public static function FindUser($korisnicko_ime, $lozinka)
    {
        $lozinka = md5($lozinka);
        $sql = "SELECT korisnik_id, korisnicko_ime, lozinka FROM korisnici WHERE korisnicko_ime = '{$korisnicko_ime}' AND lozinka = '{$lozinka}'";
        $conn = Konekcija::Connect();
        $result = $conn->query($sql);
        if ($result->num_rows >0) {
   
            $u = $result->fetch_object('Korisnik'); 
          
            $conn->close();
            return $u;
         }
         else {
            $conn->close();
           
            return null;
         }
  
    }
    public static function RegisterUser($korisnicko_ime, $lozinka){
        $conn = Konekcija::Connect();   
        $lozinka = md5($lozinka);
       
        if ($conn== null) {
            die("Greska pri uspostavljanju konekcije!");
        }
        $sql = "INSERT INTO korisnici(korisnicko_ime, lozinka) VALUES('{$korisnicko_ime}','{$lozinka}')";
        if($conn->query($sql) == true){
            $id = $conn->insert_id;
            $conn->close();
            return $id;
        }
        else {
            $conn->close();
            return -1;
        }   
    }
}
?>