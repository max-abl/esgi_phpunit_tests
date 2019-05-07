<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 26/04/2019
 * Time: 18:00
 */

class Product
{

    /*
     * @var Int $id
     */
    private $id;

    /**
     * @var String $name
     */
    private $name;

    /**
     * @var User $owner
     */
    private $owner;

    // ------------------------------
    //          Methods
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
        $name = !empty($this->name);
        $user = isset($this->owner) && $this->owner instanceof User && $this->owner->isValid();
        return $name && $user;
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
     * @return Product
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return String
     */
    public function getName(): String
    {
        return $this->name;
    }

    /**
     * @param String $name
     * @return Product
     */
    public function setName(String $name): Product
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return User
     */
    public function getOwner(): User
    {
        return $this->owner;
    }

    /**
     * @param User $owner
     * @return Product
     */
    public function setOwner(User $owner): Product
    {
        $this->owner = $owner;
        return $this;
    }
}