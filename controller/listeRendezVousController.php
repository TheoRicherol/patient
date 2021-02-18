<?php
require "../models/Database.php";
require "../models/Patient.php";
require "../models/Rendezvous.php";

$appointment = new Rendezvous();
$patient = new Patient();


$liste = $appointment->getAgenda();

if (isset($_POST["delete"]) && !isset($_POST['id'])) {
    var_dump(($_POST));
    $appointment->deleteAppointment($_POST['delete']);
    header("Location: listeRendezVous.php");
}

