<?php
require "../controller/ajoutRendezVousController.php";
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
                <input type="datetime-local" name="dateHour" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="idPatient" class="form-label">Patient : </label>
                <select name="idPatient" id="">
                    <?php
                    foreach ($patientList as $value) {
                    ?>
                        <option value="<?= $value['id'] ?>">
                           <?=  $value['firstname'] . " ". $value['lastname'] ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" >Enregistrer</button>
        </form>
    </div>
</body>

</html>