<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Relator;
use app\models\Polo;
use yii\helpers\ArrayHelper;

$this->title = 'Busca de solução';
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

              <?php }
        ?>

      <br>
        <?php $form = ActiveForm::begin(); ?>

                
          <?= $form->field($model, 'natureza_problema')->radioList(['Infraestrutura/Administrativa' => 'Infraestrutura/Administrativa', 'Pedagógica' => 'Pedagógica', 'Acadêmica' => 'Acadêmica'])->label('Selecione a natureza do problema:');   ?>

          <?= $form->field($model, 'descricao_problema')->textarea(['rows' => 6])->label('Descreva o problema resumidamente:'); ?>


                <?= $form->field($model, 'relator')->dropDownList(ArrayHelper::map(Relator::find()->asArray()->all(), 'id_relator', 'perfil'),['style' => 'width:500px',
                                                      'prompt' => "Selecione um relator",]); ?>  

                <?= $form->field($model, 'problema_detalhado')->textarea(['rows' => 6])->label('Descreva o problema detalhadamente:'); ?>

                <?= $form->field($model, 'palavras_chaves')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'id_polo')->dropDownList(ArrayHelper::map(Polo::find()->asArray()->all(), 'id_polo', 'nome'),['style' => 'width:500px',
                                                      'prompt' => "Selecione um polo",]); ?>  
                         
<br><br> 

          <div class="form-group">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
          </div>

        <?php ActiveForm::end(); ?>

      </div>
        <!--</div>-->

</div>


