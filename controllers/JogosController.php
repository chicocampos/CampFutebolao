<?php

namespace app\controllers;

use Yii;
use app\models\Jogos;
use app\models\JogosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * JogosController implements the CRUD actions for Jogos model.
 */
class JogosController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
            'class' => AccessControl::className(),
            'only' => ['view', 'update', 'delete', 'index', 'create'],
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['@']
                ],
            ]
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
     * Lists all Jogos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JogosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Jogos model.
     * @param integer $ID
     * @param integer $TIME_CASA_ID
     * @param integer $TIME_VISITANTE_ID
     * @return mixed
     */
    public function actionView($ID, $TIME_CASA_ID, $TIME_VISITANTE_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID, $TIME_CASA_ID, $TIME_VISITANTE_ID),
        ]);
    }

    /**
     * Creates a new Jogos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Jogos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'TIME_CASA_ID' => $model->TIME_CASA_ID, 'TIME_VISITANTE_ID' => $model->TIME_VISITANTE_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Jogos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ID
     * @param integer $TIME_CASA_ID
     * @param integer $TIME_VISITANTE_ID
     * @return mixed
     */
    public function actionUpdate($ID, $TIME_CASA_ID, $TIME_VISITANTE_ID)
    {
        $model = $this->findModel($ID, $TIME_CASA_ID, $TIME_VISITANTE_ID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'TIME_CASA_ID' => $model->TIME_CASA_ID, 'TIME_VISITANTE_ID' => $model->TIME_VISITANTE_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Jogos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ID
     * @param integer $TIME_CASA_ID
     * @param integer $TIME_VISITANTE_ID
     * @return mixed
     */
    public function actionDelete($ID, $TIME_CASA_ID, $TIME_VISITANTE_ID)
    {
        $this->findModel($ID, $TIME_CASA_ID, $TIME_VISITANTE_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Jogos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ID
     * @param integer $TIME_CASA_ID
     * @param integer $TIME_VISITANTE_ID
     * @return Jogos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID, $TIME_CASA_ID, $TIME_VISITANTE_ID)
    {
        if (($model = Jogos::findOne(['ID' => $ID, 'TIME_CASA_ID' => $TIME_CASA_ID, 'TIME_VISITANTE_ID' => $TIME_VISITANTE_ID])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Página não encontrada.');
        }
    }
}
