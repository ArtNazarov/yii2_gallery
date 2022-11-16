<?php use yii\bootstrap5\LinkPager; ?>
<?php use yii\bootstrap5\Html; ?>

 
<h3><?= $picture['title'] ?></h3>

<p><?= $picture['message'] ?></p>

<img src="<?= $picture['img_src'] ?>">             

<p><?= Html::a($picture['username'], '/material/gallery?username=' . $picture['username']) ?></p>
  