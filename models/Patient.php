<?php

class Patient extends Database
{

    /**
     * @var
     */
    private $id;
    private $lastname;
    private $firstname;
    private $birthdate;
    private $phone;
    private $mail;

    /**
     * Get the value of mail
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of birthdate
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set the value of birthdate
     *
     * @return  self
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get the value of firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

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


    public function __construct()
    {
        parent::__construct();
    }

    public function newPatient($lastname, $firstname, $birthdate, $phone, $mail)
    {
        $query = "INSERT INTO `patients`(`lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES (:lastname,:firstname,:birthdate ,:phone,:mail)";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("lastname", $lastname, PDO::PARAM_STR);
        $buildQuery->bindValue("firstname", $firstname, PDO::PARAM_STR);
        $buildQuery->bindValue("birthdate", $birthdate, PDO::PARAM_STR);
        $buildQuery->bindValue("phone", $phone, PDO::PARAM_STR);
        $buildQuery->bindValue("mail", $mail, PDO::PARAM_STR);
        return $buildQuery->execute();
    }

    public function goPage($id)
    {
        $query = "SELECT * , appointments.dateHour , appointments.id , appointments.idPatients FROM `patients` 
        LEFT JOIN appointments ON patients.id = appointments.idPatients
        WHERE patients.`id` = :id";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id", $id, PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    public function updatePatient($id, $lastname, $firstname, $birthdate, $phone, $mail)
    {
        $query = "UPDATE `patients` SET `lastname` = :lastname , `firstname` = :firstname , `birthdate` = :birthdate , `phone` = :phone ,  `mail` = :mail WHERE `id` = :id";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id", $id, PDO::PARAM_INT);
        $buildQuery->bindValue("lastname", $lastname, PDO::PARAM_STR);
        $buildQuery->bindValue("firstname", $firstname, PDO::PARAM_STR);
        $buildQuery->bindValue("birthdate", $birthdate, PDO::PARAM_STR);
        $buildQuery->bindValue("phone", $phone, PDO::PARAM_STR);
        $buildQuery->bindValue("mail", $mail, PDO::PARAM_STR);
        return $buildQuery->execute();
    }


    public function getPatiens()
    {
        $query = "SELECT * FROM `patients`";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    public function getLastPatient()
    {
        $query = "SELECT MAX(id) AS idPatient FROM `patients`";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);
        if (!empty($resultQuery)) {

            return $resultQuery;
        } else {
            return false;
        }
    }

    public function getPatientsList($currentPage, $listNbr)
    {
        $query = "SELECT * FROM `patients` LIMIT :currentPage , :listNbr";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("currentPage", $currentPage, PDO::PARAM_INT);
        $buildQuery->bindValue("listNbr", $listNbr, PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    public function countPatient()
    {
        $query = "SELECT COUNT(*) AS 'nbr' FROM `patients`";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    public function deletePatient($id)
    {
        $query = "DELETE FROM `patients` WHERE `id` = :id";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id", $id, PDO::PARAM_STR);
        return $buildQuery->execute();
    }

    public function searchPatient($search ,$currentPage, $listNbr)
    {
        $query = "SELECT * FROM patients WHERE CONCAT(`patients`.`id` , `patients`.`lastname` , `patients`.`firstname` , `patients`.`phone` , `patients`.`mail`)  LIKE :search LIMIT :currentPage , :listNbr";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("search", $search, PDO::PARAM_STR);
        $buildQuery->bindValue("currentPage", $currentPage, PDO::PARAM_INT);
        $buildQuery->bindValue("listNbr", $listNbr, PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }
}
