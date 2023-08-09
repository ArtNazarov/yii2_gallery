
<h1><?= Yii::t('app', UI_NEWMATERIAL_FORM); ?></h1>

<div class="panel panel-info">
    <div class='panel-heading'></div><!-- comment -->
<div class='panel-body'>
    
    
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'my-material-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'title') ?>
    <?= $form->field($model, 'message') ?>
    <?= $form->field($model, 'img_src') ?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton( Yii::t('app', UI_NEWMATERIAL_BUTTON) , [ 'id' => 'btn-newmaterial-submit', 'class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
 


</div>
</div>