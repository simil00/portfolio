<?php 
include "strana.php";
class StranaDal{ 
public static function VratiStranu ($strana)
    {
        
        $conn = Konekcija::Connect();
        if ($conn== null) {
            die("Greska pri uspostavljanju konekcije!");
        }
        $sql = "SELECT * FROM strane WHERE strana='{$strana}'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
            $strana = $result->fetch_object('Strana');
            return $strana;
        }
        else{
            return null;
        }
        
        $conn->close();
        
    }

    public static function VratiStrane ()
    {
        $strane = array();
        $conn = Konekcija::Connect();
        if ($conn== null) {
            die("Greska pri uspostavljanju konekcije!");
        }
        $sql = "SELECT * FROM strane";
        $result = $conn->query($sql);
        while ($strana = $result->fetch_object('Strana')) {
            array_push($strane, $strana);
        }
        $conn->close();
        return $strane;
    }  


public static  function UbaciStranu($strana, $naziv_stranice, $naslov, $glavni_deo_stranice)
    {
        $conn = Konekcija::Connect();
        if ($conn== null) {
            die("Greska pri uspostavljanju konekcije!");
        }
        $sql = "INSERT INTO strane(strana, naziv_stranice, naslov, glavni_deo_stranice) VALUES('{$strana}','{$naziv_stranice}','{$naslov}','{$glavni_deo_stranice}')";
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



public static function PromeniStranu($id, $strana, $naziv_stranice, $naslov, $glavni_deo_stranice)
    {
        
        $sql = "UPDATE strane SET strana='{$strana}',naziv_stranice='{$naziv_stranice}',naslov='{$naslov}',glavni_deo_stranice='{$glavni_deo_stranice}' WHERE id ='{$id}'";
        $conn = Konekcija::Connect();
        if ($conn== null) {
            die("Greska pri uspostavljanju konekcije!");
        }
        if ($conn->query($sql) == true) {
            return 1;
        }
        else {
            return -1;
        }
    }

    public static function ObrisiStranu($id)
    {
        $sql ="DELETE FROM strane WHERE id ='{$id}'";
        $conn = Konekcija::Connect();
        if ($conn== null) {
            die("Greska pri uspostavljanju konekcije!");
        }
        if ($conn->query($sql) == true) {
            return 1;
        }
        else {
            return -1;
        }
    } 
}  
?>