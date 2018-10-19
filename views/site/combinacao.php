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

$this->title = 'Busca combinada de solução';
?>

<div>
    <h1><?= Html::encode($this->title) ?></h1>

    <a href="?r=site/index" class="btn btn-default">Voltar</a>
    
      <div class="col-xs-6 col-md-10"> 

        <?php 
              if ( isset($mensagem) )
              {    ?>
                  <div class="alert alert-danger">
                       <?php echo $mensagem ?>
                  </div>
              <?php } ?>

      <br>
        <?php $form = ActiveForm::begin(); ?>

                <fieldset>
                        <legend>Opções de combinação</legend> 

                        <?= $form->field($model, 'cbr')->checkbox(['value' => 1, 'uncheck' => null]) ?>
                        <?= $form->field($model, 'ava')->checkbox(['value' => 1, 'uncheck' => null]) ?>
                        <?= $form->field($model, 'esp')->checkbox(['value' => 1, 'uncheck' => null]) ?>

                </fieldset>

                <?= $form->field($model, 'palavras_chaves')->textInput(['maxlength' => true]) ?>
                
<!--   -->
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
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
          </div>

        <?php ActiveForm::end(); ?>

      </div>
        <!--</div>-->

</div>
