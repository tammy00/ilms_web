<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TurmaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="turma-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_turma') ?>

    <?= $form->field($model, 'sigla') ?>

    <?= $form->field($model, 'qtde_alunos') ?>

    <?= $form->field($model, 'outras_caracteristicas') ?>

    <?= $form->field($model, 'observacoes') ?>

    <?php // echo $form->field($model, 'aplicativo_movel') ?>

    <?php // echo $form->field($model, 'id_polo') ?>

    <?php // echo $form->field($model, 'id_curso') ?>

    <?php // echo $form->field($model, 'id_tutor') ?>

    <?php // echo $form->field($model, 'id_aplicativo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
