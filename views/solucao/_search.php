<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SolucaoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solucao-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_solucao') ?>

    <?= $form->field($model, 'solucao') ?>

    <?= $form->field($model, 'palavras_chaves') ?>

    <?= $form->field($model, 'acao_implementada') ?>

    <?= $form->field($model, 'solucao_implementada') ?>

    <?php // echo $form->field($model, 'efetividade_acao_implementada') ?>

    <?php // echo $form->field($model, 'custos') ?>

    <?php // echo $form->field($model, 'impacto_pedagogico') ?>

    <?php // echo $form->field($model, 'atores_envolvidos') ?>

    <?php // echo $form->field($model, 'id_infoc') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
