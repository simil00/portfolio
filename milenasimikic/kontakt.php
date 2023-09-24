<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt ✧ Milena Simikić</title>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/projekti_kontakt.css">
    <link rel="shortcut icon" type="image/png" sizes="32x32" href="images/MS.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.0/css/all.css">
</head>
<body>
<?php 
    include "uvodna_strana.php";
?>

<article class="wrapper">
<h4 class=naslov2>
<?php 
     echo $str-> naslov;
?>
</h4>
<div class="kontaktdiv">
<h5 class="kontakth5">pronađi me na mrežama: </h5>
<a href="https://github.com/simil00" class="btn btn-dark" type="button" id="dgm1"  target="_blank">
<span><i class="fa-brands fa-github"></i></span> <span>GitHub</span>
</a>
<a href="https://rs.linkedin.com/in/milena-simikić-189426235?trk=people-guest_people_search-card" class="btn btn-dark" type="button" target="_blank" id="dgm2">
<span><i class="fa-brands fa-linkedin"></i></span> <span>Linkedin</span>
</a>
</div>
<?php 
     echo $str-> glavni_deo_stranice;
  ?>
</article>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>