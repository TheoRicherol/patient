<?php

require "../models/Database.php";
require "../models/Patient.php";
require "../models/Rendezvous.php";

$patient = new Patient();

$fiche = $patient->goPage($_GET['id']);

