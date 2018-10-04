<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'iDE Framework';

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>iDE Framework</h1>

        <p class="lead">Um framework para Educação à Distância</p>
    </div>


    

    <?php if ( Yii::$app->user->identity->perfil === 'Mediador/a' ) {   ?>

        

        <div class="body-content">

          <?php $form = ActiveForm::begin(); ?>

             <?= $form->field($model, 'resumo')->textarea(['rows' => 6])->label('Descreva o problema resumidamente:'); ?>

             <?= $form->field($model, 'agente')->radioList([ 1 => 'Busca com RBC', 2 => 'Dados do Ambiente Virtual', 3 => 'Opinião de Especialistas']); 

             ?> 


          <div class="form-group">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
          </div>

        <?php ActiveForm::end(); ?>
        </div>

<br>

            <div class="row">

                <div class="col-lg-4" align="center">
                    <h3>Agentes combinados</h3>

                    <p><a class="btn btn-default" href="?r="> Clicar aqui &raquo;</a></p>

                </div>

                <div class="col-lg-4" align="center">
                    <h3>Casos Passados</h3>

                    <p><a class="btn btn-default" href="?r=pesquisas/allcases">Clicar aqui &raquo;</a></p>
                </div>

                <div class="col-lg-4" align="center">
                    <h3>Histórico de Buscas</h3>

                    <p><a class="btn btn-default" href="?r=pesquisas/allsearches"> Clicar aqui &raquo;</a></p>
                </div>
            </div>

        </div>
    <?php } ?>

    <?php if ( Yii::$app->user->identity->perfil === 'Especialista' ) {   ?>

        <div class="body-content">

            <div class="row">
                <div class="col-md-6" align="center">
                    <h3>Registrar nova opinião</h3>

                    <p><a class="btn btn-default" href="?r=resposta-especialistas/create">Clicar aqui &raquo;</a></p>
                </div>

                <div class="col-md-6" align="center">
                    <h3>Histórico de opiniões</h3>

                    <p><a class="btn btn-default" href="?r=resposta-especialistas/index"> Clicar aqui &raquo;</a></p>
                </div>
            </div>

        </div>
    <?php } ?>


</div>
