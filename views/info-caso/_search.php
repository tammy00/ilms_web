<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InfoCasoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="info-caso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_infoc') ?>

    <?= $form->field($model, 'date_created') ?>

    <?= $form->field($model, 'tipo_caso') ?>

    <?= $form->field($model, 'quantidade_alunos') ?>

    <?= $form->field($model, 'polo') ?>

    <?php // echo $form->field($model, 'id_descricao') ?>

    <?php // echo $form->field($model, 'id_relator') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
