<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Descricao;
use app\models\Pesquisas;
use app\models\Relator;
use app\models\Solucao;
use app\models\PoloSearch;
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
        $model = Pesquisas::find()->where(['id_pesquisa' => $id])->one();
        $sol = Solucao::find()->where(['id_solucao' => $model->id_solucao])->one();

        $polo = Polo::find()->where(['id_polo' => $model->id_polo])->one();
        $model->id_polo = $polo->nome;

        return $this->render('view', [
            'model' => $model,
            'sol' => $sol,
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
    { // add os dados adicionais no model Descricao
        $modelDescricao = new Descricao();

        if ( $modelDescricao->load(Yii::$app->request->post()) ) // Se houve request-post
        {
            //return $this->render('doom', ['message' => $modelDescricao->natureza_problema]);
        
            if ($modelDescricao->natureza_problema === 'Acadêmica')  // Verificação: se é para o rbc
            {
                // Enviar json pelo CURL
                //Cria a array com os dados recebido, sendo q o ID é gerado pelo WS
                
                $perfil = Relator::find()->where(['id_relator' => $modelDescricao->relator])->one();
                
                $postArray = array(
                    "poloId" => $modelDescricao->id_polo,
                    "relatorId" => $perfil->perfil,
                    "descricaoProblema" => $modelDescricao->descricao_problema,
                    "problema" => $modelDescricao->problema_detalhado,
                    "naturezaProblema" => $modelDescricao->natureza_problema,
                    "palavrasChavesProblema" => $modelDescricao->palavras_chaves,
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
                    return $this->render('doom', ['message' => 'Problema ao conectar com o servidor.']);

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
                    $nova_pesquisa->id_polo = $modelDescricao->id_polo;
                    $nova_pesquisa->id_usuario = 1;  // Só para efeito de teste MUDAR ESSE TRECHO QUANDO ADD CLASSE DE USUÁRIOS
                    $nova_pesquisa->status = 0;  // 0 = criado, não salvo como novo caso
                    $nova_pesquisa->relator = $perfil->perfil;  // ID do relator não é salvo nessa tabela
                    $nova_pesquisa->natureza_problema = $modelDescricao->natureza_problema;
                    $nova_pesquisa->descricao_problema = $modelDescricao->descricao_problema;
                    $nova_pesquisa->problema_detalhado = $modelDescricao->problema_detalhado;
                    $nova_pesquisa->palavras_chaves = $modelDescricao->palavras_chaves;
                    $nova_pesquisa->similaridade = $similaridadeCalculada;

                    if ($nova_pesquisa->save() )  // Se salvar a pesquisa
                    {
                        // Mostra descricao e solução
                        return $this->actionView ($nova_pesquisa->id_pesquisa);
                    }
                    else return $this->render('doom', ['message' => 'A busca realizada não pode ser registrada. Retorne à página anterior e tente novamente.']);  // Se não salvar a pesquisa
                }   
            }  
            /*
            if ( ) // Para moodle
            {
                //
            }
            if ( ) // Para experts
            {
                //
            }  */

            else return $this->render('doom', ['message' => 'Você deve especificar a natureza do problema.']);
            //else return $this->render('doom', ['message' => $modelDescricao->natureza_problema]);
        }
        else 
        {
        	$arrayRelatores = ArrayHelper::map(RelatorSearch::find()->all(), 'id_relator', 'perfil');
        	$arrayPolos = ArrayHelper::map(PoloSearch::find()->all(), 'id_polo', 'nome');

            return $this->render('search', [
                'model' => $modelDescricao,
                'arrayRelatores' => $arrayRelatores,
                'arrayPolos' => $arrayPolos,
            ]);        
        }
    }

    public function actionDoom($texto)
    {
        return $this->render('doom', ['message' => $texto]);
    }
}
