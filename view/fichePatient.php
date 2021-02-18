<?php
require "../controller/fichePatientController.php";

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
        <h1>Votre Profil</h1>
        <p>Prénom : <?= $fiche[0]['firstname'] ?> </p>
        <p>Nom : <?= $fiche[0]['lastname'] ?> </p>
        <p>Date de naissance : <?= $fiche[0]['birthdate'] ?> </p>
        <p>Numéro dé téléphone : <?= $fiche[0]['phone'] ?> </p>
        <p>Adresse mail : <?= $fiche[0]['mail'] ?></p>
        <?php 
        if(isset($fiche[0]['dateHour'])){
        ?>
        <table class="table">
            <th>
                Vos rendez-vous
            </th>
            <?php
            foreach ($fiche as $value) {
            ?>
                <tr>
                    <td><?= $value["dateHour"] ?></td>
                </tr>
            <?php
            }
            ?>
        </table> <?php }
        ?>


        <a href="../index.php" class="btn btn-primary">Acceuil</a>
        <a href="../view/ajoutPatient.php" class="btn btn-primary">Ajouter Patient</a>
        <a href="../view/listePatient.php" class="btn btn-primary">Liste patients</a>
    </div>
</body>

</html>