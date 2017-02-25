<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DadosCasoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dados-caso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date_created') ?>

    <?= $form->field($model, 'tipo_caso') ?>

    <?= $form->field($model, 'turma_id') ?>

    <?= $form->field($model, 'qtde_alunos') ?>

    <?php // echo $form->field($model, 'polo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
