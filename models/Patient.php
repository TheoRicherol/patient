<?php

class Patient extends Database
{

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
        $insertPatient = parent::getDb()->prepare($query);
        $insertPatient->bindValue("lastname", $lastname, PDO::PARAM_STR);
        $insertPatient->bindValue("firstname", $firstname, PDO::PARAM_STR);
        $insertPatient->bindValue("birthdate", $birthdate, PDO::PARAM_STR);
        $insertPatient->bindValue("phone", $phone, PDO::PARAM_STR);
        $insertPatient->bindValue("mail", $mail, PDO::PARAM_STR);
        return $insertPatient->execute();
    }
    
    public function goPage($id){
        $query = "SELECT * FROM `patients` WHERE `id` = :id";
        $goPage = parent::getDb()->prepare($query);
        $goPage->bindValue("id" , $id, PDO::PARAM_INT);
        $goPage->execute();
        $resultQuery = $goPage->fetch();
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    public function updatePatient($id , $lastname, $firstname, $birthdate, $phone, $mail){
        $query = "UPDATE `patients` SET `lastname` = :lastname , `firstname` = :firstname , `birthdate` = :birthdate , `phone` = :phone ,  `mail` = :mail WHERE `id` = :id";
        $updates = parent::getDb()->prepare($query);
        $updates->bindValue("id" , $id, PDO::PARAM_INT);
        $updates->bindValue("lastname", $lastname, PDO::PARAM_STR);
        $updates->bindValue("firstname", $firstname, PDO::PARAM_STR);
        $updates->bindValue("birthdate", $birthdate, PDO::PARAM_STR);
        $updates->bindValue("phone", $phone, PDO::PARAM_STR);
        $updates->bindValue("mail", $mail, PDO::PARAM_STR);
        return $updates->execute();
    }

    public function getPatiens()
    {
        $query = "SELECT * FROM `patients`";
        $getPatients = parent::getDb()->prepare($query);
        $getPatients->execute();
        $resultQuery = $getPatients->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }

    public function deletePatient($id){
        $query = "DELETE FROM `patients` WHERE `id` = :id";
        $deletePatient = parent::getDb()->prepare($query);
        $deletePatient->bindValue("id" , $id , PDO::PARAM_STR); 
        return $deletePatient->execute();
    }
}
