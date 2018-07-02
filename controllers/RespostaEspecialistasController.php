<?php

namespace app\controllers;

use Yii;
use app\models\TipoProblema;
use app\models\TituloProblema;
use app\models\RespostaEspecialistas;
use app\models\RespostaEspecialistasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * RespostaEspecialistasController implements the CRUD actions for RespostaEspecialistas model.
 */
class RespostaEspecialistasController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            if (!Yii::$app->user->isGuest)
                            {
                                if ( Yii::$app->user->identity->perfil === 'Especialista' ) 
                                {
                                    return Yii::$app->user->identity->perfil == 'Especialista'; 
                                }
                                elseif ( Yii::$app->user->identity->perfil === 'Mediador/a' ) 
                                {
                                    return Yii::$app->user->identity->perfil == 'Mediador/a'; 
                                }
                            }
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all RespostaEspecialistas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RespostaEspecialistasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RespostaEspecialistas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        Yii::$app->formatter->locale = 'pt-BR';
        $model->data_ocorrencia = Yii::$app->formatter->asDate($model->data_ocorrencia);
        $model->data_insercao = Yii::$app->formatter->asDate($model->data_insercao);
        //Yii::$app->formatter->asDate('now', 'yyyy-MM-dd'); // 2014-10-06
        // Yii::$app->formatter->asDate('now', 'php:Y-m-d'); // 2014-10-06

        $tipo = TipoProblema::find()->where(['id' => $model->id_tipo_problema])->one();
        $titulo = TituloProblema::find()->where(['id' => $model->id_titulo_problema])->one();
        $model->id_tipo_problema = $tipo->tipo;
        $model->id_titulo_problema = $titulo->titulo;

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new RespostaEspecialistas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RespostaEspecialistas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RespostaEspecialistas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RespostaEspecialistas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RespostaEspecialistas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RespostaEspecialistas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RespostaEspecialistas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('A página requisitada não existe.');
        }
    }
}
