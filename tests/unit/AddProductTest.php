<?php

use App\Models\Product;

class AddProductTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $user = new Product();
        $user->setProduct('Apple MacBook Pro', 'Good Item', '34000',1,1);
        $this->tester->seeInDatabase('Product', ['name' => 'Apple MacBook Pro', 'description' => 'Good Item']);
    }
}