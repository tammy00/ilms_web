<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RespostaEspecialistasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resposta-especialistas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_tipo_problema') ?>

    <?= $form->field($model, 'id_titulo_problema') ?>

    <?= $form->field($model, 'descricao_problema') ?>

    <?= $form->field($model, 'descricao_solucao') ?>

    <?php // echo $form->field($model, 'data_ocorrencia') ?>

    <?php // echo $form->field($model, 'data_insercao') ?>

    <?php // echo $form->field($model, 'nome_especialista') ?>

    <?php // echo $form->field($model, 'funcao_especialista') ?>

    <?php // echo $form->field($model, 'relator') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
