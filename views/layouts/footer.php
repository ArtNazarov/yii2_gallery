<?php
use yii\bootstrap5\Html;

 ( \yii::$app->language == "en" ) ? $en_lang = "EN" : $en_lang = Html::a('EN', '/en');
 ( \yii::$app->language == "ru" ) ? $ru_lang = "RU" : $ru_lang = Html::a('RU', '/ru') ;
?>
<div style='position:fixed; top:90%; background-color:white; padding:10px; margin:10px;z-index:33'>
    <?= $en_lang . ' ' . $ru_lang ?>
</div>
