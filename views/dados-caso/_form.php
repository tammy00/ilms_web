<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DadosCaso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dados-caso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'date_created')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_caso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'turma_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qtde_alunos')->textInput() ?>

    <?= $form->field($model, 'polo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
