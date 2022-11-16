<?php use app\components\SearchWidget; ?>
<?php use yii\bootstrap5\Html; ?>


<form name='search' method='get' action='/material/search'>
    <label for='searchtext'> <?= Yii::t('app', UI_SEARCH_FORM); ?></label>
    <input type='text' name='searchtext' id='searchtext'>
    <?= Html::submitButton(Yii::t('app', UI_SEARCH_BUTTON)); ?>
</form>

 