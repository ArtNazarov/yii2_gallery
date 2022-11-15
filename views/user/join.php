 
<h1><?= Yii::t('app', UI_JOIN_FORM); ?></h1>
<div class="panel panel-info">
    <div class='panel-heading'></div><!-- comment -->
</div class='panel-body'>

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'my-join-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'email') ?>
 
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'password2')->passwordInput() ?> 
    
   <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton(Yii::t('app',UI_JOIN_BUTTON), ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>



</div>
</div>
