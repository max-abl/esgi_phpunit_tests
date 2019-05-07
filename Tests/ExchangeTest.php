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
     * @throws ReflectionException
     */
    public function setUp(): void
    {

        /**
         * Exchange valid expected
         * - Dates are valid
         * - Receiver valid
         * - Receiver + 13 yo
         * - Product valid
         * - Email never sent
         * - DBConnection sent once
         */
        // Mock => Receiver
        $receiver = $this->createMock(User::class);
        $receiver->expects($this->any())->method('isValid')->willReturn(true);
        $receiver->expects($this->any())->method('getAge')->willReturn(21);

        // Mock Owner
        $product = $this->createMock(Product::class);
        $product->expects($this->any())->method('isValid')->willReturn(true);

        // Mock Email sender
        $emailSender = $this->createMock(EmailSender::class);
        $emailSender->expects($this->never())->method('sendEmail')->willReturn(true);

        // Mock DBConnection
        $dbConnection = $this->createMock(DBConnection::class);
        $dbConnection->expects($this->once())->method('saveExchange')->willReturn(true);

        // Dates
        $beginDate = new DateTime("2018-01-01");
        $endDate = new DateTime("2018-02-02");

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
     * @covers Exchange::isDateValid
     */
    public function testIsDateValidTrue()
    {
        $this->assertTrue($this->exchange->isDateValid());
    }

    /**
     * @covers Exchange::isValid
     */
    public function testIsValidTrue()
    {
        $this->assertTrue($this->exchange->isValid());
    }

    /**
     * @covers Exchange::isValid
     * @throws ReflectionException
     */
    public function testIsValidFalseBecauseOfReceiver()
    {
        $receiverFalse = $this->createMock(User::class);
        $receiverFalse->expects($this->any())->method('isValid')->willReturn(false);
        $this->exchange->setProduct($receiverFalse);

        $this->assertFalse($this->exchange->isValid());
    }

    /**
     * @covers Exchange::isValid
     * @throws ReflectionException
     */
    public function testIsValidFalseBecauseOfProduct()
    {
        $productFalse = $this->createMock(User::class);
        $productFalse->expects($this->any())->method('isValid')->willReturn(false);
        $this->exchange->setProduct($productFalse);

        $this->assertFalse($this->exchange->isValid());
    }

    /**
     * @covers Exchange::isValid
     * @throws Exception
     */
    public function testSaveTrue()
    {
        $this->assertTrue($this->exchange->save());
    }

    /**
     * @throws ReflectionException
     */
    public function testExchangeNeverSentOnDB()
    {
        $productFalse = $this->createMock(User::class);
        $productFalse->expects($this->any())->method('isValid')->willReturn(false);
        $this->exchange->setProduct($productFalse);

        // Mock DBConnection
        $dbConnectionNeverSent = $this->createMock(DBConnection::class);
        $dbConnectionNeverSent->expects($this->never())->method('saveExchange');
        $this->exchange->setDbConnection($dbConnectionNeverSent);

        $this->assertFalse($this->exchange->save());
    }

    /**
     * @throws ReflectionException
     */
    public function testExchangeEmailNeverSent()
    {
        // Mock => Receiver
        $receiverMinor = $this->createMock(User::class);
        $receiverMinor->expects($this->any())->method("isValid")->willReturn(true);
        $receiverMinor->expects($this->any())->method("getAge")->willReturn(10);
        $this->exchange->setReceiver($receiverMinor);

        // Mock DBConnection
        $emailNeverSent = $this->createMock(EmailSender::class);
        $emailNeverSent->expects($this->never())->method('sendEmail');
        $this->exchange->setDbConnection($emailNeverSent);

        $this->assertFalse($this->exchange->save());
    }


}
