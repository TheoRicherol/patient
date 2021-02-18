<?php

require "../models/Database.php";
require "../models/Patient.php";
require "../models/Rendezvous.php";


$regexName = "/^\D*$/";
$regexMail = "/^.*[@].*[.]\D{1,4}$/";
$regexBirth = "/^[1-2][0-9]{3}[-][0-1][0-9][-]([0-2][0-9]|[3][0-1])$/";


$patient = new Patient();
$appointment = new Rendezvous();
$errors = [];

if (isset($_POST) && !empty($_POST)) {
    if (empty($_POST["firstname"])) {
        $errors["firstname"] = "Remplir cette case";
    } else if (!preg_match($regexName, $_POST["firstname"])) {
        $errors["firstname"] = "Le format n'est pas bon";
    } else {
        $errors["firstname"] = "";
        $firstname = htmlspecialchars($_POST["firstname"]);
    }

    if (empty($_POST["lastname"])) {
        $errors["lastname"] = "Remplir cette case";
    } else if (!preg_match($regexName, $_POST["lastname"])) {
        $errors["lastname"] = "Le format n'est pas bon";
    } else {
        $errors["lastname"] = "";
        $lastname = htmlspecialchars($_POST["lastname"]);
    }

    if (empty($_POST["birthdate"])) {
        $errors["birthdate"] = "Remplir cette case";
    } else if (!preg_match($regexBirth, $_POST["birthdate"])) {
        $errors["birthdate"] = "Le format n'est pas bon";
    } else {
        $errors["birthdate"] = "";
        $birthdate = htmlspecialchars($_POST["birthdate"]);
    }

    if (empty($_POST["mail"])) {
        $errors["mail"] = "Remplir cette case";
    } else if (!preg_match($regexMail, $_POST["mail"])) {
        $errors["mail"] = "Le format n'est pas bon";
    } else {
        $errors["mail"] = "";
        $mail = htmlspecialchars($_POST["mail"]);
    }

    empty($_POST["phone"]) ? $errors["phone"] = "Remplir cette case" : $phone = $_POST["phone"];

    if (isset($firstname) && isset($lastname) && isset($birthdate) && isset($phone) && isset($mail)) {
        $patient->newPatient($lastname, $firstname, $birthdate, $phone, $mail);
        $idPatient = $patient->getLastPatient();
    }


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


    if (isset($year) && !empty($year) && isset($idPatient) && !empty($idPatient)) {
        $appointment->createAppointment($dateHour, $idPatient["idPatient"]);
        header("Location: listeRendezVous.php");
    }
}
