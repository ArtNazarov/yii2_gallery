<?php use yii\bootstrap5\LinkPager; ?>

<?php foreach($arts as $item): ?>

            <h2><?= $item['title'] ?></h2>
            <p><?= $item['message'] ?></p>

             <img width='320' src='<?= $item['img_src'] ?>' /> 
  
<?php endforeach; ?>

<?php
echo LinkPager::widget([
    'pagination' => $pages,
]); 
?>