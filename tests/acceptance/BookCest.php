<?php

use yii\helpers\Url;

class BookCest
{
    public function ensureThatGreeterWorks(AcceptanceTester $I)
    {
        $I->wantTo('Тест на главной страницы, язык не имеет значения');
        $I->amOnPage(Url::toRoute('/book/greeter'));
        $I->see('Название первой картины', 'h2');
    }
}