<?php
require "../controller/listePatientController.php";
// var_dump($_POST)
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
        <table class="table">
            <th>Prénom</th>
            <th>Nom</th>
            <th>lien vers fiche</th>
            <th>Modifier</th>
            <?php
            foreach ($patientList as $key => $value) {
            ?>
                <tr>
                    <form action="../view/modifPatient.php" method="post">
                        <td><?= $value['firstname'] ?></td>
                        <td><?= $value['lastname'] ?></td>
                        <td><a href="<?= "../view/fichePatient.php?id=" . htmlspecialchars($value['id']) ?>" class="btn btn-primary">Plus d'informations</a></td>
                        <td><button type="submit" name="id" value="<?= $value['id'] ?>" class="btn btn-primary">Modifier</button></td>
                    </form>
                </tr>
            <?php

            }
            ?>
        </table>

        <a href="../index.php" class="btn btn-primary">Acceuil</a>
        <a href="../view/ajoutPatient.php" class="btn btn-primary">Ajouter Patient</a>
        <a href="../view/listePatient.php" class="btn btn-primary">Liste patients</a>
    </div>


</body>

</html>