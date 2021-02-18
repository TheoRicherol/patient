<?php
require "../models/Database.php";
require "../models/Patient.php";
require "../models/Rendezvous.php";

$patient = new Patient();
$appointment = new Rendezvous();

$patientList = $patient->getPatiens();

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

    if(isset($hour) && isset($minutes) &&isset($day) && isset($month) &&isset($year)){
        $dateHour = $year.$month.$day." ".$hour.$minutes."00";
    }
    

    if (isset($_POST["idPatient"]) && !empty($_POST["idPatient"])) {
        $idPatient = $_POST["idPatient"];
    }

    var_dump($dateHour);

    if (isset($year) && !empty($year) && isset($idPatient) && !empty($idPatient)) {
        $appointment->createAppointment($dateHour, $idPatient);
        header("Location: listeRendezVous.php");
    }
}
