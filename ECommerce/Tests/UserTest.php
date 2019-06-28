<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 26/04/2019
 * Time: 18:09
 */

declare(strict_types=1);

use PHPUnit\Framework\TestCase;


class UserTest extends TestCase
{

    /**
     * @var User $user
     */
    private $user;

    /**
     * Set up valid user
     */
    public function setUp(): void
    {
        $this->user = new User();
        $this->user->setId(1);
        $this->user->setUsername("test");
        $this->user->setFirstname("Maxime");
        $this->user->setLastname("Aublet");
        $this->user->setBirthdate(new DateTime('1997-07-28'));
        $this->user->setEmail("maximeaublet@gmail.com");
    }

    /**
     * @covers User::getAge
     */
    public function testGetAge()
    {
        $this->assertEquals($this->user->getAge(), 21);
    }

    /**
     * @covers User::getAge
     */
    public function testGetAgeBeginningOfYear()
    {
        $this->user->setBirthdate(new DateTime('1997-01-01'));
        $this->assertEquals($this->user->getAge(), 22);
    }


    /**
     * @covers User::isValid
     */
    public function testIsValidTrue()
    {
        $this->assertTrue($this->user->isValid());
    }


    /**
     * @covers User::isValid
     */
    public function testIsValidFalseBecauseOfEmail()
    {
        $this->user->setEmail("dana@test");
        $this->assertFalse($this->user->isValid());
    }

    /**
     * @covers User::isValid
     */
    public function testIsValidFalseBecauseOfFirstname()
    {
        $this->user->setFirstname("");
        $this->assertFalse($this->user->isValid());
    }

    /**
     * @covers User::isValid
     */
    public function testIsValidFalseBecauseOfLastname()
    {
        $this->user->setLastname("");
        $this->assertFalse($this->user->isValid());
    }

    /**
     * @covers User::isValid
     */
    public function testIsValidFalseBecauseOfAge()
    {
        $this->user->setBirthdate(new DateTime('2010-01-01'));
        $this->assertFalse($this->user->isValid());
    }
}
