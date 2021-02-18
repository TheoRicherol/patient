<?php
require "../models/Database.php";
require "../models/Patient.php";
require "../models/Rendezvous.php";
setlocale(LC_ALL, 'fr_FR_utf8');

$patient = new Patient();

if (isset($_GET["page"]) && !empty($_GET["page"]) && $_GET["page"] > 1) {
    $currentPage = (int)$_GET["page"];
} else {
    $currentPage = 1;
}

if (!isset($_POST["goSearch"])) {
    $patientNbr = $patient->countPatient();
    $totalPages = ceil($patientNbr[0]["nbr"] / 5);
    $patientList = $patient->getPatientsList((($currentPage - 1) * 5), 5);
} else {
    $search = "%" . $_POST["search"] . "%";
    $patientList = $patient->searchPatient($search, (($currentPage - 1) * 5), 5);
}
