<h1>Удаление пользователя</h1>
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
            <?= Html::submitButton('Подтвердить удаление', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
 


</div>
</div>