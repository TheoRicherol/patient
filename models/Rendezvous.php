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
        $query = "INSERT INTO `appointments`(`dateHour` , `idPatients`) VALUES (:dateHour , :idPatient)";
        $createAppointment = parent::getDb()->prepare($query);
        $createAppointment->bindValue("dateHour", $dateHour, PDO::PARAM_STR);
        $createAppointment->bindValue("idPatient", $idPatient, PDO::PARAM_STR);
        return $createAppointment->execute();
    }

    public function updateAppointment($dateHour, $idPatient, $id)
    {
        $query = "UPDATE `appointments` SET `dateHour` = :dateHour , `idPatients` = :idPatient WHERE `appointments`.`id` = :id";
        $updateAppointment = parent::getDb()->prepare($query);
        var_dump($query);
        var_dump($updateAppointment);
        $updateAppointment->bindValue("dateHour", $dateHour, PDO::PARAM_STR);
        $updateAppointment->bindValue("idPatient", $idPatient, PDO::PARAM_INT);
        $updateAppointment->bindValue("id", $id, PDO::PARAM_INT);
        var_dump($updateAppointment);
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
        $query = "SELECT `dateHour`, `idPatients` , `appointments`.`id`, `patients`.`lastname` , `patients`.`firstname` , `patients`.`mail` , `patients`.`phone` , `patients`.`birthdate` FROM `appointments`
            INNER JOIN `patients` ON `patients`.`id` = `appointments`.`idPatients` ";
        $getAgenda = parent::getDb()->prepare($query);
        $getAgenda->execute();
        $resultQuery = $getAgenda->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    public function getAppointment($id)
    {
        $query = "SELECT `dateHour`, `idPatients` ,`appointments`.`id`,  `patients`.`lastname` , `patients`.`firstname` , `patients`.`mail` , `patients`.`phone` , `patients`.`birthdate` FROM `appointments`
            INNER JOIN `patients` ON `patients`.`id` = `appointments`.`idPatients` WHERE `appointments`.`id` = :id ";
        $getAgenda = parent::getDb()->prepare($query);
        $getAgenda->bindValue("id" , $id);
        $getAgenda->execute();
        $resultQuery = $getAgenda->fetch(PDO::FETCH_ASSOC);
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }
}
