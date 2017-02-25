<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="curso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'polo_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_curso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'duracao')->textInput() ?>

    <?= $form->field($model, 'departamento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coordenador')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'outras_caracteristicas')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'observacoes')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
