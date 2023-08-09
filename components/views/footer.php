<?php
use yii\bootstrap5\Html;

 ( \yii::$app->language == "en" ) ? $en_lang = "EN" : $en_lang = Html::a('EN', '/en');
 ( \yii::$app->language == "ru" ) ? $ru_lang = "RU" : $ru_lang = Html::a('RU', '/ru') ;
?>
<div style='position:fixed; right:60%; top:90%; background-color:white; padding:10px; margin:10px;z-index:33'>
    <?= $en_lang . ' ' . $ru_lang ?>
</div>


<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; github.com/artnazarov <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>