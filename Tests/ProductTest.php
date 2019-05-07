<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 26/04/2019
 * Time: 18:09
 */

declare(strict_types=1);

use PHPUnit\Framework\TestCase;


class ProductTestTest extends TestCase
{

    /**
     * @var Product $product
     */
    private $product;

    /**
     * Set up valid user
     */
    public function setUp(): void
    {

        $user = new User();
        $user->setId(1);
        $user->setUsername("test");
        $user->setFirstname("Maxime");
        $user->setLastname("Aublet");
        $user->setBirthdate(new DateTime('1997-07-28'));
        $user->setEmail("maximeaublet@gmail.com");

        $this->product = new Product();
        $this->product->setOwner($user);
        $this->product->setName("Coffee Arabica");
    }


    /**
     * @covers Product::isValid
     */
    public function testIsValidTrue()
    {
        $this->assertTrue($this->product->isValid());
    }

    /**
     * @covers Product::isValid
     */
    public function testIsValidFalseBecauseOfName()
    {
        $this->product->setName("");
        $this->assertFalse($this->product->isValid());
    }

    /**
     * @covers Product::isValid
     */
    public function testIsValidFalseBecauseOfOwnerNotUser()
    {
        $this->expectException(TypeError::class);
        $this->product->setOwner(1);
    }

    /**
     * @covers Product::isValid
     */
    public function testIsValidFalseBecauseOfOwnerNotValid()
    {
        $this->product->setName("");
        $this->assertFalse($this->product->isValid());
    }
}
