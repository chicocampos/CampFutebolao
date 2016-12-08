<?php

namespace app\controllers;

use Yii;
use app\models\Times;
use app\models\Jogos;
use app\models\TimesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;



/**
 * TimesController implements the CRUD actions for Times model.
 */
class TimesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            /*'access' => [
            'class' => AccessControl::className(),
            'only' => ['view', 'update', 'delete', 'index', 'create'],
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['superadmin']
                ],
            ]
        ],*/
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Times models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->identity && Yii::$app->user->identity->SUPERADMIN == 1)
        {
            $searchModel = new TimesSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        else
        {
            throw new ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }

    /**
     * Displays a single Times model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(Yii::$app->user->identity && Yii::$app->user->identity->SUPERADMIN == 1)
        {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
        else
        {
            throw new ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }

    /**
     * Creates a new Times model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->identity && Yii::$app->user->identity->SUPERADMIN == 1)
        {
            $model = new Times();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->ID]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
        else
        {
            throw new ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }

    /**
     * Updates an existing Times model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->identity && Yii::$app->user->identity->SUPERADMIN == 1)
        {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->ID]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
        else
        {
            throw new ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
        }
    }

    /**
     * Deletes an existing Times model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $time_visitante = Jogos::findOne(['TIME_VISITANTE_ID'=>$id]);
        $time_casa = Jogos::findOne(['TIME_CASA_ID'=>$id]);
        
        if(!$time_visitante && !$time_casa)
        {
            if(Yii::$app->user->identity && Yii::$app->user->identity->SUPERADMIN == 1)
            {
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
            }
            else
            {
                throw new ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
            }
        }
        else
        {
            throw new ForbiddenHttpException('Este time não pode ser deletado, pois está cadastrado em alguma jogo.');
        }
    }

    /**
     * Finds the Times model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Times the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Times::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
