<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RespostaEspecialistas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resposta-especialistas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'id_tipo_problema')->textInput() ?>

    <?= $form->field($model, 'id_titulo_problema')->textInput() ?>

    <?= $form->field($model, 'descricao_problema')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao_solucao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_ocorrencia')->textInput() ?>

    <?= $form->field($model, 'data_insercao')->textInput() ?>

    <?= $form->field($model, 'nome_especialista')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'funcao_especialista')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'relator')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
