<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Curso;
use app\models\CursoSearch;
use app\models\Descricao;
use app\models\BuscaGeral;
use app\models\FormInicial;
use app\models\Combinacao;
use app\models\RespostaEspecialistas;
use app\models\RespostaEspecialistasSearch;
use app\models\TipoProblema;
use app\models\TituloProblema;
use app\models\Disciplina;
use app\models\Pesquisas;
use app\models\Relator;
use app\models\Solucao;
use app\models\PoloSearch;
use app\models\TituloProblemaSearch;
use app\models\TipoProblemaSearch;
use app\models\Polo;
use app\models\RelatorSearch;
use app\models\DisciplinaSearch;
use app\models\Usuario;
use app\models\FigurasAva;
use app\models\FigurasAvaSearch;
use yii\helpers\ArrayHelper;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'index', 'view', 'doom', 'cbrsearch', 'vlesearch', 'expsearch', 'cbrview', 'vleview', 'expview', 'lpgraph', 'behaviour', 'desempenho', 'combinacao', 'viewcombinacao'],
                'rules' => [
                    [
                        'actions' => ['logout', 'index', 'view', 'doom', 'cbrsearch', 'vlesearch', 'expsearch', 'cbrview', 'vleview', 'expview', 'lpgraph', 'behaviour', 'desempenho', 'combinacao', 'viewcombinacao'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

/*******     INDEX início     *******************/

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
    	$model = new FormInicial();

    	if ( $model->load(Yii::$app->request->post() ))
    	{

    		if ( $model->agente == 1 ) return $this->redirect(['site/cbrsearch', 'resumo' => $model->resumo]);
    		//return $this->actionCbrsearch($model->resumo);
    		//return Yii::$app->runAction('site/cbrsearch',['resumo' => $resumo ]);
    		//return $this->actionCbrsearch();
    		elseif ( $model->agente == 2) return $this->redirect(['site/vlesearch', 'resumo' => $model->resumo]);
    		elseif ( $model->agente == 3) return $this->redirect(['site/expsearch', 'resumo' => $model->resumo]);
            elseif ( $model->agente == 4) return $this->redirect(['site/combinacao', 'resumo' => $model->resumo]);
    		//else return $this->actionDoom('não deu certo');
    	}
    	else
    	{
    		return $this->render('index', [
				            'model' => $model,
				        ]);    
    	}
    }

/*******************     INDEX fim     *******************/


/******************     LOGIN LOGOUT   FINDONE   CONTACT    ABOUT   DOOM   início     *******************/



    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }



    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    public function actionDoom($texto)
    {
        return $this->render('doom', ['message' => $texto]);
    }

    public function actionView($id)   // Em desuso, mas acesso ainda possível
    {
        $pesquisa = Pesquisas::find()->where(['id_pesquisa' => $id])->one();
        if ( $pesquisa == null ) return $this->actionDoom('pesquisa não foi salva: '.$id);

        if ( $pesquisa->id_solucao != null ) 
        {
            $sol = Solucao::find()->where(['id_solucao' => $pesquisa->id_solucao])->one();
            $pesquisa->similaridade = round(($pesquisa->similaridade * 100 ));
        }
        else $sol = null;

        if ( $pesquisa->id_titulo_problema > 0 )
        {
            $exp_resposta = RespostaEspecialistasSearch::searchForResponses($pesquisa->id_titulo_problema);
        }  
        else $exp_resposta = null;   

        if ( $pesquisa->id_polo != null )
        {
            $polo = Polo::find()->where(['id_polo' => $pesquisa->id_polo])->one();
            $pesquisa->id_polo = $polo->nome;
        }

        switch ($pesquisa->status)
        {
             case 0: 
                 $pesquisa->status = 'Sem resposta';
                 break;
             case 1: 
                 $pesquisa->status = 'Solução não ajudou';
                 break;
             case 2: 
                 $pesquisa->status = 'Caso da Base de Casos';
                 break;
        }

        return $this->render('view', [
            'pesquisa' => $pesquisa,
            'sol' => $sol,
            'exp_resposta' => $exp_resposta,
        ]);
    }



/******************     LOGIN LOGOUT   FINDONE   CONTACT    ABOUT   DOOM   fim     *******************/




/********************************    VIEWS    início      ******************************/


    public function actionViewcombinacao ($id)
    {
    	$model_descricao = Pesquisas::find()->where(['id_pesquisa' => $id])->one();

    	/***** RBC   ******/

        $model_solucao = new Solucao();

        if ( $model_descricao->id_solucao != null)
        {
            $model_solucao = Solucao::find()->where(['id_solucao' => $model_descricao->id_solucao])->one();
        }

    	

    	$model_descricao->similaridade = round(($model_descricao->similaridade * 100 ));

        
        $model_descricao->id_polo = "";

    	/***** RBC END  ******/

    	/***** AVA   ******/

    	$model_ava = FigurasAva::find()->where(['id_figura' => $model_descricao->id_ava])->one();

    	/***** AVA END  ******/

    	/***** ESPECIALISTAS   ******/

    	$model_esp = RespostaEspecialistas::find()->where(['id' => $model_descricao->id_resposta])->one();

        if ( $model_esp != null )
        {
            Yii::$app->formatter->locale = 'pt-BR';
            $model_esp->data_ocorrencia = Yii::$app->formatter->asDate($model_esp->data_ocorrencia);
            $model_esp->data_insercao = Yii::$app->formatter->asDate($model_esp->data_insercao);

            $tipo = TipoProblema::find()->where(['id' => $model_esp->id_tipo_problema])->one();
            $titulo = TituloProblema::find()->where(['id' => $model_esp->id_titulo_problema])->one();
            $model_esp->id_tipo_problema = $tipo->tipo;
            $model_esp->id_titulo_problema = $titulo->titulo;

            $model_esp->funcao_especialista = "";
            $model_esp->relator = "";            
        }


    	/***** ESPECIALISTAS END  ******/

        return $this->render('viewcombinacao', [
            'model_descricao' => $model_descricao,
            'model_solucao' => $model_solucao,
            'model_ava' => $model_ava,
            'model_esp' => $model_esp,
        ]);
    }


    public function actionCbrview($id)
    {
        $pesquisa = Pesquisas::find()->where(['id_pesquisa' => $id])->one();

        if ( $pesquisa == null ) 
        	return $this->actionDoom('Pesquisa não foi salva: '.$id);
        else 
        {

	        if ( $pesquisa->id_solucao != null ) 
	        {
	            $sol = Solucao::find()->where(['id_solucao' => $pesquisa->id_solucao])->one();
	            $pesquisa->similaridade = round(($pesquisa->similaridade * 100 ));
	        }
	        else $sol = null;

	        if ( $pesquisa->id_polo != null )
	        {
	            $polo = Polo::find()->where(['id_polo' => $pesquisa->id_polo])->one();
	            $pesquisa->id_polo = $polo->nome;
	        }

	        switch ($pesquisa->status)
	        {
	             case 0: 
	                 $pesquisa->status = 'Sem resposta';
	                 break;
	             case 1: 
	                 $pesquisa->status = 'Solução não ajudou';
	                 break;
	             case 2: 
	                 $pesquisa->status = 'Caso da Base de Casos';
	                 break;
	        }

	        return $this->render('cbrview', [
	            'pesquisa' => $pesquisa,
	            'sol' => $sol,
	        ]);
        }
    }



    public function actionExpview($id)
    {
        $pesquisa = Pesquisas::find()->where(['id_pesquisa' => $id])->one();

        if ( $pesquisa == null ) 
        	return $this->actionDoom('Pesquisa não foi salva: '.$id);
        else {

	        if ( $pesquisa->id_resposta > 0 )
	        {
	            $dados_resp = RespostaEspecialistas::find()->where(['id' => $pesquisa->id_resposta])->one();
	            $exp_resposta = RespostaEspecialistasSearch::searchForResponses($dados_resp->id_titulo_problema, $dados_resp->id_tipo_problema);
	        }  
	        else $exp_resposta = null;   

	        if ( $pesquisa->id_polo != null )
	        {
	            $polo = Polo::find()->where(['id_polo' => $pesquisa->id_polo])->one();
	            $pesquisa->id_polo = $polo->nome;
	        }

	        switch ($pesquisa->status)
	        {
	             case 0: 
	                 $pesquisa->status = 'Sem resposta';
	                 break;
	             case 1: 
	                 $pesquisa->status = 'Solução não ajudou';
	                 break;
	             case 2: 
	                 $pesquisa->status = 'Caso da Base de Casos';
	                 break;
	        }

	        return $this->render('expview', [
	            'pesquisa' => $pesquisa,
	            'exp_resposta' => $exp_resposta,
	        ]);
        }
    }


    public function actionLpgraph($id)
    {

        $model1 = FigurasAva::find()->where(['id_figura' => $id])->one();

        if ( $model1->aplicativo == 'LPGraph')
        {
            return $this->render('lpgraph', [
                'model' => $model1,
            ]);
        }
        else
        {
            $model_verdadeiro = FigurasAva::find()
                      ->where(['aplicativo' => 'LPGraph'])
                      ->andWhere(['curso' => $model1->curso])
                      ->andWhere(['disciplina' => $model1->disciplina])
                      ->andWhere(['ano_periodo' => $model1->ano_periodo])
                      ->andWhere(['total_aluno' => $model1->total_aluno])
                      ->one();

            return $this->render('lpgraph', [
                'model' => $model_verdadeiro,
            ]);            
        }


    }

    public function actionBehaviour($id)
    {

         $model1 = FigurasAva::find()->where(['id_figura' => $id])->one();

        if ( $model1->aplicativo == 'LMSMonitor')
        {
            return $this->render('behaviour', [
                'model' => $model1,
            ]);
        }
        else
        {
            $model_verdadeiro = FigurasAva::find()
                      ->where(['aplicativo' => 'LMSMonitor'])
                      ->andWhere(['curso' => $model1->curso])
                      ->andWhere(['disciplina' => $model1->disciplina])
                      ->andWhere(['ano_periodo' => $model1->ano_periodo])
                      ->andWhere(['total_aluno' => $model1->total_aluno])
                      ->one();

            return $this->render('behaviour', [
                'model' => $model_verdadeiro,
            ]);            
        }

    }

    public function actionDesempenho($id)
    {

         $model1 = FigurasAva::find()->where(['id_figura' => $id])->one();

        if ( $model1->aplicativo == 'WebMonitor')
        {
            return $this->render('desempenho', [
                'model' => $model1,
            ]);
        }
        else
        {
            $model_verdadeiro = FigurasAva::find()
                      ->where(['aplicativo' => 'WebMonitor'])
                      ->andWhere(['curso' => $model1->curso])
                      ->andWhere(['disciplina' => $model1->disciplina])
                      ->andWhere(['ano_periodo' => $model1->ano_periodo])
                      ->andWhere(['total_aluno' => $model1->total_aluno])
                      ->one();

            return $this->render('desempenho', [
                'model' => $model_verdadeiro,
            ]);            
        }
      	
    }



/***********************************    VIEWS    fim      ******************************/



/**********************    MECANISMOS DE BUSCA     início     *****************/
    /****
    Combina o uso de RBC, AVA e opinião dos especialistas 
    ****/

    public function actionCombinacao ($resumo)
    {
    	$model = new Combinacao();

    	if ( $model->load(Yii::$app->request->post()) )
    	{
    		$resultado_id = -10;
    		$imagem_id = 0;

	    	/***** RBC   ******/
	    	if ( $model->cbr != null )  // RBC foi selecionado
	    	{
	    		$tipodoproblema = TipoProblema::find()->where(['id' => $model->tipo_problema])->one();

                $resultado_id = $this->agenteRBC(NULL, $resumo, NULL, NULL, $model->palavras_chaves, $tipodoproblema->tipo);   
                //($polo, $desc, $detalhado, $relator, $keywords, $natureza) 

	    	}
	    	/***** RBC END  ******/

	    	/***** AVA   ******/
	    	if ( $model->ava != null ) // AVA foi selecionado
	    	{
	    		$resultado_id = $this->agenteLMS($resultado_id, $model->palavras_chaves);
	    	}
	    	/***** AVA END  ******/

	    	/***** ESPECIALISTAS   ******/
	    	if ( $model->esp != null ) // ESP foi selecionado
	    	{
	            if ( $this->verificadorDadosEXP($model->titulo_problema, $model->tipo_problema) == 0 ) 
	            {
	            	$resposta = RespostaEspecialistas::find()->where(['id_titulo_problema' => $model->titulo_problema])
                                                     ->andWhere(['id_tipo_problema' => $model->tipo_problema])
                                                     ->one();

		            if ( $resposta != null )  // Verifica se existe ao menos um registro
		            {
		            	if ( $resultado_id == (-10) )  // Onde o rbc não foi seelcionado - não tem uma pesquisa combinada já criada
		            	{
			                $nova_pesquisa = new Pesquisas();
			                $nova_pesquisa->id_resposta = $resposta->id;
			                $nova_pesquisa->id_usuario = Yii::$app->user->identity->id;

			                if ( !$nova_pesquisa->save() )   // Se não salvar, tentar com false positivo
			                	return $this->actionDoom('Solução existente. Porém, a pesquisa não salva com sucesso.');		       
			                else $resultado_id = $nova_pesquisa->id_pesquisa;	
		            	}
		            	else
		            	{
		            		$atualiza = Pesquisas::find()->where(['id_pesquisa' => $resultado_id])->one();

		            		$atualiza->id_resposta = $resultado_id;

			                if ( !$atualiza->save() ) 
			                	return $this->actionDoom('Solução existente. Porém, a pesquisa não salva com sucesso.');	
		            	}

		                
		            }
	            }
	            else return $this->actionDoom('Por favor, informar o título e tipo do problema.'); 
	    	}
	    	/***** ESPECIALISTAS END  ******/   
            switch ($resultado_id)
                {
                    case 0:
                        return $this->actionDoom('Solução existente. Porém, a pesquisa não salva com sucesso.');
                        break;
                    case (-1):
                        return $this->actionDoom('Não foi possível registrar a pesquisa. Retorne à página anterior e tente novamente.');
                        break;
                    case (-2): 
                        return $this->actionDoom('Problema ao conectar com o servidor. Tente novamente.');
                        break;
                    case (-3):
                        return $this->actionDoom('Registro da solução não encontrada.');
                        break; 
                    case (-4):
                        return $this->actionDoom('Não há solução na base de casos com a descrição apresentada.');
                        break;
                    default:
                        break;   
                }  	
	    	return $this->actionViewcombinacao($resultado_id);
    	}
    	else
    	{
    		$arrayTitulosProblemas = ArrayHelper::map(TituloProblemaSearch::find()->all(), 'id', 'titulo');
            $arrayTiposProblemas = ArrayHelper::map(TipoProblemaSearch::find()->all(), 'id', 'tipo'); 

	        return $this->render('combinacao', [
	            'model' => $model,
	            'arrayTiposProblemas' => $arrayTiposProblemas,
	            'arrayTitulosProblemas' => $arrayTitulosProblemas,
	        ]);
    	}


    }



    public function actionVlesearch ($resumo)
    {
  
        //$searchModel = new CursoSearch();
        $searchModel = new FigurasAvaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('vlesearch', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
        
    }




    public function actionCbrsearch($resumo)  // Descricao vai ter todos os dados, independente de ser somente para o rbc
    { 

        //tipo_problema == natureza_problema
        $model = new BuscaGeral();

        if ( $model->load(Yii::$app->request->post()) ) // Se algo for submetido
        {
            $verificacao_rbc = -1;
            $resultado_id = -1;

             $verificacao_rbc = $this->verificadorDadosRBC ($model->id_polo, 
                $model->descricao_problema, 
                $model->relator, 
                $model->problema_detalhado, 
                $model->palavras_chaves);
             //return $this->actionDoom('Passou do verificador');

            if ( $verificacao_rbc == 0 )   // Checando se todos os dados necessários foram informados
            { 
            	
                $resultado_id = $this->agenteRBC($model->id_polo, 
                    $model->descricao_problema, 
                    $model->problema_detalhado, 
                    $model->relator, 
                    $model->palavras_chaves, 
                    $model->natureza_problema);     

                /**** Legenda de retornos
                -1 = pesqusia não foi salva (tem correspondência do servidor, mas por algum motivo a pesquisa não salvou)
                -2 = servidor retornou erro/correspondência "infectada"
                -3 = Null foi retornado como id da solução
                -4 = Null foi retornado como similaridade calculada
                Caso nenhuma das situações anteriores, vai para a função de visualização da pesquisa

                *******/

                // Voltando para o resultado da consulta rbc
                

                switch ($resultado_id)
                {
                    case 0:
                        return $this->actionDoom('Solução existente. Porém, a pesquisa não salva com sucesso.');
                        break;
                    case (-1):
                        return $this->actionDoom('Não foi possível registrar a pesquisa. Retorne à página anterior e tente novamente.');
                        break;
                    case (-2): 
                        return $this->actionDoom('Problema ao conectar com o servidor. Tente novamente.');
                        break;
                    case (-3):
                        return $this->actionDoom('Registro da solução não encontrada.');
                        break; 
                    case (-4):
                        return $this->actionDoom('Não há solução na base de casos com a descrição apresentada.');
                        break;
                    default:
                    	return $this->actionCbrview ($resultado_id);  //
                        break;   
                } 
                

            }  
            else
            {/*
            	$model->descricao_problema = $resumo;
            	return $this->render('cbrsearch', [
	                'model' => $model,
	                'arrayRelatores' => $this->arrayhelper_relator(),
	                'arrayPolos' => $this->arrayhelper_polo(),
	            ]);   */
	            return $this->actionDoom('Faltou pelo menos um dado.');
            }

            
        }   //else if request post
        else    // Primeiro acesso à tela de busca do agente RBC
        {
        	//$arrayRelatores = $this->arrayhelper_relator();
        	//$arrayPolos = $this->arrayhelper_polo();
        	$model->descricao_problema = $resumo;
        	

            return $this->render('cbrsearch', [
                'model' => $model,
	            'arrayRelatores' => $this->arrayhelper_relator(),
	            'arrayPolos' => $this->arrayhelper_polo(),
            ]);        
        }
    }



    public function actionExpsearch()  // Busca na base de dados de especialistas
    { 

        $model = new BuscaGeral();

        if ( $model->load(Yii::$app->request->post()) ) // Se algo for submetido
        {
            $verificacao_exp = -1;
            $resultado_id = -1;

            if ( $this->verificadorDadosEXP($model->titulo_problema, $model->tipo_problema) == 0 ) 
            {
                $resultado_id = $this->agenteExperts ($model->titulo_problema, $model->tipo_problema, $resultado_id);
                // A função acima retorna o id do registro da tabela pesquisa
                // Dependendo do valor de $resultado_id, o registro é criado ou não
            }
            else return $this->actionDoom('Por favor, informar o título do problema.'); 

            if ( $resultado_id == (-1) )
            {
            	$tipo = TipoProblema::find()->where(['id' => $model->tipo_problema])->one();
            	$titulo = TituloProblema::find()->where(['id' => $model->titulo_problema])->one();

            	return $this->actionDoom('Não há opinião de especialista cadastrada no banco de dados que envolva o título de problema "'.$titulo->titulo.'" e o tipo de problema "'.$tipo->tipo.'".'); 
            }
            else return $this->actionExpview ($resultado_id);  //

            
        }   //else if request post
        else    // Primeiro acesso à tela de busca
        {
            $arrayTitulosProblemas = ArrayHelper::map(TituloProblemaSearch::find()->all(), 'id', 'titulo');
            $arrayTiposProblemas = ArrayHelper::map(TipoProblemaSearch::find()->all(), 'id', 'tipo'); 

            return $this->render('expsearch', [
                'model' => $model,
                'arrayTitulosProblemas' => $arrayTitulosProblemas,
                'arrayTiposProblemas' => $arrayTiposProblemas,
            ]);        
        }
    }

/**********************    MECANISMOS DE BUSCA     fim     *****************/

/**********************    AGENTES     início     *****************/

    public function agenteRBC($polo, $desc, $detalhado, $relator, $keywords, $natureza)   // Consulta AGENTE CBR
    {
        $perfil = Relator::find()->where(['id_relator' => $relator])->one();  
        // find realizado para saber o nome do perfil, através do id_relator recebido 

        // Enviar json pelo CURL
        //Cria a array com os dados recebido, sendo q o ID é gerado pelo WS
        $flag = 0;

        if ( ($perfil == null) && ($detalhado == null) && ($relator == null ))
        {
            $postArray = array(
                "poloId" => $polo,
                "relatorId" => NULL,
                "descricaoProblema" => $desc,
                "problema" => NULL,
                "naturezaProblema" => $natureza,
                "palavrasChavesProblema" => $keywords,
            );

            $flag = 1;
        }
        else {         
            $postArray = array(
                "poloId" => $polo,
                "relatorId" => $perfil->perfil,
                "descricaoProblema" => $desc,
                "problema" => $detalhado,
                "naturezaProblema" => $natureza,
                "palavrasChavesProblema" => $keywords,
            );
        }

        // Converte os dados para o formato jSon
        $json = json_encode( $postArray );

        // receber resposta do servidor
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_PORT => "8080", //porta do WS
        CURLOPT_URL => "http://localhost:8080/ServerRest/ServerRest/casos/caso", //Caminho do WS que vai receber o POST
        CURLOPT_RETURNTRANSFER => true, //Recebe resposta
        CURLOPT_ENCODING => "JSON", //Decodificação
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30, // 30
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST", //metodo
        CURLOPT_POSTFIELDS => $json, //string com dados à serem postados
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($json)),
        ));
        //$curl = curl_setopt($json, CURLOPT_ENCODING ,'UTF-8');
        $result = curl_exec($curl); //recebe o resultado em json
        $err = curl_error($curl); //recebe o erro da classe ou WS
        curl_close($curl); //Encerra a biblioteca

        if ($err)
        {
            return (-2);

        } // ELSE pegar o id do caso, criar variável de similaridade, return view do Solução
        else
        {
            $result = utf8_encode($result);
            $data = json_decode($result,true);

            $idSolucao = $data['solucaoId'];
            $similaridadeCalculada = $data['similaridade'];

            if ( $data['solucaoId'] == null ) 
            {
                return (-3);
            }
            elseif ( $data['similaridade'] == null )
            {
                return (-4);
            }
            else {

                //Encontra o registro (no banco) do id recebido pelo componente RBC
                $modelSolucao = Solucao::find()->where(['id_solucao' => $idSolucao])->one();  

                // Salva a pesquisa
                $nova_pesquisa = new Pesquisas();
                $nova_pesquisa->id_solucao = $modelSolucao->id_solucao;
                $nova_pesquisa->id_polo = $polo;
                $nova_pesquisa->id_usuario = Yii::$app->user->identity->id;
                $nova_pesquisa->status = 0;  // 0 = criado, não salvo como novo caso

                if ( $flag == 1 )
                {
                    $nova_pesquisa->relator = "";  // ID do relator não é salvo nessa tabela
                    $nova_pesquisa->problema_detalhado = "";
                }
                else 
                {
                    $nova_pesquisa->relator = $perfil->perfil;  // ID do relator não é salvo nessa tabela
                    $nova_pesquisa->problema_detalhado = $detalhado;
                }
                
                $nova_pesquisa->natureza_problema = $natureza;
                $nova_pesquisa->descricao_problema = $desc;
                $nova_pesquisa->palavras_chaves = $keywords;
                $nova_pesquisa->similaridade = $similaridadeCalculada;
                $nova_pesquisa->metodo = 'RBC';

                if ($nova_pesquisa->save() )  // Se salvar a pesquisa
                {
                    return $nova_pesquisa->id_pesquisa;
                }
                else return 0;// Se a pesquisa não for salva
                
            }
            
        }  // end else para !erro
    }   // agenteRBC end



    public function agenteLMS($id, $palavras_chaves)   // Consulta AGENTE LMS linha 512
    {
        $model = FigurasAva::find()->where(['palavras_chaves' => $palavras_chaves])->andWhere(['<>','aplicativo','LPGraph'])->one();

        if ( $model != null )
        {
            if ( $id != (-10) ) // Já tem uma pesquisa feita, pelo mesmo usuário e mesmo momento
            {
                //
                $model_pesquisa = Pesquisas::find()->where(['id_pesquisa' => $id])->one();

                $model_pesquisa->id_ava = $model->id_figura;

                $model_pesquisa->palavras_chaves = $palavras_chaves;

                $model_pesquisa->metodo = $model_pesquisa->metodo . ', AVA';

                if ( $model_pesquisa->save()) return $model_pesquisa->id_pesquisa;
                else return (-1);
            }
            else // Gerar registro de pesquisa nova
            {
                $novo_registro = new Pesquisas();

                $novo_registro->id_ava = $model->id_figura;

                $novo_registro->metodo = 'AVA';

                $novo_registro->palavras_chaves = $palavras_chaves;

                if ( $novo_registro->save() ) return $novo_registro->id_pesquisa;
                else return (-1);
            }
        }
        else
        {
            return (-1);
        }
    }



    public function agenteExperts($id_titulo, $id_tipo, $id)   // Consulta AGENTE experts
    {    // Verifica se existe este título de problema e se existe respostas com esse título. Armazena consulta no banco.

        $o_titulo = TituloProblema::find()->where(['id' => $id_titulo])->one();
        $o_tipo = TipoProblema::find()->where(['id' => $id_tipo])->one();

        if ( ($o_titulo != null) && ($o_tipo != null) ) // Se existe algum registro com título informado
        {
            $resposta = RespostaEspecialistas::find()->where(['id_titulo_problema' => $o_titulo->id])
                                                     ->andWhere(['id_tipo_problema' => $o_tipo->id])
                                                     ->one();

            if ( $resposta != null )  // Verifica se existe ao menos um registro
            {
                $registro_pesquisa = Pesquisas::find()->where(['id_pesquisa' => $id])->one();

                if ( $registro_pesquisa == null )
                {
                    $nova_pesquisa = new Pesquisas();
                    $nova_pesquisa->id_resposta = $resposta->id;
                    $nova_pesquisa->id_usuario = Yii::$app->user->identity->id;   
                    $nova_pesquisa->metodo = 'Especialistas';                 
                    
                    if ( $nova_pesquisa->save() ) return $nova_pesquisa->id_pesquisa;// Se a pesquisa foi salva, retorna o id da pesquisa criada
                    else return (-1);
                }
                else
                {
                    $registro_pesquisa->metodo = $registro_pesquisa->metodo . ', Especialistas';
                    $registro_pesquisa->id_resposta = $resposta->id;
                    
                    if ( $registro_pesquisa->save() ) return $registro_pesquisa->id_pesquisa;
                    else return (-1);
                }

                    
                
            }
            else    // Não tem resposta de acordo com o título de problema selecionado
            {
                 return (-1);
            }
        }
        else return $this->actionDoom('Por favor, informar o título e tipo do problema.');
    }

/**********************    AGENTES     fim     *****************/


/**********************    VERIFICADORES     início     *****************/

    public function verificadorDadosRBC ($polo, $descricao_problema, $relator, $problema_detalhado, $palavras_chaves)
    {
        if ( ($polo != null) && ($descricao_problema != null) && ($relator != null) && 
            ($problema_detalhado != null) && ($palavras_chaves != null) )
        {
            // Todos os dados foram informados
            return (0);
        }
        else 
        {
            return 1;   // Faltou informar pelo menos um dado
        }
    }
/*
    public function verificadorDadosLMS ()
    {
        
    }   */

    public function verificadorDadosEXP ($titulo_problema, $tipo_problema)
    {
        if ( ($titulo_problema != null) && ($tipo_problema != null)) return (0);
        else return (1);  // Titulo do problema não foi informado
        
    }

/**********************    VERIFICADORES     fim     *****************/




/**********************    auxiliadores  - criadores de arrayhelpers    ****************/

	protected function arrayhelper_relator ()
	{
		return ArrayHelper::map(RelatorSearch::find()->all(), 'id_relator', 'perfil');;
	}

	protected function arrayhelper_polo ()
	{
		return ArrayHelper::map(PoloSearch::find()->all(), 'id_polo', 'nome');
	}

}




