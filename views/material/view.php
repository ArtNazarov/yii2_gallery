<?php use yii\bootstrap5\LinkPager; ?>
<?php use yii\bootstrap5\Html; ?>
<?php use yii\helpers\Url; ?>

 
<h3><?= $picture['title'] ?></h3>

<p><?= $picture['message'] ?></p>

<img src="<?= $picture['img_src'] ?>">             

<p><?= Html::a($picture['username'], '/material/gallery?username=' . $picture['username']) ?></p>

<?php if (\Yii::$app->user->isGuest) {
    $html = 'Login to edit picture';
} else
{
    if ($picture['user_id']==\Yii::$app->user->identity->id) {
        $html = Html::a('Delete picture', Url::to('/material/delete?picture_id='.$picture['picture_id']));
       }
       else
       {
           $html = 'You dont own this picture';
       };
    
};

echo $html;

?>

 