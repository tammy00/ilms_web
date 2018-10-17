<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Busca combinada de solução';
?>

<div>
    <h1><?= Html::encode($this->title) ?></h1>

    <a href="?r=site/index" class="btn btn-default">Voltar</a>
    
      <div class="col-xs-6 col-md-10"> 
      <br>
        <?php $form = ActiveForm::begin(); ?>

                <fieldset>
                        <legend>Opções de combinação</legend> 

                        <?= $form->field($model, 'cbr')->radio(['value' => 1, 'uncheck' => null]) ?>
                        <?= $form->field($model, 'ava')->radio(['value' => 1, 'uncheck' => null]) ?>
                        <?= $form->field($model, 'esp')->radio(['value' => 1, 'uncheck' => null]) ?>

                </fieldset>

                <?= $form->field($model, 'palavras_chaves')->textInput(['maxlength' => true]) ?>
                
                <?= $form->field($model, 'tipo_problema')->dropDownList([$arrayTiposProblemas],['style' => 'width:500px',
                                                      'prompt' => "Selecione um tipo de problema",]); ?> 
                
                <?= $form->field($model, 'titulo_problema')->dropDownList([$arrayTitulosProblemas],['style' => 'width:500px',
                                                      'prompt' => "Selecione um título de problema",]); ?> 
<br><br> 

          <div class="form-group">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
          </div>

        <?php ActiveForm::end(); ?>

      </div>
        <!--</div>-->

</div>
