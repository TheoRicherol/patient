<?php
require "../models/Database.php";
require "../models/Patient.php";
require "../models/Rendezvous.php";

$errors = [];
$regexName = "/^\D*$/";
$regexMail = "/^\w*[@]\w*[.]\w{1,4}$/";
$regexBirth = "/^[1-2][0-9]{3}[-][0-1][0-9][-]([0-2][0-9]|[3][0-1])$/";

$patient = new Patient();
$fiche = $patient->goPage($_POST['id']);

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

    if (!isset($_POST['delete']) && isset($_POST['firstname'])) {
        $patient->updatePatient($_POST['id'], $lastname, $firstname, $birthdate, $phone, $mail);
        header("Location: listePatient.php");
    } else if (isset($_POST['delete'])) {
        $patient->deletePatient($_POST['delete']);
        header("Location: listePatient.php");
    }
}
