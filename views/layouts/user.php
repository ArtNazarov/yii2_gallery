<?php
use yii\bootstrap5\Html;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\Nav;
use app\components\MainMenuWidget;
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
     
    <?= MainMenuWidget::widget(); ?>

     <?= $content ?>
   <?php include(__DIR__ . '/footer.php'); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
