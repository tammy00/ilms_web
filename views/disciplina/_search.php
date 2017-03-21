<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DisciplinaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disciplina-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_disciplina') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'departamento') ?>

    <?= $form->field($model, 'observacoes') ?>

    <?= $form->field($model, 'outras_caracteristicas') ?>

    <?php // echo $form->field($model, 'id_curso') ?>

    <?php // echo $form->field($model, 'id_professor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
