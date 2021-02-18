<?php
require "../controller/ficheRendezvousController.php";

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
    <h1>Fiche RDV</h1>
    <p><strong>Prénom :</strong> <?= $fiche['firstname'] ?></p>
    <p><strong>Nom :</strong> <?= $fiche['lastname'] ?></p>
    <p><strong>Date de Naissance :</strong> <?= $fiche['birthdate'] ?></p>
    <p><strong>Télépohne :</strong> <?= $fiche['phone'] ?></p>
    <p><strong>Mail :</strong> <?= $fiche['mail'] ?></p>
    <p><strong>RDV le : </strong> <?= $fiche['dateHour'] ?></p>
    <form action="">

    </form>
    <a href="../index.php" class="btn btn-primary">Acceuil</a>
    <a href="../view/listeRendezVous.php" class="btn btn-primary">Liste RDV</a>
    </div>
</body>

</html>