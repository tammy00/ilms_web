<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Polo */

$this->title = 'Update Polo: ' . $model->coordenador;
$this->params['breadcrumbs'][] = ['label' => 'Polos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->coordenador, 'url' => ['view', 'coordenador' => $model->coordenador, 'tipo_conexao' => $model->tipo_conexao, 'infra_laboratorio' => $model->infra_laboratorio, 'infra_fisica' => $model->infra_fisica, 'infra_cidade' => $model->infra_cidade, 'acesso' => $model->acesso]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="polo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
