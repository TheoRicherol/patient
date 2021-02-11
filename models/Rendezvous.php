<?php

class Rendezvous extends Database
{
    private $id;
    private $dateHour;
    private $idPatient;



    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of dateHour
     */
    public function getDateHour()
    {
        return $this->dateHour;
    }

    /**
     * Set the value of dateHour
     *
     * @return  self
     */
    public function setDateHour($dateHour)
    {
        $this->dateHour = $dateHour;

        return $this;
    }

    /**
     * Get the value of idPatient
     */
    public function getIdPatient()
    {
        return $this->idPatient;
    }

    /**
     * Set the value of idPatient
     *
     * @return  self
     */
    public function setIdPatient($idPatient)
    {
        $this->idPatient = $idPatient;

        return $this;
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function createAppointment($dateHour, $idPatient)
    {
        $query = "INSERT INTO `appointments` (`dateHour` , `idPatient`) VALUES (:dateHour , :idPatient)";
        $createAppointment = parent::getDb()->prepare($query);
        $createAppointment->bindValue("dateHour", $dateHour, PDO::PARAM_STR);
        $createAppointment->bindValue("idPatient", $idPatient, PDO::PARAM_STR);
        return $createAppointment->execute();
    }

    public function updateAppointment($dateHour, $idPatient, $id)
    {
        $query = "UPDATE `appointments` SET `dateHour` = :dateHour ,  `idPatient` = :idPatient where `id` = :id ";
        $updateAppointment = parent::getDb()->prepare($query);
        $updateAppointment->bindValue("dateHour", $dateHour, PDO::PARAM_STR);
        $updateAppointment->bindValue("idPatient", $idPatient, PDO::PARAM_STR);
        $updateAppointment->bindValue("id", $id, PDO::PARAM_STR);
        return $updateAppointment->execute();
    }

    public function deleteAppointment($id)
    {
        $query = "DELETE FROM `appointments` WHERE `id` = :id";
        $deleteAppointment = parent::getDb()->prepare($query);
        $deleteAppointment->bindValue("id", $id, PDO::PARAM_STR);
        return $deleteAppointment->execute();
    }

    public function getAgenda()
    {
        $query = "SELECT * FROM `appointments`";
        $getAgenda = parent::getDb()->prepare($query);
        $getAgenda->execute();
        $resultQuery = $getAgenda->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }
}
