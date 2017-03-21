<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Solucao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solucao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'solucao')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'palavras_chaves')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acao_implementada')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'solucao_implementada')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'efetividade_acao_implementada')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'custos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'impacto_pedagogico')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'atores_envolvidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_infoc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
