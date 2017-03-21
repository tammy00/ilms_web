<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Descricao;
use app\models\Solucao;

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
            if ( )  // Verificação: se é para o rbc
            {
                // Enviar json pelo CURL
                //Cria a array com os dados recebido, sendo q o ID é gerado pelo WS
                /*
                $postArray = array(
                    "tema" => $modelDescricao->,
                    "topico" => $modelDescricao->,
                    "descricaoProblema" => $modelDescricao->descricao,
                    "naturezaProblema" => $modelDescricao->natureza,
                    "estiloDeAprendizagem" => $modelDescricao->,
                );

                // Converte os dados para o formato jSon
                $json = json_encode( $postArray );

                // receber resposta do servidor
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_PORT => "8080", //porta do WS
                    CURLOPT_URL => "http://localhost:8080/ServerRBC/ServerRBC/casos/caso", //Caminho do WS que vai receber o POST
                    CURLOPT_RETURNTRANSFER => true, //Recebe resposta
                    CURLOPT_ENCODING => "JSON", //Decodificação
                    CURLOPT_MAXREDIRS => 5,
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
                    return $this->render('searchsolution', [
                        'model' => $model,
                        'erro' => $err,
                    ]);  
                    //Ajeitar esse código acima - criar uma página só para essa mensagem

                } // ELSE pegar o id do caso, criar variável de similaridade, return view do Solução
                else
                {
                    
                    $data = json_decode($result,true);

                    $idSolucao = $data['solucaoId'];
                    $similaridadeCalculada = $data['similaridade'];

                    if ($idSolucao == null)
                    if ( $similaridadeCalculada == 0.0)

                    //Encontra o registro (no banco) do id recebido pelo componente RBC
                    $modelSolucao = Soluca::find()->where(['id' => $idSolucao])->one();  
                    // Mostra descricao e solução
                    return $this->render('view', ['descricao' => $modelDescricao, 'solucao' => $modelSolucao]);
                }
            }

*/
        }
        else 
        {
            return $this->render('search', [
                'model' => $modelDescricao,
            ]);        
        }

    }
}
