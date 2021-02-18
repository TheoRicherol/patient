<?php 
require "../models/Database.php";
require "../models/Patient.php";
require "../models/Rendezvous.php";

$patient = new Patient();
$appointment = new Rendezvous();

$fiche = $appointment->getAppointment($_GET['id']);
