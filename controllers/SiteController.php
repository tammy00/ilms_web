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
                        'actions' => ['logout', 'index', 'view', 'doom', 'cbrsearch', 'vlesearch', 'expsearch', 'cbrview', 'vleview', 'expview', 'lpgraph', 'behaviour', 'desempenho'],
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

    /****
    Combina o uso de RBC, AVA e opinião dos especialistas 
    ****/

    public function actionCombinacao ()
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

                $resultado_id = $this->agenteRBC(0, "", "", "", $model->palavras_chaves, $tipodoproblema->tipo);    

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
	    	}
	    	/***** RBC END  ******/

	    	/***** AVA   ******/
	    	if ( $model->ava != null ) // AVA foi selecionado
	    	{
	    		// Busca na tabela imagem
	    		// Pegar o id do model com a palavra-chave informada (imagem_id)
	    		// Salvar, na tabela pesquisa, a palavra-chave somente -> salvar no resultado_id (tanto variável quanto na pesquisa com esse id)
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
		            	if ( $resultado_id != (-10) )  // Onde o rbc não foi seelcionado - não tem uma pesquisa combinada já criada
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

		            		$atualiza->id_resposta = $resposta->id;

			                if ( !$atualiza->save() ) 
			                	return $this->actionDoom('Solução existente. Porém, a pesquisa não salva com sucesso.');	
		            	}

		                
		            }
	            }
	            else return $this->actionDoom('Por favor, informar o título e tipo do problema.'); 
	    	}
	    	/***** ESPECIALISTAS END  ******/    	
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

    public function actionViewcombinacao ($id)
    {
    	$model_descricao = Pesquisas::find()->where(['id_pesquisa' => $id])->one();

    	/***** RBC   ******/

    	$model_solucao = Solucao::find()->where(['id_solucao' => $model_descricao->id_solucao])->one();

    	$model_descricao->similaridade = round(($model_descricao->similaridade * 100 ));

        $polo = Polo::find()->where(['id_polo' => $model_descricao->id_polo])->one();
	    $model_descricao->id_polo = $polo->nome;

    	/***** RBC END  ******/

    	/***** AVA   ******/

    	// 

    	/***** AVA END  ******/

    	/***** ESPECIALISTAS   ******/
    	$model_esp = RespostaEspecialistas::find()->where(['id' => $model_descricao->id_resposta])->one();

        Yii::$app->formatter->locale = 'pt-BR';
        $model_esp->data_ocorrencia = Yii::$app->formatter->asDate($model_esp->data_ocorrencia);
        $model_esp->data_insercao = Yii::$app->formatter->asDate($model_esp->data_insercao);

        $tipo = TipoProblema::find()->where(['id' => $model_esp->id_tipo_problema])->one();
        $titulo = TituloProblema::find()->where(['id' => $model_esp->id_titulo_problema])->one();
        $model_esp->id_tipo_problema = $tipo->tipo;
        $model_esp->id_titulo_problema = $titulo->titulo;

        $r = Relator::find()->where(['id_relator' => $model_esp->relator])->one();
        if ( $model_esp->funcao_especialista != $model_esp->relator )
        {
            $novo_relator = Relator::find()->where(['id_relator' => $model_esp->funcao_especialista])->one();
            $model_esp->funcao_especialista = $novo_relator->perfil;
            $model_esp->relator = $r->perfil;
        }
        else 
        {
            $model_esp->relator = $r->perfil;
            $model_esp->funcao_especialista = $model_esp->relator;
        }
    	/***** ESPECIALISTAS END  ******/

        return $this->render('view', [
            'model_descricao' => $model_descricao,
            'sol' => $sol,
            'model_esp' => $model_esp,
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($id)
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

    public function actionVlesearch ( )
    {
  
        $searchModel = new CursoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('vlesearch', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
        
    }

    public function actionLpgraph($id)
    {
        $curso_model = Curso::find()->where(['id_curso' => $id])->one();

        $model = FigurasAva::find()->where(['curso' => $curso_model->nome])->andWhere(['aplicativo' => 'LPGraph'])->one();

        return $this->render('lpgraph', [
            'model' => $model,
        ]);
    }

    public function actionBehaviour($id)
    {
    	$curso = Curso::find()->where(['id_curso' => $id])->one();

        $model = FigurasAva::find()->where(['curso' => $curso->nome])->andWhere(['aplicativo' => 'LMSMonitor'])->one();

        return $this->render('behaviour', [
            'model' => $model,
        ]);
    }

    public function actionDesempenho($id)
    {
        $curso = Curso::find()->where(['id_curso' => $id])->one();

        $model = FigurasAva::find()->where(['curso' => $curso->nome])->andWhere(['aplicativo' => 'WebMonitor'])->one();

        if ( $model != null ){
	        return $this->render('desempenho', [
	            'model' => $model,
	        ]);        	
        }
        else return $this->actionIndex();

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



    public function actionCbrsearch()  // Descricao vai ter todos os dados, independente de ser somente para o rbc
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

            if ( $verificacao_rbc == 0 )   // Checando se todos os dados necessários foram informados
            {
            	$perfil = Relator::find()->where(['id_relator' => $model->relator])->one();  
            	/*
		       $postArray = array(
		            "poloId" => $model->id_polo,
		            "relatorId" => $perfil->perfil,
		            "descricaoProblema" => $model->descricao_problema,
		            "problema" => $model->problema_detalhado,
		            "naturezaProblema" => $model->natureza_problema,
		            "palavrasChavesProblema" => $model->palavras_chaves,
		        );

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
		        }   */
            	
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
            else return $this->actionDoom('Faltou informar pelo menos um dado.');

            
        }   //else if request post
        else    // Primeiro acesso à tela de busca do agente RBC
        {
        	$arrayRelatores = ArrayHelper::map(RelatorSearch::find()->all(), 'id_relator', 'perfil');
        	$arrayPolos = ArrayHelper::map(PoloSearch::find()->all(), 'id_polo', 'nome');


            return $this->render('cbrsearch', [
                'model' => $model,
                'arrayRelatores' => $arrayRelatores,
                'arrayPolos' => $arrayPolos,
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




    public function actionDoom($texto)
    {
        return $this->render('doom', ['message' => $texto]);
    }




    public function agenteRBC($polo, $desc, $detalhado, $relator, $keywords, $natureza)   // Consulta AGENTE CBR
    {
        $perfil = Relator::find()->where(['id_relator' => $relator])->one();  
        // find realizado para saber o nome do perfil, através do id_relator recebido 

        // Enviar json pelo CURL
        //Cria a array com os dados recebido, sendo q o ID é gerado pelo WS
                    
        $postArray = array(
            "poloId" => $polo,
            "relatorId" => $perfil->perfil,
            "descricaoProblema" => $desc,
            "problema" => $detalhado,
            "naturezaProblema" => $natureza,
            "palavrasChavesProblema" => $keywords,
        );

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
        CURLOPT_TIMEOUT => 120000, // 30
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
                $nova_pesquisa->relator = $perfil->perfil;  // ID do relator não é salvo nessa tabela
                $nova_pesquisa->natureza_problema = $natureza;
                $nova_pesquisa->descricao_problema = $desc;
                $nova_pesquisa->problema_detalhado = $detalhado;
                $nova_pesquisa->palavras_chaves = $keywords;
                $nova_pesquisa->similaridade = $similaridadeCalculada;
                //$nova_pesquisa->id_titulo_problema = 0;

                if ($nova_pesquisa->save() )  // Se salvar a pesquisa
                {
                    return $nova_pesquisa->id_pesquisa;
                }
                else return 0;// Se a pesquisa não for salva
                
            }
            
        }  // end else para !erro
    }   // agenteRBC end



    public function agenteLMS(/**** DEFINIR PARÂMETROS   ****/)   // Consulta AGENTE LMS
    {
        return $this->render('doom', ['message' => 'Sem parâmetros ainda.']);
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
                $nova_pesquisa = new Pesquisas();
                $nova_pesquisa->id_resposta = $resposta->id;
                $nova_pesquisa->id_usuario = Yii::$app->user->identity->id;

                if ( $nova_pesquisa->save() ) return $nova_pesquisa->id_pesquisa;
                    // Se a pesquisa foi salva, retorna o id da pesquisa criada
                
            }
            else    // Não tem resposta de acordo com o título de problema selecionado
            {
                 return (-1);
            }
        }
        else return $this->actionDoom('Por favor, informar o título e tipo do problema.');
    }



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

}



