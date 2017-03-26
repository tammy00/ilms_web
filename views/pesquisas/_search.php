<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PesquisasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pesquisas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pesquisa') ?>

    <?= $form->field($model, 'id_solucao') ?>

    <?= $form->field($model, 'id_usuario') ?>

    <?= $form->field($model, 'id_polo') ?>

    <?= $form->field($model, 'relator') ?>

    <?php // echo $form->field($model, 'natureza_problema') ?>

    <?php // echo $form->field($model, 'descricao_problema') ?>

    <?php // echo $form->field($model, 'problema_detalhado') ?>

    <?php // echo $form->field($model, 'palavras_chaves') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
