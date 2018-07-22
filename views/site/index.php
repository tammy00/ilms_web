<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'iDE Framework';

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>iDE Framework</h1>

        <p class="lead">Um framework para Educação à Distância</p>

        <!-- <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>  -->
    </div>
    

    <?php if ( Yii::$app->user->identity->perfil === 'Mediador/a' ) {   ?>

        <div class="body-content">

            <div class="row">
                <div class="col-lg-4" align="center">
                    <h3>Busca com RBC</h3>

                    <p><a class="btn btn-default" href="?r=site/cbrsearch"> Clicar aqui &raquo;</a></p>
                </div>

                <div class="col-lg-4" align="center">
                    <h3>Dados do Ambiente Virtual</h3>

                    <p><a class="btn btn-default" href="?r=site/vlesearch"> Clicar aqui &raquo;</a></p>
                </div>
                <div class="col-lg-4" align="center">
                    <h3>Opinião de Especialistas</h3>

                    <p><a class="btn btn-default" href="?r=site/expsearch"> Clicar aqui &raquo;</a></p>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-6" align="center">
                    <h3>Casos Passados</h3>

                    <p><a class="btn btn-default" href="?r=">Clicar aqui &raquo;</a></p>
                </div>

                <div class="col-md-6" align="center">
                    <h3>Histórico de Buscas</h3>

                    <p><a class="btn btn-default" href="?r=pesquisas/allcases"> Clicar aqui &raquo;</a></p>
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
