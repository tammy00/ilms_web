<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Busca de solução';
$this->params['breadcrumbs'][] = $this->title;
?>

<script type="text/javascript"> 
    function toggleRBC(chkbox, div_rbc) { 
        var visSetting = (chkbox.checked) ? "visible" : "hidden"; 
        document.getElementById(div_rbc).style.visibility = visSetting; 
    } 

    function OnChangeCheckboxRBC (checkbox) {
         if (checkbox.checked) {
            $("#busca_rbc").prop("style", "display: block");
                //alert ("The check box is checked.");
        }
        else {
            $("#busca_rbc").prop("style", "display: none");
                //alert ("The check box is not checked.");
        }
    }

</script> 

<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <!--<div class="row">  -->
      <div class="col-xs-6 col-md-10"> <!-- class="col-lg-5" -->
        <?php $form = ActiveForm::begin(); ?>

          <?= $form->field($model, 'natureza_problema')->radioList(['Infraestrutura' => 'Infraestrutura', 'Pedagógica' => 'Pedagógica', 'Acadêmica' => 'Acadêmica'],
              ['item' => function($index, $label, $name, $checked, $value) {    
               $return = '<label class="radio">';
               $return .= '<input type="radio" name="' . $name . '" value="' . $value . '">';
               $return .= '<label>' . ucwords($label) . '</label>';
               $return .= '</label>';
               return $return;
             },
               //'onclick' => "alert('test')"
           ]
         )->label(false); ?>

          <input type="checkbox" id="checkForMoreInfo" onclick="OnChangeCheckboxRBC(this)" >
          <!-- <input type="checkbox" id="checkForMoreInfo" onclick="toggle(this, 'adicionais')" >  -->
          <label for="checkForMoreInfo">Adicionar mais informações</label>

          <div id="busca_rbc" style="display: none">
                <?= $form->field($model, 'relator')->dropDownList([$arrayRelatores],['style' => 'width:500px',
                                                      'prompt' => "Selecione um relator",]); ?>  

                <?= $form->field($model, 'descricao_problema')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'problema_detalhado')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'palavras_chaves')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'id_polo')->dropDownList([$arrayPolos],['style' => 'width:500px',
                                                      'prompt' => "Selecione um polo",]); ?>  
          </div>

          <div class="form-group">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
          </div>

        <?php ActiveForm::end(); ?>

      </div>
        <!--</div>-->

</div>
