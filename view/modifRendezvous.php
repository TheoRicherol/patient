<?php
require "../controller/modifRendezvousController.php";
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

            <div class="mb-3">
                <label for="idPatients" class="form-label">Patient : </label>
                <select name="idPatients" id="">
                    <?php
                    foreach ($patientList as $value) {

                    ?>
                        <option value="<?= $value['id'] ?>">
                            <?= $value['firstname'] . " " . $value['id'] ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="idAppointment" value="<?= $fiche['id'] ?>" class="btn btn-primary">Enregistrer</button>
            <button type="submit" name="delete" value="<?= $fiche['id'] ?>" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
</body>

</html>