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

        <?= $form->field($model, 'descricao_problema')->textarea(['rows' => 6, 'maxlength' => 300, 'style' => 'width:800px',]) ?>

        <?= $form->field($model, 'descricao_solucao')->textarea(['rows' => 6, 'maxlength' => 300, 'style' => 'width:800px',]) ?>

        <?= $form->field($model, 'nome_especialista')->textInput(['maxlength' => 200, 'style' => 'width:800px',]) ?>

        <?php /* $form->field($model, 'funcao_especialista')->textInput(['maxlength' => 100, 'style' => 'width:500px',]) */ ?>

        <?= $form->field($model, 'relator')->dropDownList([$arrayRelatores],['style' => 'width:500px',
                                                      'prompt' => "Selecione um tipo de relator",]); ?> 

        <?= $form->field($model, 'funcao_especialista')->dropDownList([$arrayRelatores],['style' => 'width:500px',
                                                      'prompt' => "Selecione a função do especialista",]); ?> 
        
       <?= $form->field($model, 'func_esp')->textInput(['maxlength' => 250, 'style' => 'width:800px',])->label('Ou informe uma nova função do especialista:') ?>

        <fieldset> 
            <legend>Data de Ocorrência</legend>
        <?= $form->field($model, 'dia')->dropdownList([1 => 01, 2 => 02, 3 => 03, 4 => 04, 5 => 05, 6 => 06, 7 => 07, 8 => 08, 9 => 09, 
                                                       10 => 10, 11 => 11, 12 => 12, 13 => 13, 14 => 14, 15 => 15, 16 => 16, 17 => 17, 18 => 18, 19 => 19, 20 => 20, 23 => 23, 24 => 24, 25 => 25, 26 => 26, 27 => 27, 28 => 28, 29 => 29, 30 => 30, 31 => 31], 
                                                      ['prompt' => 'Selecione o dia', 'style' => 'width:180px']) ?>

        <?= $form->field($model, 'mes')->dropdownList([1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril', 5 => 'Maio',
                                                       6 => 'Junho', 7 => 'Julho', 8 => 'Agosto', 9 => 'Setembro', 10 => 'Outubro',
                                                       11 => 'Novembro', 12 => 'Dezembro'], 
                                                      ['prompt' => 'Selecione o mês', 'style' => 'width:180px']) ?>

        <?= $form->field($model, 'ano')->dropdownList([2018 => 2018, 2017 => 2017, 2016 => 2016, 2015 => 2015, 2014 => 2014, 
                                                       2013 => 2013, 2012 => 2012, 2011 => 2011, 2010 => 2010 ], 
                                                      ['prompt' => 'Selecione o ano', 'style' => 'width:180px']) ?>

        </fieldset>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
