<?php
require "../controller/listeRendezVousController.php";

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
        <?php if ($liste) { ?>
            <table class="table">
                <th>Patient</th>
                <th>Date et Heure</th>
                <?php
                foreach ($liste as $value) {
                ?>

                    <tr>
                        <form action="../view/modifRendezvous.php" method="post">
                            <td><?= $value['firstname'] . " " . $value['lastname'] ?></td>
                            <td><?= strftime( "%A %d %B %Y", strtotime($value['dateHour'])) ?></td>
                            <td><a href=""></a></td>
                            <td>
                            <td><a href="<?= "../view/ficheRendezvous.php?id=" . htmlspecialchars($value['id']) ?>" class="btn btn-primary">Plus d'informations</a></td>
                            <td> <button class="btn btn-primary" type="submit" name="id" value="<?= $value['id'] ?>">Modifier RDV</button></td>
                        </form>
                        <form action="" method="post">
                            <td><button type="submit" name="delete" value="<?= $value['id'] ?>" class="btn btn-danger">Supprimer</button></td>
                        </form>
                    </tr>


                <?php
                }
                ?>
            </table>
        <?php
        } else {
        ?>
            <h1>Vous n'avez aucun RDV</h1>
        <?php
        }
        ?>


        <a href="../index.php" class="btn btn-primary">Acceuil</a>
        <a href="../view/ajoutRendezvous.php" class="btn btn-primary">Ajouter RDV</a>
    </div>
</body>

</html>