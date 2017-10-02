<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Busca de solução';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--  
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript"> 

  $(document).ready(function () {
    $("input[type=radio]").click(function () {
      var value = $(this).val();
      if (value == 'Acadêmica') {
        $("#rbc_box").show();
        $("#moodle_box").hide();
        $("#experts_box").hide();
      } 
      if (value == 'Pedagógica') {
        $("#rbc_box").hide();
        $("#moodle_box").show();
        $("#experts_box").hide();
      } 
      else if (value == 'Infraestrutura') 
      {
        $("#rbc_box").hide();
        $("#moodle_box").hide();
        $("#experts_box").show();
      }
    });
  });  

</script>   -->

<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <!--<div class="row">  -->
      <div class="col-xs-6 col-md-10"> <!-- class="col-lg-5" -->
      <br>
        <?php $form = ActiveForm::begin(); ?>

          <?= $form->field($model, 'natureza_problema')->radioList(['Infraestrutura' => 'Infraestrutura', 'Pedagógica' => 'Pedagógica', 'Acadêmica' => 'Acadêmica'],
              ['item' => function($index, $label, $name, $checked, $value) {    
               $return = '<label class="radio">';
               $return .= '<input type="radio" name="' . $name . '" value="' . $value . '">';
               $return .= '<label>' . ucwords($label) . '</label>';
               $return .= '</label>';
               return $return;
             },
           ]
         )->label('Selecione a natureza do problema:');   ?>
<!--
          <div id="rbc_box" style="display: none">   -->
                <?= $form->field($model, 'relator')->dropDownList([$arrayRelatores],['style' => 'width:500px',
                                                      'prompt' => "Selecione um relator",]); ?>  

                <?= $form->field($model, 'descricao_problema')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'problema_detalhado')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'palavras_chaves')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'id_polo')->dropDownList([$arrayPolos],['style' => 'width:500px',
                                                      'prompt' => "Selecione um polo",]); ?>  
                                                      <!--
          </div>

          <div id="moodle_box" style="display: none"> 
                Conteudo para a box de moodle
                <br><br>
          </div>

          <div id="experts_box" style="display: none">  
                Conteudo para a box de experts
                <br><br>
          </div>    -->

          <div class="form-group">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
          </div>

        <?php ActiveForm::end(); ?>

      </div>
        <!--</div>-->

</div>
