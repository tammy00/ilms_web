<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Busca de solução';
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
    <h1><?= Html::encode($this->title) ?></h1>
    
      <div class="col-xs-6 col-md-10"> 
      <br>
        <?php $form = ActiveForm::begin(); ?>

          <?= $form->field($model, 'natureza_problema')->radioList(['Infraestrutura' => 'Infraestrutura', 'Pedagógica' => 'Pedagógica', 'Acadêmica' => 'Acadêmica'])->label('Selecione a natureza do problema:');   ?>

          <?= $form->field($model, 'descricao_problema')->textarea(['rows' => 6])->label('Descreva o problema resumidamente:'); ?>



          <fieldset>   
                <legend>Casos Passados</legend>
                <?= $form->field($model, 'relator')->dropDownList([$arrayRelatores],['style' => 'width:500px',
                                                      'prompt' => "Selecione um relator",]); ?>  

                <?= $form->field($model, 'problema_detalhado')->textarea(['rows' => 6])->label('Descreva o problema detalhadamente:'); ?>

                <?= $form->field($model, 'palavras_chaves')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'id_polo')->dropDownList([$arrayPolos],['style' => 'width:500px',
                                                      'prompt' => "Selecione um polo",]); ?>  
                                                      
          </fieldset>
<br><br> 

          <div class="form-group">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
          </div>

        <?php ActiveForm::end(); ?>

      </div>
        <!--</div>-->

</div>

<?php
/*
    $this->registerJs('
        $(document).ready(function(){
            if ($("#site-cbr").is(":checked"))
                $("#div_rbc").prop("style", "display: block");
            else
              $("#div_rbc").prop("style", "display: none");

            if ($("#site-lms").is(":checked"))
                $("#div_lms").prop("style", "display: block");
            else
              $("#div_lms").prop("style", "display: none");

            if ($("#site-experts").is(":checked"))
                $("#div_exp").prop("style", "display: block");
            else
              $("#div_exp").prop("style", "display: none");
        });'
    );    

    $this->registerJs('
        $(document).ready(function(){
            $("#site-cbr").change(function(){
                if ($("#site-cbr").is(":checked")) {
                    $("#site-cbr").val("1");
                    $("#div_rbc").prop("style", "display: block");
                }
                else {
                    $("#site-cbr").val("0");
                    $("#div_rbc").prop("style", "display: none");
                }
            });
        });'
    );

    $this->registerJs('
        $(document).ready(function(){
            $("#site-lms").change(function(){
                if ($("#site-lms").is(":checked")) {
                    $("#site-lms").val("1");
                    $("#div_lms").prop("style", "display: block");
                }
                else {
                    $("#site-lms").val("0");
                    $("#div_lms").prop("style", "display: none");
                }
            });
        });'
    );

    $this->registerJs('
        $(document).ready(function(){
            $("#site-experts").change(function(){
                if ($("#site-experts").is(":checked")) {
                    $("#site-experts").val("1");
                    $("#div_exp").prop("style", "display: block");
                }
                else {
                    $("#site-experts").val("0");
                    $("#div_exp").prop("style", "display: none");
                }
            });
        });'
    );   */

?>
