<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>✧ Admin stranica ✧</title>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/admin.css">
    <script src="https://cdn.tiny.cloud/1/f4cfb069kaw47pzyn1pn4tokacac1kc3rjm1ifl01vj7akl7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="shortcut icon" type="image/png" sizes="32x32" href="images/MS.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@800&display=swap" rel="stylesheet">
</head>
<body>

<?php 
session_start();
$poruka = '';
if(isset($_SESSION['korisnik_id'])&&isset($_SESSION['korisnicko_ime'])){
    $poruka = "Vi ste korisnik: " . $_SESSION['korisnicko_ime'];
} else {
    header("location: login.php");
}
    

define('IN_APP',true);
$strana = "admin.php";
include "konekcija.php";
include "menu.php";
include "stranadal.php";

$selektovana_strana = "";
$selectovana_strana_naziv= "";
$selectovana_strana_naslov = "";
$selectovana_strana_glavni_deo = "";

if (isset($_GET['str'])) {
    
    $selektovana_strana = $_GET['str'];
    if ($selektovana_strana !=-1) {
        $str = StranaDal::VratiStranu($selektovana_strana);
        $selectovana_strana_naziv = $str->naziv_stranice;
        $selectovana_strana_naslov = $str->naslov;
        $selectovana_strana_glavni_deo = $str->glavni_deo_stranice;
    }
    
}

if (isset($_POST['btn_delete'])) {

    $selektovana_strana = $_GET['str'];
    if ($selektovana_strana !=-1){
        $str = StranaDal::VratiStranu($selektovana_strana);
        $id = StranaDal::ObrisiStranu($str->id);
    
        if ($id != -1) {
            
            $status=unlink($selektovana_strana);    
            
            header("location: admin.php");
        }
    }
}

    if (isset($_POST['btn_insert'])) {

        $novi_naziv= strtolower($_POST['tb_naziv']);
        $nova_strana = $novi_naziv . ".php";
        $novi_naslov = $_POST['ta_naslov'];
        $novi_glavni_deo = $_POST['ta_glavni'];

        $novi_id = StranaDal::UbaciStranu($nova_strana, $novi_naziv, $novi_naslov, $novi_glavni_deo);
        if ($novi_id > 0) {        
                $homepage = file_get_contents("index.php");
                file_put_contents($nova_strana, $homepage);
                
                header("location: admin.php?str=" . $nova_strana); 
        }
        
    }


    if (isset($_POST['btn_update'])) {

        $selektovana_strana = $_GET['str'];
        if ($selektovana_strana !=-1) {
            $novi_naziv= strtolower($_POST['tb_naziv']);
            $nova_strana = $novi_naziv . ".php";
            $novi_naziv = $novi_naziv;
            $novi_naslov = $_POST['ta_naslov'];
            $novi_glavni_deo = $_POST['ta_glavni'];
            $str1 = StranaDal::VratiStranu($selektovana_strana);
            $novi_id = StranaDal::PromeniStranu($str1->id,$nova_strana, $novi_naziv, $novi_naslov, $novi_glavni_deo);
            if ($novi_id > 0) {
                header("location: admin.php?str=" . $nova_strana);
            }
        }
    }
    $strane = StranaDal::VratiStrane();
 ?>
 <article class="wrapper">
   
    <h2 class="title">✧ Milena Simikić</h2>       

   <div class="container-fluid"> 
      <div class="row mb-3">
        <div class="col-1">
            
        </div>

        <div class="col-10">    
                    
        <a href="register.php" id="regr" style="color:white;">Registracija novog korisnika</a>
        <a href="logout.php" style="color:white;">Odjavi se</a>

         <hr>      
        </div>

        <div class="col-1">

        </div>

     </div>
    <div class="row">
        <div class="col-1">
        </div>

        <div class="col-10">
        <h3 class="podnaslov">✧Admin stranica web sajta✧</h3>
        <form action="" method="post">
        
        <select name="selektovana_strana" onchange="window.location='admin.php?str='+ this.value">
          <option value="-1">Pravite novu stranicu</option>
          <?php 
           foreach ($strane as $tekuca_strana) { 
            echo "<option ".($selektovana_strana == $tekuca_strana->strana ? "selected" : "").">";
            echo $tekuca_strana->strana;
            echo "</option>";
            }     
          ?>
         
        </select>
       
        <br>
        <br>

        Naziv stranice: <input type="text" name="tb_naziv" value="<?php echo $selectovana_strana_naziv; ?>">
        <br>
        <br>
        <br>
        <br>
        Naslov stranice: <br><br>
        <textarea name="ta_naslov" rows="10" cols="50"><?php echo $selectovana_strana_naslov; ?>
        </textarea>
        <br>
        <br>
       Glavni sadržaj stranice: <br><br>
        <textarea name="ta_glavni" rows="30" cols="50"><?php echo $selectovana_strana_glavni_deo; ?>
    </textarea>
        <br>
        <br>
        <input type="submit" name="btn_insert" value="+ dodaj novu stranicu" />
        <input type="submit" name="btn_update" value="✎ izmeni odabranu stranicu" />
        <input type="submit" name="btn_delete" value="🗑 obriši odabranu stranicu" />
    </form>
       <br>
       <br>
        </div>

        <div class="col-1">
           
        </div>
     </div>

        
   
        
</div>
 
<script>
        tinymce.init({
            selector: "textarea",
            extended_valid_elements: "link[rel|href|type],script[language|type|src]",
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | block_formats: 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;'"
        });
    </script>
</article>
</body>
</html>