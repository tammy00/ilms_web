<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Descricao */

/** view da pesquisa geral  **/

$this->title = 'Grafo de Linha de Aprendizagem';
$this->params['breadcrumbs'][] = ['label' => 'Dados do Ambiente Virtual', 'url' => ['vlesearch']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div >

    <h1><?= Html::encode($this->title) ?></h1>

    <p>Curso: <?php echo $model->nome ?>	Disciplina: <?php echo $model->nome ?>		Período: 2017/1 </p><br>
    
    <?php //$url = Url::base().'/graphs/lpgraph_curso_' .$model->id_curso. '.png' ?>
    <?php $url = Url::base().'/graphs/1.jpg' ?>
        <img alt="LP Graph Curso Educação Física" src=<?php echo $url?> > <br>




</div>
