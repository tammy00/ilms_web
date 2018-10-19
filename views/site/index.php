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

              <?php } ?>

        
    <div class="well">

        <div class="row">

                <div class="col-lg-4" align="center">
                    <h3>Busca em casos passados</h3>

                    <p><a class="btn btn-primary" role="button" href='?r=site/cbrsearch'> Clicar aqui &raquo;</a></p>

                </div>

                <div class="col-lg-4" align="center">
                    <h3>Busca em Dados do AVA</h3>

                    <p><a class="btn btn-primary" role="button" href="?r=site/vlesearch">Clicar aqui &raquo;</a></p>
                </div>

                <div class="col-lg-4" align="center">
                    <h3>Busca em Opinião de Especialistas</h3>

                    <p><a class="btn btn-primary" role="button" href="?r=site/expsearch"> Clicar aqui &raquo;</a></p>
                </div>
        </div>

    

        <br>
        <div class="row">
            <div class="col-md-4" align="center"></div>
            
            <div class="col-md-4" align="center">
                <h3>Combinar Métodos de Busca</h3>

                <p><a class="btn btn-primary" role="button" href='?r=site/combinacao'> Clicar aqui &raquo;</a></p>

            </div>
                
            <div class="col-md-4" align="center"></div>
        </div>
    </div>

        <br>

        <div class="row">

            <div class="col-md-6" align="center">
                <h3>Base de Casos</h3>

                <p><a class="btn btn-default" href="?r=pesquisas/allcases">Clicar aqui &raquo;</a></p>
            </div>

            <div class="col-md-6" align="center">
                <h3>Histórico de Buscas</h3>

                <p><a class="btn btn-default" href="?r=pesquisas/allsearches"> Clicar aqui &raquo;</a></p>
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
