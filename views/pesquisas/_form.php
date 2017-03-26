<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pesquisas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pesquisas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_solucao')->textInput() ?>

    <?= $form->field($model, 'id_usuario')->textInput() ?>

    <?= $form->field($model, 'id_polo')->textInput() ?>

    <?= $form->field($model, 'relator')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'natureza_problema')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'descricao_problema')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'problema_detalhado')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'palavras_chaves')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
