<?php
session_start();
require "../models/Database.php";
require "../models/Patient.php";
require "../models/Rendezvous.php";
setlocale(LC_ALL, 'fr_FR_utf8');



$listChoice = [4, 5, 6];

if (isset($_POST["listNbr"])) {
    $_SESSION["listNbr"] = $_POST["listNbr"];
} elseif (!isset($_POST["listNbr"]) && isset($_SESSION["listNbr"])) {
    $_SESSION["listNbr"] = (int)$_SESSION["listNbr"];
} else {
    $_SESSION["listNbr"] = 5;
}


if (isset($_GET["page"]) && !empty($_GET["page"]) && $_GET["page"] > 1) {
    $currentPage = (int)$_GET["page"];
} else {
    $currentPage = 1;
}

$patient = new Patient();

if (isset($_POST["ereaseSearch"])) {
    unset($_SESSION["search"]);
} 

if (isset($_POST["goSearch"]) || isset($_SESSION["search"])) {
    echo "coucou";
    $_SESSION["search"] = isset($_SESSION["search"]) ? $_SESSION["search"] : "%" . $_POST["search"] . "%";
    $patientNbr = $patient->countSearchPatient($_SESSION["search"]);
    $totalPages = ceil($patientNbr[0]["nbr"] / $_SESSION["listNbr"]);
    $patientList = $patient->searchPatient($_SESSION["search"], (($currentPage - 1) * $_SESSION["listNbr"]), $_SESSION["listNbr"]);
} else if (!isset($_SESSION["search"])) {
    $patientNbr = $patient->countPatient();
    $totalPages = ceil($patientNbr[0]["nbr"] / $_SESSION["listNbr"]);
    $patientList = $patient->getPatientsList((($currentPage - 1) * $_SESSION["listNbr"]), $_SESSION["listNbr"]);
}

var_dump($_POST);
var_dump($_SESSION);

// session_destroy();