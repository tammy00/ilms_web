<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Descricao */

/** view da pesquisa geral  **/

$this->title = 'Grafo de Trilha de Aprendizagem';


?>
<div >

    <h1><?= Html::encode($this->title) ?></h1>

    <a href="?r=site/vlesearch" class="btn btn-default">Voltar</a>

    <p>Curso: <?php echo $model->curso ?>	<br>
       Disciplina: <?php echo $model->disciplina ?>	<br>	
       Período: <?php echo $model->ano_periodo ?> <br>
       Polo: <?php echo $model->polo ?> <br>
       Total de Alunos: <?php echo $model->total_alunos ?> <br>  </p><br>



    <?php  $legenda = Url::base().'/graphs/legenda.png' ?>

        <img alt='Legenda' src=<?php echo $legenda ?> > <br><br>


    
    <?php  
    	//$url = Url::base().'/graphs/' .$model->nome_figura. '.png';

        $aux = 1;
        
        $filecount = 0;
		chdir('C:\xampp\htdocs\ilms_web\web\graphs');
        $arquivos = glob($model->nome_figura."*");
        
        //echo '<br>'.var_dump($arquivos).'<br>';
        
                 foreach ( $arquivos as $a)
        {
        	$figura = Url::base().'/graphs/' .$model->nome_figura.'_'.$aux.'.png';

        	echo '<img alt='. $model->nome_figura .' src='.$figura.' > <br><br>';

        	$aux++;
        }     
/*
                foreach ( $arquivos as $a)
        {
          $filecount++;
        }
          echo '<br>'.$filecount.'<br>';  */

    ?>

<br>
    <?php //echo $model->descricao ?>    
    <br>
    <p>
      <b>Dados do gráfico:</b> <br>
- Cada Tópico corresponde a uma Unidade na sala virtual.<br>
- Os Vértices armazenam as seguintes informações:<br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp• Sequência definida pelo docente para recursos e atividades;<br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp• Nome do recurso/atividade;<br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp• Tipo do recurso/atividade;<br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp• Tópico (unidade) do vértice;<br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp• Número de interações (V): tamanho do vértice.<br><br>

<b>Análise do gráfico:</b><br>
- Navegação mais concentrada, o que pode ser observado pelas arestas mais largas.<br>
-  Verificar que os alunos retornaram mais aos recursos anteriores, quando isso ocorre, indica que a turma teve dificuldades para compreender o assunto do tópico.<br>
- Uma proporção maior do número de arestas vermelhas indica que há uma grande chance de a turma estar enfrentando dificuldades no aprendizado.<br><br>

<b>Resultados a considerar:</b><br>
- Verificar se a turma costuma acessar os recursos diretamente.<br>
- Acessaram pouco alguns determinados recursos, como por exemplo, os links externos (URL)<br>
- Alunos com notas altas: poucas arestas, em sua maioria de avanço.<br>
- Alunos com notas baixas: há mais arestas e elas estão mais dispersas, em geral a quantidade de arestas de retorno (vermelhas) é maior que os demais tipos.<br>
</p>


</div>
