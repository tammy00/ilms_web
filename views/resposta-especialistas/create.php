<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RespostaEspecialistas */

$this->title = 'Cadastrar nova opinião';
$this->params['breadcrumbs'][] = ['label' => 'Resposta dos Especialistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resposta-especialistas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
