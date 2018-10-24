<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <a href="?r=site/index" class="btn btn-default">Voltar</a><br><br>
<p>
    Para maiores informações sobre esse sistema ou sobre o <i>framework</i> iDE contatar:<br>
Pesquisadora responsável: Ketlen K. T. Lucena <br>
Email: <a href="mailto:ketlen.teles@gmail.com">ketlen.teles@gmail.com</a><br>
Responsável técnico: Tammy Hikari Y. Gusmão.<br>
Email: <a href="mailto:tammyhikari@gmail.com">tammyhikari@gmail.com</a><br>
</p>


</div>
