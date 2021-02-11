<?php
require "../controller/ajoutPatientController.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <label for="firstname">Prénom : </label>
        <input type="text" name="firstname" id="">
        <?= isset($_POST) && !empty($_POST) ? $errors['firstname'] : "" ?>
        <label for="lastname">Nom : </label>
        <input type="text" name="lastname" id="">
        <?= isset($_POST) && !empty($_POST) ? $errors['lastname'] : "" ?>
        <label for="birthdate">Date de naissance : </label>
        <input type="date" name="birthdate" id="">
        <?= isset($_POST) && !empty($_POST) ? $errors['birthdate'] :"" ?>
        <label for="phone">Numéro de Téléphone : </label>
        <input type="text" name="phone" id="">
        <label for="mail">Adresse Mail : </label>
        <input type="text" name="mail" id="">
        <?=isset($_POST) && !empty($_POST) ? $errors['mail'] :""?>
        <button type="submit">Go</button>
    </form>
</body>

</html>