<?php

require "../models/Database.php";
require "../models/Patient.php";
require "../models/Rendezvous.php";

$patient = new Patient();
$appointment = new Rendezvous();




if (isset($_POST) && !empty($_POST)) {
    if (isset($_POST["hour"])) {
        $hour = $_POST["hour"];
    }

    if (isset($_POST["minutes"])) {
        $minutes = $_POST["minutes"];
    }

    if (isset($_POST["day"])) {
        $day = $_POST["day"];
    }

    if (isset($_POST["month"])) {
        $month = $_POST["month"];
    }

    if (isset($_POST["year"])) {
        $year = $_POST["year"];
    }

    if (isset($hour) && isset($minutes) && isset($day) && isset($month) && isset($year)) {
        $dateHour = $year . $month . $day . " " . $hour . $minutes . "00";
    }



    if (isset($_POST["idPatients"]) && !empty($_POST["idPatients"])) {
        $idPatient = $_POST["idPatients"];
    }

    if (isset($_POST["idAppointment"]) && !empty($_POST["idAppointment"])) {
        $idAppointment = $_POST["idAppointment"];
    }



    if (isset($year) && !empty($year) && isset($idPatient) && !empty($idPatient) && isset($_POST["idAppointment"])) {
        $appointment->updateAppointment($dateHour, $idPatient, $idAppointment);
        header("Location: listeRendezVous.php");
    }
    if (isset($_POST["delete"])) {
        $appointment->deleteAppointment($_POST['delete']);
        header("Location: listeRendezVous.php");
    }
}

$fiche = $appointment->getAppointment($_POST['id']);
$patientList = $patient->getPatiens();