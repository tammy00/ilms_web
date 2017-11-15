<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Descricao;
use app\models\BuscaGeral;
use app\models\RespostaEspecialistas;
use app\models\RespostaEspecialistasSearch;
use app\models\TipoProblema;
use app\models\TituloProblema;
use app\models\Pesquisas;
use app\models\Relator;
use app\models\Solucao;
use app\models\PoloSearch;
use app\models\TituloProblemaSearch;
use app\models\Polo;
use app\models\RelatorSearch;
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
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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

        if ( $pesquisa->id_solucao != null ) $sol = Solucao::find()->where(['id_solucao' => $pesquisa->id_solucao])->one();
        else $sol = null;

        //$polo = Polo::find()->where(['id_polo' => $pesquisa->id_polo])->one();
        //$pesquisa->id_polo = $polo->nome;

        //$pesquisa->data_ocorrencia = Yii::$app->formatter->asDate($pesquisa->data_ocorrencia);
        //$pesquisa->data_insercao = Yii::$app->formatter->asDate($pesquisa->data_insercao);

        if ( $pesquisa->similaridade != null ) $pesquisa->similaridade = round(($pesquisa->similaridade * 100 ));

        if ( $pesquisa->id_titulo_problema > 0 )
        {
            $exp_resposta = RespostaEspecialistasSearch::searchForResponses($pesquisa->id_titulo_problema);

        }  
        else $exp_resposta = null;   

        return $this->render('view', [
            'pesquisa' => $pesquisa,
            'sol' => $sol,
            'exp_resposta' => $exp_resposta,
        ]);
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

    public function actionSearch()  // Descricao vai ter todos os dados, independente de ser somente para o rbc
    { 

        //tipo_problema == natureza_problema
        $model = new BuscaGeral();

        if ( $model->load(Yii::$app->request->post()) ) // Se algo for submetido
        {
            /*
            $agente_1 = Yii::$app->request->post('agente_1');    // Pegando os valores para comparações
            $agente_2 = Yii::$app->request->post('agente_2'); 
            $agente_3 = Yii::$app->request->post('agente_3');   */

            if ( ($model->cbr != null) || ($model->lms != null) || ($model->experts != null) )    
            {    // Se houve pelo menos um agente selecionado
                $verificacao_rbc = 0;
                $verificacao_lms = 0;
                $verificacao_exp = 0;
                $resultado_final = 0;
                $resultado_id = 0;

                if ($model->cbr != 0 )  // Verificação: se é para o rbc
                { 
                    $verificacao_rbc = $this->verificadorDadosRBC ($model->id_polo, 
                        $model->descricao_problema, 
                        $model->relator, 
                        $model->problema_detalhado, 
                        $model->palavras_chaves);

                    if ( $verificacao_rbc == 0 )   // Checando se todos os dados necessários foram informados
                    {
                        $resultado_id = $this->agenteRBC($model->id_polo, 
                            $model->descricao_problema, 
                            $model->problema_detalhado, 
                            $model->relator, 
                            $model->palavras_chaves, 
                            $model->natureza_problema);     // Consulta que retorna o id da pesquisa já salva
                        // Única função que não recebe id de pesquisa no parâmetro


                        // Voltando para o resultado da consulta rbc

                        if ($resultado_id == 0)   // Caso a consulta não tenha sido salva
                        {
                            return $this->render('doom', ['message' => 'A busca realizada não pode ser registrada. Retorne à página anterior e tente novamente.']);  // Se não salvar a pesquisa
                        }  

                    }  // Se houve pelo menos algum dado não informado
                    else
                    {
                        return $this->render('doom', ['message' => 'Todos os dados devem ser informados para a pesquisa ser realizada com sucesso. Tente novamente.']);
                    }

                }   // end if busca rbc

                /*
                if ( $model->lms != 0 ) 
                {
                    if ( $this->verificadorDadosLMS($) == 0 )  // Se os dados necessários foram informados
                    {
                        $resultado_id = $this->agente (#, $resultado_id);   // COMPLETAR PARÂMETROS
                    }
                    else return $this->render('doom', ['message' => 'Por favor, informar .']);
                }   // end if busca lms
*/
                if ( $model->experts != 0 ) // erro aqui
                {
                    //return $this->render('doom', ['message' => 'agente especialista foi selecionado']); 
                    if ( $this->verificadorDadosEXP($model->titulo_problema) == 0 )
                    {
                        $resultado_id = $this->agenteExperts ($model->titulo_problema, $resultado_id);
                        // A função acima retorna o id do registro da tabela pesquisa
                        // Dependendo do valor de $resultado_id, o registro é criado ou não
                    }
                    else return $this->render('doom', ['message' => 'Por favor, informar o título do problema.']); 
                }   // end if busca exp

                return $this->actionView ($resultado_id);  //

            }

            else return $this->render('doom', ['message' => 'Você deve selecionar pelo menos uma forma de busca.']);
        }
        else    // Primeiro acesso à tela de busca
        {
        	$arrayRelatores = ArrayHelper::map(RelatorSearch::find()->all(), 'id_relator', 'perfil');
        	$arrayPolos = ArrayHelper::map(PoloSearch::find()->all(), 'id_polo', 'nome');
            $arrayTitulosProblemas = ArrayHelper::map(TituloProblemaSearch::find()->all(), 'id', 'titulo');
            $model->cbr = 0;
            $model->experts = 0;
            $model->lms =0;

            return $this->render('search', [
                'model' => $model,
                'arrayRelatores' => $arrayRelatores,
                'arrayPolos' => $arrayPolos,
                'arrayTitulosProblemas' => $arrayTitulosProblemas,
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
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST", //metodo
        CURLOPT_POSTFIELDS => $json, //string com dados à serem postados
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($json)),
        ));
        $result = curl_exec($curl); //recebe o resultado em json
        $err = curl_error($curl); //recebe o erro da classe ou WS
        curl_close($curl); //Encerra a biblioteca

        if ($err)
        {
            return $this->render('doom', ['message' => 'Problema ao conectar com o servidor. Tente novamente.']);

        } // ELSE pegar o id do caso, criar variável de similaridade, return view do Solução
        else
        {
                        
            $data = json_decode($result,true);

            $idSolucao = $data['solucaoId'];
            $similaridadeCalculada = $data['similaridade'];

            if ($idSolucao == null) return $this->render('doom', ['message' => 'Registro da solução não encontrada.']);

            if ( $similaridadeCalculada == 0) return $this->render('doom', ['message' => 'Não há caso similar ao apresentado.']);

            //Encontra o registro (no banco) do id recebido pelo componente RBC
            $modelSolucao = Solucao::find()->where(['id_solucao' => $idSolucao])->one();  

                        

            // Salva a pesquisa
            $nova_pesquisa = new Pesquisas();
            $nova_pesquisa->id_solucao = $modelSolucao->id_solucao;
            $nova_pesquisa->id_polo = $polo;
            $nova_pesquisa->id_usuario = 1;  // Só para efeito de teste MUDAR ESSE TRECHO QUANDO ADD CLASSE DE USUÁRIOS
            $nova_pesquisa->status = 0;  // 0 = criado, não salvo como novo caso
            $nova_pesquisa->relator = $perfil->perfil;  // ID do relator não é salvo nessa tabela
            $nova_pesquisa->natureza_problema = $natureza;
            $nova_pesquisa->descricao_problema = $desc;
            $nova_pesquisa->problema_detalhado = $detalhado;
            $nova_pesquisa->palavras_chaves = $keywords;
            $nova_pesquisa->similaridade = $similaridadeCalculada;

            if ($nova_pesquisa->save() )  // Se salvar a pesquisa
            {
                return $nova_pesquisa->id_pesquisa;
            }
            else return 0;// Se a pesquisa não for salva
        }  // end else para !erro
    }   // agenteRBC end



    public function agenteLMS(/**** DEFINIR PARÂMETROS   ****/)   // Consulta AGENTE LMS
    {
        return $this->render('doom', ['message' => 'Sem parâmetros ainda.']);
    }



    public function agenteExperts($titulo_problema, $id)   // Consulta AGENTE experts
    {    // Verifica se existe este título de problema e se existe respostas com esse título. Armazena consulta no banco.

        $registro = TituloProblema::find()->where(['id' => $titulo_problema])->one();

        if ( $registro != null ) // Se existe algum registro com título informado
        {
            $resposta = RespostaEspecialistas::find()->where(['id_titulo_problema' => $registro->id])->all();

            if ( $resposta != null )  // Se existe alguma resposta (problema) com título informado
            {
                if ( $id != 0 )
                { // 
                    $atualiza_registro = Pesquisas::find()->where(['id_pesquisa' => $id])->one();
                    $atualiza_registro->id_titulo_problema = $registro->id;

                    if ( $atualiza_registro->save() ) return $atualiza_registro->id_pesquisa;

                    else return $this->render('doom', ['message' => 'Ocorreu um erro ao fazer a busca. Por favor, repita a busca.']);

                }
                else
                { // Não existe um registro da pesquisa total do usuário - criar um registro
                    $nova_pesquisa = new Pesquisas();
                    $nova_pesquisa->id_titulo_problema = $registro->id;

                    if ( $nova_pesquisa->save() ) return $nova_pesquisa->id_pesquisa;
                    // Se a pesquisa foi salva, retorna o id da pesquisa criada
                }
            }
            else    // Não tem resposta de acordo com o título de problema selecionado
            {
                $atualiza_registro = Pesquisas::find()->where(['id_pesquisa' => $id])->one();
                $atualiza_registro->id_titulo_problema = 0;  // Representa a falta de resposta de acordo com o título
                if ( $atualiza_registro->save() ) return $atualiza_registro->id_pesquisa;
                else return $this->render('doom', ['message' => 'Não há resposta de acordo com o título de problema selecionado.']);
            }
        }
        else return $this->render('doom', ['message' => 'Ocorreu um erro ao fazer a busca. Por favor, repita a busca.']);
    }



    public function verificadorDadosRBC ($polo, $descricao_problema, $relator, $problema_detalhado, $palavras_chaves)
    {
        if ( ($polo != null) && 
            ($descricao_problema != null) && 
            ($relator != null) && 
            ($problema_detalhado != null)
            && ($palavras_chaves != null) )
        {
            return 0;   // Todos os dados foram informados
        }
        else 1;   // Faltou informar pelo menos um dado
    }
/*
    public function verificadorDadosLMS ()
    {
        
    }   */

    public function verificadorDadosEXP ($titulo_problema)
    {
        if ($titulo_problema != null) return 0;
        else return 1;  // Titulo do problema não foi informado
        
    }

}
