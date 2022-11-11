<?php
use yii\bootstrap5\Html;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\Nav
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body style="background-color:gold">
     
<?php
    NavBar::begin(['brandLabel' => 'Галерея']);
echo Nav::widget([
    'items' => [
        ['label' => 'Главная', 'url' => ['/site/index']],
        ['label' => 'Картины', 'url' => ['/book/greeter']],
        ['label' => 'Вход на сайт', 'url' => ['/book/login']],
        ['label' => 'Регистрация', 'url' => ['/book/join']]
    ],
    'options' => ['class' => 'navbar-nav'],
]);
NavBar::end();
?>

     <?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
