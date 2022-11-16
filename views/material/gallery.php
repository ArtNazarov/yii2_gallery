<?php use yii\bootstrap5\LinkPager; ?>
<?php use yii\bootstrap5\Html; ?>



<h1><?= Yii::t('app', UI_USERGALLERY); ?></h1>
<?php foreach($arts as $item): ?>

            <h3><?= Html::a( $item['title'], '/material/view?picture_id=' . $item['picture_id']) ?></h3>
             

             <img width='320' src='<?= $item['img_src'] ?>' /> 
               
<?php endforeach; ?>

<?php
echo LinkPager::widget([
    'pagination' => $pages,
]); 
?>