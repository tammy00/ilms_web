<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TipoProblema;
use app\models\TituloProblema;
use yii\helpers\ArrayHelper;

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


                <?= $form->field($model, 'tipo_problema')->dropDownList(ArrayHelper::map(TipoProblema::find()->asArray()->all(), 'id', 'tipo'),['style' => 'width:500px',
                                                      'prompt' => "Selecione um tipo de problema",]); ?> 
                
                <?= $form->field($model, 'titulo_problema')->dropDownList(ArrayHelper::map(TituloProblema::find()->asArray()->all(), 'id', 'titulo'),['style' => 'width:500px',
                                                      'prompt' => "Selecione um título de problema",]); ?> 
                <br><br>
  

          <div class="form-group">
            <?= Html::submitButton('Consultar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
          </div>

        <?php ActiveForm::end(); ?>

      </div>
        <!--</div>-->

</div>


