<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TipoProblemaSearch;
use app\models\TituloProblemaSearch;
use app\controllers\SiteController;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$this->title = 'Consulta ao especialista';?>

<div>
    <h1><?= Html::encode($this->title) ?></h1>

    
    
      <div class="col-xs-6 col-md-10"> 
        <a href="?r=site/index" class="btn btn-default">Voltar</a><br>

        <?php 
              if ( isset($mensagem) )
              {    ?>
                  <div class="alert alert-danger">
                       <?php echo $mensagem ?>
                  </div>

              <?php }
        ?>
      <br>
        <?php $form = ActiveForm::begin(); ?>


                <?= $form->field($model, 'tipo_aux')->dropDownList(ArrayHelper::map(TipoProblemaSearch::find()->all(), 'tipo', 'tipo'), 
                ['style' => 'width:500px',
                'prompt' => "Selecione um tipo de problema", 
                'onchange'=>'$.get( "'.Url::toRoute(['site/list_titulo']).'", { tipo : $(this).val() })
                    .done(function(data) {
                        $( "#'.Html::getInputId($model, 'titulo_aux').'").html(data);
                });'
                ]) 
                ?>
                 
                
                <?= $form->field($model, 'titulo_aux')->dropDownList([$arrayTitulosProblemas],['style' => 'width:500px',
                                                      'prompt' => "Selecione um título de problema",]); ?> 
                <br><br>
  

          <div class="form-group">
            <?= Html::submitButton('Consultar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
          </div>

        <?php ActiveForm::end(); ?>

      </div>
        <!--</div>-->

</div>


