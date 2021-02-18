<?php
require "../mySQLPatient/controller/indexController.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row h-100 justify-content-center align-items-center">
            <a href="view/ajoutPatient.php" class="btn btn-primary col-3 m-3">Créer un patient</a>
            <a href="/view/listePatient.php" class="btn btn-primary col-3 m-3">Liste des patients</a>
            <a href="/view/listeRendezVous.php" class="btn btn-primary col-3 m-3">Liste RDV</a>
            <a href="/view/ajoutRendezvousPatient.php" class="btn btn-primary col-3 m-3">Ajout RDV + Patient</a>
            
        </div>
    </div>

</body>

</html>