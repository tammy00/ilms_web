<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProfessorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="professor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_matricula') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'tipo_bolsa') ?>

    <?= $form->field($model, 'departamento') ?>

    <?= $form->field($model, 'outras_caracteristicas') ?>

    <?php // echo $form->field($model, 'observacoes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
