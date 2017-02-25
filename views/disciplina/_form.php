<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Disciplina */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disciplina-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'departamento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'observacoes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'outras_caracteristicas')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
