<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 26/04/2019
 * Time: 18:00
 */

class User
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var DateTime
     */
    private $birthdate;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    // ------------------------------
    //      Getters & Setters
    // ------------------------------

    /**
     * User constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        $age = $this->birthdate instanceof DateTime && $this->getAge() > 13;
        $names = !empty($this->firstname) && !empty($this->lastname);
        $email = filter_var($this->email, FILTER_VALIDATE_EMAIL);
        return $age && $names && $email;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        $now = new DateTime();
        $interval = $now->diff($this->birthdate);
        return $interval->y;
    }

    // ------------------------------
    //      Getters & Setters
    // ------------------------------

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param mixed $birthdate
     * @return User
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }
}