<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 26/04/2019
 * Time: 18:09
 */

declare(strict_types=1);

use PHPUnit\Framework\TestCase;


class ExchangeTest extends TestCase
{

    /**
     * @var Exchange
     */
    private $exchange;


    /**
     * --------------------------
     * ----- For the SetUp ------
     * --------------------------
     *
     * Exchange is valid because
     *  - Dates are valid
     *  - Receiver valid
     *  - Product valid
     *
     * Email will never be sent because
     *  - Receiver + 13 yo
     *
     * DBConnection sent once
     *  - Exchange is valid
     *
     * @throws ReflectionException
     */
    public function setUp(): void
    {
        // Mock => Receiver
        $receiver = $this->createMock(User::class);
        $receiver->expects($this->any())->method('isValid')->willReturn(true);
        $receiver->expects($this->any())->method('getAge')->willReturn(21);

        // Mock Owner
        $product = $this->createMock(Product::class);
        $product->expects($this->any())->method('isValid')->willReturn(true);

        // Mock Email sender
        $emailSender = $this->createMock(EmailSender::class);
        $emailSender->expects($this->any())->method('sendEmail')->willReturn(true);

        // Mock DBConnection
        $dbConnection = $this->createMock(DBConnection::class);
        $dbConnection->expects($this->any())->method('saveExchange')->willReturn(true);

        // Dates
        // A Rendre non fixe
        $beginDate = new DateTime();
        $beginDate->modify("+1 day");

        $endDate = new DateTime();
        $endDate->modify("+2 day");

        // Initialisation
        $this->exchange = new Exchange();
        $this->exchange->setReceiver($receiver)
            ->setProduct($product)
            ->setBeginDate($beginDate)
            ->setEndDate($endDate)
            ->setDbConnection($dbConnection)
            ->setEmailSender($emailSender);
    }


    /**
     * Exchange saved but no email sent
     *
     * @covers Exchange::save
     * @throws Exception
     */
    public
    function testSaveButNotEmail()
    {
        $this->assertTrue($this->exchange->save());
    }


    /**
     * Exchange saved not saved, because product not valid, and no email sent
     *
     * @covers Exchange::save
     * @throws ReflectionException
     * @throws Exception
     */
    public
    function testSaveNotSavedAndNotSent()
    {

        // No valid product
        $product = $this->createMock(Product::class);
        $product->expects($this->any())->method('isValid')->willReturn(false);
        $this->exchange->setProduct($product);

        // Never called
        $dbConnection = $this->createMock(DBConnection::class);
        $dbConnection->expects($this->never())->method('saveExchange')->willReturn(true);
        $this->exchange->setDbConnection($dbConnection);

        // Never called
        $emailSender = $this->createMock(EmailSender::class);
        $emailSender->expects($this->never())->method('sendEmail')->willReturn(true);
        $this->exchange->setEmailSender($emailSender);

        $this->assertFalse($this->exchange->save());
    }


    /**
     * Exchange saved and email sent
     *
     * @covers Exchange::save
     * @throws ReflectionException
     * @throws Exception
     */
    public
    function testSaveSavedAndEmail()
    {
        // Mock => Receiver - 13 yo
        $receiverMinor = $this->createMock(User::class);
        $receiverMinor->expects($this->any())->method("isValid")->willReturn(true);
        $receiverMinor->expects($this->any())->method("getAge")->willReturn(10);
        $this->exchange->setReceiver($receiverMinor);

        // Called Once
        $dbConnection = $this->createMock(DBConnection::class);
        $dbConnection->expects($this->once())->method('saveExchange')->willReturn(true);
        $this->exchange->setDbConnection($dbConnection);

        // Called One called
        $emailSender = $this->createMock(EmailSender::class);
        $emailSender->expects($this->once())->method('sendEmail')->willReturn(true);
        $this->exchange->setEmailSender($emailSender);

        $this->assertTrue($this->exchange->save());
    }


    /**
     * Dates are valid
     *
     * @covers Exchange::isDateValid
     * @throws ReflectionException
     */
    public function testIsDateValidTrue()
    {
        // Never called
        $dbConnection = $this->createMock(DBConnection::class);
        $dbConnection->expects($this->never())->method('saveExchange')->willReturn(true);
        $this->exchange->setDbConnection($dbConnection);

        // Never called
        $emailSender = $this->createMock(EmailSender::class);
        $emailSender->expects($this->never())->method('sendEmail')->willReturn(true);
        $this->exchange->setEmailSender($emailSender);

        $this->assertTrue($this->exchange->isDateValid());
    }


    /**
     * Dates aren't valid
     *
     * @covers Exchange::isDateValid
     * @throws ReflectionException
     */
    public function testIsDateValidFalse()
    {
        // Never called
        $dbConnection = $this->createMock(DBConnection::class);
        $dbConnection->expects($this->never())->method('saveExchange')->willReturn(true);
        $this->exchange->setDbConnection($dbConnection);

        // Never called
        $emailSender = $this->createMock(EmailSender::class);
        $emailSender->expects($this->never())->method('sendEmail')->willReturn(true);
        $this->exchange->setEmailSender($emailSender);

        $this->exchange->setBeginDate((new DateTime())->modify("+2 day"));
        $this->exchange->setEndDate((new DateTime())->modify("+1 day"));

        $this->assertFalse($this->exchange->isDateValid());
    }


    /**
     * Exchange is valid
     *
     * @covers Exchange::isValid
     * @throws ReflectionException
     */
    public
    function testIsValidTrue()
    {
        // Never called
        $dbConnection = $this->createMock(DBConnection::class);
        $dbConnection->expects($this->never())->method('saveExchange')->willReturn(true);
        $this->exchange->setDbConnection($dbConnection);

        // Never called
        $emailSender = $this->createMock(EmailSender::class);
        $emailSender->expects($this->never())->method('sendEmail')->willReturn(true);
        $this->exchange->setEmailSender($emailSender);

        $this->assertTrue($this->exchange->isValid());
    }


    /**
     * Exchange not valid because receiver is not
     *
     * @covers Exchange::isValid
     * @throws ReflectionException
     */
    public
    function testIsValidFalseBecauseOfReceiver()
    {
        // False receiver
        $receiver = $this->createMock(User::class);
        $receiver->expects($this->any())->method('isValid')->willReturn(false);
        $this->exchange->setProduct($receiver);

        // Never called
        $dbConnection = $this->createMock(DBConnection::class);
        $dbConnection->expects($this->never())->method('saveExchange')->willReturn(true);
        $this->exchange->setDbConnection($dbConnection);

        // Never called
        $emailSender = $this->createMock(EmailSender::class);
        $emailSender->expects($this->never())->method('sendEmail')->willReturn(true);
        $this->exchange->setEmailSender($emailSender);

        $this->assertFalse($this->exchange->isValid());
    }


    /**
     * Exchange not valid because product is not
     *
     * @covers Exchange::isValid
     * @throws ReflectionException
     */
    public
    function testIsValidFalseBecauseOfProduct()
    {
        // False Product
        $product = $this->createMock(Product::class);
        $product->expects($this->any())->method('isValid')->willReturn(false);
        $this->exchange->setProduct($product);

        // Never called
        $dbConnection = $this->createMock(DBConnection::class);
        $dbConnection->expects($this->never())->method('saveExchange')->willReturn(true);
        $this->exchange->setDbConnection($dbConnection);

        // Never called
        $emailSender = $this->createMock(EmailSender::class);
        $emailSender->expects($this->never())->method('sendEmail')->willReturn(true);
        $this->exchange->setEmailSender($emailSender);

        $this->assertFalse($this->exchange->isValid());
    }
}
