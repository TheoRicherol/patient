<?php
require "../controller/modifPatientController.php";

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
    <div class="container mx-auto">
        <form action="" method="post" class="">
            <div class="mb-3">
                <label for="firstname">Prénom : </label>
                <input type="text" name="firstname" id="" value="<?= $fiche['firstname'] ?>">
            </div>

            <div class="mb-3">
                <label for="lastname">Nom : </label>
                <input type="text" name="lastname" id="" value="<?= $fiche['lastname'] ?>">
            </div>
            <div class="mb-3">
                <label for="birthdate">Date de naissance : </label>
                <input type="date" name="birthdate" id="" value="<?= $fiche['birthdate'] ?>">
            </div>
            <div class="mb-3">
                <label for="phone">Numéro de Téléphone : </label>
                <input type="text" name="phone" id="" value="<?= $fiche['phone'] ?>">
            </div>
            <div class="mb-3">
                <label for="mail">Adresse Mail : </label>
                <input type="text" name="mail" id="" value="<?= $fiche['mail'] ?>">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit" name="id" value="<?= $_POST['id'] ?>">Enregistrer</button>
                <button class="btn btn-danger" type="submit" name="delete" value="<?= $_POST['id'] ?>">Supprimer</button>
            </div>
        </form>
    </div>
</body>

</html>