<?php
require "../controller/listePatientController.php";

?>

<!DOCTYPE html>
<html lang="fr">

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
            <input type="text" name="search" id="">
            <button type="submit" name="goSearch" class="btn btn-outline-primary">search</button>
            <button type="submit" name="ereaseSearch" class="btn btn-outline-danger">retour</button>
        </form>
        <table class="table">
            <th>Prénom</th>
            <th>Nom</th>
            <th>lien vers fiche</th>
            <th>Modifier</th>
            <?php
            foreach ($patientList as $key => $value) {
            ?>
                <tr>
                    <td><?= $value['firstname'] ?></td>
                    <td><?= $value['lastname'] ?></td>
                    <form action="../view/modifPatient.php" method="post">
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
        <center>
            <form action="" method="post">
                <select name="listNbr" id="">
                    <?php
                    foreach ($listChoice as $value) {
                    ?>
                        <option value="<?= $value ?>" <?= isset($_SESSION["listNbr"]) && $_SESSION["listNbr"] == $value  ? "selected='selected'" : "" ?>><?= $value ?></option>
                    <?php
                    }

                    ?>
                </select>
                <button type="submit">Go</button>
            </form>
            <nav>
                <?php
                if (isset($patientNbr)) {
                    for ($i = 1; $i <= $totalPages; $i++) {
                        if ($currentPage == $i) {
                ?>
                            <span> <?= $i ?> </span>
                        <?php
                        } else {
                        ?>
                            <a href="?page=<?= $i ?>"> <?= $i ?> </a>
                <?php
                        }
                    }
                }

                ?>
            </nav>
        </center>
    </div>

</body>

</html>