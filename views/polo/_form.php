<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Polo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="polo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coordenador')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_conexao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'infra_laboratorio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'infra_fisica')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'infra_cidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acesso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'outras_caracteristicas')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
