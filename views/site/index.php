<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'iLMS Framework';

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <?php if (Yii::$app->session->hasFlash('newcasesaved')) { ?>

        <div class="alert alert-success">
            Um novo caso foi salvo na base de dados.
        </div>
    <?php } if (Yii::$app->session->hasFlash('casesaved')) { ?>

        <div class="alert alert-success">
            Não sei que alerta colocar aqui.
        </div>
    <?php } else { ?>

        <div class="body-content">

            <div class="row">
                <div class="col-lg-4">
                    <h3>Não sabe como solucionar um problema?</h3>

                    <p><a class="btn btn-default" href="?r=site/search">Fazer busca &raquo;</a></p>
                </div>

                <div class="col-lg-4">
                    <h3>Deseja ver os casos não pertencentes a Base de Casos?</h3>

                    <p><a class="btn btn-default" href="?r=pesquisas/index"> Ver casos falsos &raquo;</a></p>
                </div>
            </div>

        </div>
    <?php } ?>
</div>
