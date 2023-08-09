<?php
namespace app\components;

use yii\base\Widget;

class SearchWidget extends Widget
{
    public $searchtext;

    public function init() {
        parent::init();
    }

    public function run() {
        return $this->render('searchformwidget' );
       
    }
}