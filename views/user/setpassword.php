<h1>Смена пароля</h1>
<div class="panel panel-info">
    <div class='panel-heading'></div><!-- comment -->
<div class='panel-body'>
    
    
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'my-set-password-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
    
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'password2')->passwordInput() ?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Смена пароля', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
 


</div>
</div>