<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Turma */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="turma-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sigla')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qtde_alunos')->textInput() ?>

    <?= $form->field($model, 'outras_caracteristicas')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'observacoes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'aplicativo_movel')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
