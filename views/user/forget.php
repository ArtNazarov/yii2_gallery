<h1><?= UI_FORGET_FORM ?></h1>
<div class="panel panel-info">
    <div class='panel-heading'></div><!-- comment -->
<div class='panel-body'>
    
    
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'my-forget-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
    <?= $form->field($model, 'confirmdelete')->checkbox() ?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton(UI_FORGET_BUTTON, ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
 


</div>
</div>