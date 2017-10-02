<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TituloProblema */

$this->title = 'Create Titulo Problema';
$this->params['breadcrumbs'][] = ['label' => 'Titulo Problemas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titulo-problema-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
