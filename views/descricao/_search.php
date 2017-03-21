<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DescricaoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="descricao-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_descricao') ?>

    <?= $form->field($model, 'natureza_problema') ?>

    <?= $form->field($model, 'relator') ?>

    <?= $form->field($model, 'descricao_problema') ?>

    <?= $form->field($model, 'problema_detalhado') ?>

    <?php // echo $form->field($model, 'palavras_chaves') ?>

    <?php // echo $form->field($model, 'id_infoc') ?>

    <?php // echo $form->field($model, 'id_polo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
