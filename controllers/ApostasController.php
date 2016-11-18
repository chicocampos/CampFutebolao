<?php

namespace app\controllers;

use Yii;
use app\models\Apostas;
use app\models\ApostasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ApostasController implements the CRUD actions for Apostas model.
 */
class ApostasController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Apostas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ApostasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Apostas model.
     * @param integer $ID
     * @param integer $USUARIO_ID
     * @param integer $JOGO_SALA_ID
     * @return mixed
     */
    public function actionView($ID, $USUARIO_ID, $JOGO_SALA_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID, $USUARIO_ID, $JOGO_SALA_ID),
        ]);
    }

    /**
     * Creates a new Apostas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Apostas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'USUARIO_ID' => $model->USUARIO_ID, 'JOGO_SALA_ID' => $model->JOGO_SALA_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Apostas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ID
     * @param integer $USUARIO_ID
     * @param integer $JOGO_SALA_ID
     * @return mixed
     */
    public function actionUpdate($ID, $USUARIO_ID, $JOGO_SALA_ID)
    {
        $model = $this->findModel($ID, $USUARIO_ID, $JOGO_SALA_ID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'USUARIO_ID' => $model->USUARIO_ID, 'JOGO_SALA_ID' => $model->JOGO_SALA_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Apostas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ID
     * @param integer $USUARIO_ID
     * @param integer $JOGO_SALA_ID
     * @return mixed
     */
    public function actionDelete($ID, $USUARIO_ID, $JOGO_SALA_ID)
    {
        $this->findModel($ID, $USUARIO_ID, $JOGO_SALA_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Apostas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ID
     * @param integer $USUARIO_ID
     * @param integer $JOGO_SALA_ID
     * @return Apostas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID, $USUARIO_ID, $JOGO_SALA_ID)
    {
        if (($model = Apostas::findOne(['ID' => $ID, 'USUARIO_ID' => $USUARIO_ID, 'JOGO_SALA_ID' => $JOGO_SALA_ID])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Página não encontrada.');
        }
    }
}
