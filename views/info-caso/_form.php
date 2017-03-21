<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InfoCaso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="info-caso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date_created')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_caso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantidade_alunos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'polo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_relator')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
