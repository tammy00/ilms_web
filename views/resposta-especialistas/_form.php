<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TipoProblema;
use app\models\TituloProblema;

/* @var $this yii\web\View */
/* @var $model app\models\RespostaEspecialistas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resposta-especialistas-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id_tipo_problema')->dropDownList([$arrayTiposProblemas],['style' => 'width:500px',
                                                      'prompt' => "Selecione um tipo de problema",]); ?> 
                
        <?= $form->field($model, 'id_titulo_problema')->dropDownList([$arrayTitulosProblemas],['style' => 'width:500px',
                                                      'prompt' => "Selecione um título de problema",]); ?> 

        <?= $form->field($model, 'descricao_problema')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'descricao_solucao')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'data_ocorrencia')->textInput()->hint('Formato: aaaa-mm-dd') ?>

        <?= $form->field($model, 'data_insercao')->textInput()->hint('Formato: aaaa-mm-dd') ?>

        <?= $form->field($model, 'nome_especialista')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'funcao_especialista')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'relator')->dropDownList([$arrayTitulosProblemas],['style' => 'width:500px',
                                                      'prompt' => "Selecione um tipo de relator",]); ?> 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
