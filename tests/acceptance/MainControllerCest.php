<?php

class MainControllerCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        {
            $I->amOnPage('/');
            $I->see('Home');
        }
    }
}
