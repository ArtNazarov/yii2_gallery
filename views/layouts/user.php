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
    <body style="background-color:#E1DFE1">
     
     <?php include(__DIR__ . '/mymenu.php'); ?>

     <?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
