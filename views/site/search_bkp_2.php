<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Busca de solução';
$this->params['breadcrumbs'][] = $this->title;
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>

<script>
$(document).ready(function(){
    $("#checkbox_rbc").click(function(){
        $("#div_rbc").toggle();
    });
    $("#checkbox_lms").click(function(){
        $("#div_lms").toggle();
    });
    $("#checkbox_exp").click(function(){
        $("#div_exp").toggle();
    });
});
</script>

<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <!--<div class="row">  -->
      <div class="col-xs-6 col-md-10"> <!-- class="col-lg-5" -->
      <br>
        <?php $form = ActiveForm::begin(); ?>

          <?= $form->field($model, 'natureza_problema')->radioList(['Infraestrutura' => 'Infraestrutura', 'Pedagógica' => 'Pedagógica', 'Acadêmica' => 'Acadêmica'])->label('Selecione a natureza do problema:');   ?>

          <?= $form->field($model, 'descricao_problema')->textarea(['rows' => 6])->label('Descreva o problema resumidamente:'); ?>

          <br><b>Selecione o agente: </b><br>
          <input type="checkbox" id="checkbox_rbc" name='agente_1' value='rbc'/> Casos Passados <br /> 
          <input type="checkbox" id="checkbox_exp" name='agente_2' value='exp'/> Opiniões <br />
          <input type="checkbox" id="checkbox_lms" name='agente_3' value='lms'/> Dados do AVA <br /> <br>

          <div id="div_rbc" style="display: none">   
                <?= $form->field($model, 'relator')->dropDownList([$arrayRelatores],['style' => 'width:500px',
                                                      'prompt' => "Selecione um relator",]); ?>  

                <?= $form->field($model, 'problema_detalhado')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'palavras_chaves')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'id_polo')->dropDownList([$arrayPolos],['style' => 'width:500px',
                                                      'prompt' => "Selecione um polo",]); ?>  
                                                      
          </div>

          <div id="div_lms" style="display: none"> 
                Conteudo para a box de moodle
                <br><br>
          </div>

          <div id="div_exp" style="display: none">  
                <?= $form->field($model, 'titulo_problema')->dropDownList([$arrayTitulosProblemas],['style' => 'width:500px',
                                                      'prompt' => "Selecione um problema",]); ?> 
                <br><br>
          </div>    

          <div class="form-group">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
          </div>

        <?php ActiveForm::end(); ?>

      </div>
        <!--</div>-->

</div>
