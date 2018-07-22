<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Descricao */

/** view da pesquisa geral  **/

$this->title = 'Monitor de Desempenho';
$this->params['breadcrumbs'][] = ['label' => 'Dados do Ambiente Virtual', 'url' => ['vlesearch']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div >

    <h1><?= Html::encode($this->title) ?></h1>



</div>
