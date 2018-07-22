<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Descricao */

/** view da pesquisa geral  **/

$this->title = 'Monitor de Comportamento';
$this->params['breadcrumbs'][] = ['label' => 'Dados do Ambiente Virtual', 'url' => ['vlesearch']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div >

    <h1><?= Html::encode($this->title) ?></h1>

    <p>Curso: <?php echo $model->nome ?> </p>

    <?php $url = Url::base().'/graphs/behaviour_curso_'.$model->id_curso.'.png' ?>
        <img src=<?php echo $url ?> ><br>
</div>
