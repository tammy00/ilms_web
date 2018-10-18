<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveField;

$this->title = 'iDE Framework';

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>iDE Framework</h1>

        <p class="lead">Um framework para Educação à Distância</p>
    </div>


    

    <?php if ( Yii::$app->user->identity->perfil === 'Mediador/a' ) {   ?>

        <?php 
              if ( isset($mensagem_nao) )
              {    ?>
                  <div class="alert alert-danger">
                       <?php echo $mensagem_nao ?>
                  </div>

              <?php }

              if ( isset($mensagem_sim) )
              {    ?>
                  <div class="alert alert-success">
                       <?php echo $mensagem_sim ?>
                  </div>

              <?php }
        ?>

        

        <div class="body-content">

          <?php $form = ActiveForm::begin(); ?>


             <?= $form->field($model, 'agente')->radioList([ 1 => 'Busca com CBR', 2 => 'Dados do Ambiente Virtual   ', 3 => 'Opinião de Especialistas&raquo', 4 => 'Combinação']); 

             ?> 


          <div class="form-group">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
          </div>

        <?php ActiveForm::end(); ?>
        </div>

<br>

            <div class="row">

                <div class="col-lg-4" align="center">
                    <h3>Combinar Agentes</h3>

                    <p><a class="btn btn-default" href='?r=site/combinacao'> Clicar aqui &raquo;</a></p>

                </div>

                <div class="col-lg-4" align="center">
                    <h3>Base de Casos</h3>

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
