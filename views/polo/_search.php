<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PoloSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="polo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_polo') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'coordenador') ?>

    <?= $form->field($model, 'tipo_conexao') ?>

    <?= $form->field($model, 'infra_laboratorio') ?>

    <?php // echo $form->field($model, 'infra_fisica') ?>

    <?php // echo $form->field($model, 'infra_cidade') ?>

    <?php // echo $form->field($model, 'acesso') ?>

    <?php // echo $form->field($model, 'outras_caracteristicas') ?>

    <?php // echo $form->field($model, 'id_descricao') ?>

    <?php // echo $form->field($model, 'id_turma') ?>

    <?php // echo $form->field($model, 'id_curso') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
