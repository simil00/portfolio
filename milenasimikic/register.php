<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija ✧ Milena Simikić</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/log_in.css">
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
    include "korisnik.php";
    $poruka = '';
    if (isset($_POST['btn_register'])) {
        $korisnicko_ime = isset($_POST['tb_korisnicko_ime']) ? $_POST['tb_korisnicko_ime'] : '';
        $lozinka = isset($_POST['tb_lozinka']) ? $_POST['tb_lozinka'] : '';
             
         $id = Korisnik::RegisterUser($korisnicko_ime, $lozinka);

         if ($id != -1) {
           
            $poruka = "<strong>Novi korisnik je registrovan!</strong>";
         }
         else{
            $poruka = "Greska" . $id;
         }
       
    }
    ?>
    <article class="wrapper">
    <div class="container-fluid">
        <div class ="row">
            <div class="col-3">

            </div>
            <div class="col-6">
            <h3 class="rnk">Registracija novog korisnika</h3>
            </div>
        
        </div>
        <div class="row mt-3">
            <div class="col-3">
                
            </div>
            <div class="col-6">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                            <label for="korisnicko_ime">korisničko ime:</label><br>
                            <input type="text" name="tb_korisnicko_ime" id="korisnicko_ime" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="lozinka">lozinka:</label><br>
                        <input type="password" name="tb_lozinka" id="tb_lozinka" required class="form-control">
                
                    </div>

                    <div class="form-group">
                        <label for="potvrda" >potvrdi lozinku:</label><br>
                        <input type="password" name="tb_potvrda" id="tb_potvrda" class="form-control" onblur="validatePassword()">
                
                    </div>
                    <div id="dgmp">
                    <input type ="submit" name="btn_register" class="btn btn-light" value = "registracija ->" >
                    </div>
                </form>
                <div id="adi2">
                <span><?php echo $poruka; ?></span>
</div>
            </div>

            <div class="col-3">

            </div>
        </div>
            <hr>
        <div class ="row mt-2">
            <div class="col-3">

            </div>
            <div class="col-6" id="adi">
            <a href="admin.php" class="linkpr">Administracija</a>
            </div>
            <div class="col-3">

            </div>
        </div>
    </div>
       
   
    
    <script>
        function validatePassword() {
            var password = document.getElementById("tb_lozinka");
            var confirm_password = document.getElementById("tb_potvrda");
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Lozinke se ne poklapaju!");
                confirm_password.focus();
            } else {
                confirm_password.setCustomValidity('');
            }

            confirm_password.reportValidity();
        }
    </script>
    </article>
</body>
</html>

