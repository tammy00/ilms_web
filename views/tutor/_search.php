<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TutorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tutor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_matricula') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'tipo_tutoria') ?>

    <?= $form->field($model, 'tipo_bolsa') ?>

    <?= $form->field($model, 'outras_caracteristicas') ?>

    <?php // echo $form->field($model, 'observacoes') ?>

    <?php // echo $form->field($model, 'polo_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
