<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Descricao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="descricao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'natureza_problema')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'relator')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'curso_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'disciplina_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao_problema')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'problema')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'palavras_chaves')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
