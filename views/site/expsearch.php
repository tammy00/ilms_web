<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Consulta ao especialista';
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
    <h1><?= Html::encode($this->title) ?></h1>
    
      <div class="col-xs-6 col-md-10"> 
      <br>
        <?php $form = ActiveForm::begin(); ?>

          <fieldset>
                <legend>Opinião de Especialistas</legend> 
                <?= $form->field($model, 'titulo_problema')->dropDownList([$arrayTitulosProblemas],['style' => 'width:500px',
                                                      'prompt' => "Selecione um problema",]); ?> 
                <br><br>
          </fieldset>    

          <div class="form-group">
            <?= Html::submitButton('Consultar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
          </div>

        <?php ActiveForm::end(); ?>

      </div>
        <!--</div>-->

</div>


?>
