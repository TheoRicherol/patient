<?php
require "../controller/ajoutRendezvousPatientController.php"
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
        <?= isset($_POST) && !empty($_POST) ? $errors['birthdate'] : "" ?>
        <label for="phone">Numéro de Téléphone : </label>
        <input type="text" name="phone" id="">
        <label for="mail">Adresse Mail : </label>
        <input type="text" name="mail" id="">
        <?= isset($_POST) && !empty($_POST) ? $errors['mail'] : "" ?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="dateHour" class="form-label">Date et heure de RDV : </label>
                <select name="hour" class="custom-select" id="">

                    <?php for ($i = 8; $i < 20; $i++) {
                    ?>
                        <option value="<?= str_pad($i, 2, "0", STR_PAD_LEFT) . ":" ?>"><?= str_pad($i, 2, "0", STR_PAD_LEFT) ?></option>
                    <?php
                    };
                    ?>


                </select>
                <span>H</span>
                <select name="minutes" class="custom-select" id="">
                    <?php for ($i = 0; $i <= 45; $i += 15) {
                    ?>
                        <option value="<?= str_pad($i, 2, "0", STR_PAD_LEFT) . ":" ?>"> <?= str_pad($i, 2, "0", STR_PAD_LEFT) ?></option>
                    <?php
                    };
                    ?>
                </select>
                <span>le : </span>
                <select name="day" class="custom-select" id="">
                    <?php for ($i = 1; $i <= 31; $i++) {
                    ?>
                        <option value="<?= str_pad($i, 2, "0", STR_PAD_LEFT) ?>"><?= str_pad($i, 2, "0", STR_PAD_LEFT) ?></option>
                    <?php
                    };
                    ?>
                </select>
                <select name="month" class="custom-select" id="">
                    <?php for ($i = 1; $i <= 12; $i++) {
                    ?>
                        <option value="<?= str_pad($i, 2, "0", STR_PAD_LEFT) . "-" ?>"><?= str_pad($i, 2, "0", STR_PAD_LEFT) ?></option>
                    <?php
                    };
                    ?>
                </select>
                <select name="year" class="custom-select" id="">
                    <?php for ($i = 2020; $i <= 2100; $i++) {
                    ?>
                        <option value="<?= $i . "-" ?>"><?= $i ?></option>
                    <?php
                    };
                    ?>
                </select>
            </div>
            <button type="submit">Go</button>
        </form>
</body>

</html>