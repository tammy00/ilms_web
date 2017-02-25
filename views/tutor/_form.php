<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tutor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tutor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_matricula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_tutoria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_bolsa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'outras_caracteristicas')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'observacoes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'polo_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
