<?php

require "../controller/fichePatientController.php"; 

    ?> 
    <p>Prénom : <?= $fiche['firstname'] ?> </p>
    <p>Nom : <?= $fiche['lastname'] ?> </p>
    <p>Date de naissance : <?= $fiche['birthdate'] ?> </p>
    <p>Numéro dé téléphone : <?= $fiche['phone'] ?> </p>
    <p>Adresse mail : <?= $fiche['mail'] ?> </p>


<a href="../index.php">Acceuil</a>
<a href="../view/ajoutPatient.php">Ajouter Patient</a>
<a href="../view/listePatient.php">Liste patients</a>