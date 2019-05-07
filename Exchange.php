<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 26/04/2019
 * Time: 20:03
 */

class Exchange
{

    /**
     * @var User $receiver
     */
    private $receiver;

    /**
     * @var Product $product
     */
    private $product;

    /**
     * @var DateTime $beginDate
     */
    private $beginDate;

    /**
     * @var DateTime $endDate
     */
    private $endDate;

    /**
     * @var EmailSender
     */
    private $emailSender;

    /**
     * @var DBConnection
     */
    private $dbConnection;

    // ------------------------------
    //          Methods
    // ------------------------------

    /**
     * Exchange constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        $receiver = ($this->receiver instanceof User) && ($this->receiver->isValid());
        $product = ($this->product instanceof Product) && ($this->product->isValid());

        return $product && $receiver && $this->isDateValid();
    }

    /**
     * @return bool
     */
    public function isDateValid()
    {
        return ($this->beginDate instanceof DateTime) && ($this->endDate instanceof DateTime) && $this->beginDate < $this->endDate;
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function save()
    {
        if ($this->isValid()) {
            $this->dbConnection->saveExchange($this);
            if ($this->receiver->getAge() < 13) $this->emailSender->sendEmail($this->receiver, "Moins de 13 ans");
            return true;
        } else {
            return false;
        }
    }

    // ------------------------------
    //      Getters & Setters
    // ------------------------------

    /**
     * @return mixed
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * @param mixed $receiver
     * @return Exchange
     */
    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     * @return Exchange
     */
    public function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBeginDate()
    {
        return $this->beginDate;
    }

    /**
     * @param mixed $beginDate
     * @return Exchange
     */
    public function setBeginDate($beginDate)
    {
        $this->beginDate = $beginDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     * @return Exchange
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailSender()
    {
        return $this->emailSender;
    }

    /**
     * @param mixed $emailSender
     * @return Exchange
     */
    public function setEmailSender($emailSender)
    {
        $this->emailSender = $emailSender;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDbConnection()
    {
        return $this->dbConnection;
    }

    /**
     * @param mixed $dbConnection
     * @return Exchange
     */
    public function setDbConnection($dbConnection)
    {
        $this->dbConnection = $dbConnection;
        return $this;
    }
}