<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ✧ Milena Simikić</title>
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
    include "korisnik.php";
    
    $korisnicko_ime = '';
    $lozinka = '';
    $poruka = '';
    if (isset($_POST['btn_submit'])) {
        
  
        $korisnicko_ime = isset($_POST['username']) ? $_POST['username'] : '';
        $korisnicko_ime = str_replace("'","",$_POST['username']);
        $korisnicko_ime = str_replace("<","",$korisnicko_ime);
        $korisnicko_ime = str_replace(">","",$korisnicko_ime);
        
        $lozinka = isset($_POST['password']) ? $_POST['password'] : '';

        $lozinka = str_replace("'","",$_POST['password']);
        $lozinka = str_replace("<","",$lozinka);
        $lozinka = str_replace(">","",$lozinka);

        
        if ($korisnicko_ime != '' && $lozinka != '') {
            $validno = 1;
            
            $u = Korisnik::FindUser($korisnicko_ime, $lozinka);
            if ($u != null) {  
                            
	            $_SESSION['korisnik_id'] = $u->korisnik_id;
	            $_SESSION['korisnicko_ime'] = $u->korisnicko_ime;
                header("location: admin.php");
               
               
            } else {
                $poruka= "Neispravno korisnicko ime i/ili lozinka!";
               
            }
        }
      
    }
    ?>
    <article class="wrapper">
    <div id="login">
    <h3 class="text-center  pt-5" id="adm">Administracija</h3>
    
    <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-6">
                    <div id="login-box" class="col-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center" id="log">Login</h3>
                            <div class="form-group">
                                <label for="username">korisničko ime:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">lozinka:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                           
                            </div>
                            <div class="form-group" id="dgmp">
                                <input type="submit" name="btn_submit" class="btn btn-light btn-md" value="prijavi se ->">
                                <br>
                                <span class="text-info"><?php echo $poruka; ?></span>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
</body>
</html>