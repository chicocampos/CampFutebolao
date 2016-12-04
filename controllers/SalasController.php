<?php

namespace app\controllers;

use Yii;
use app\models\Salas;
use app\models\JogosSala;
use app\models\SalasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Participantes;

/**
 * SalasController implements the CRUD actions for Salas model.
 */
class SalasController extends Controller
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
     * Lists all Salas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SalasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $dataProvider->query->where('exists (select 1 from participantes p where p.SALA_ID = salas.ID and p.usuario_ID = ' . Yii::$app->user->identity->ID . ')' );

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Salas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            
            //'jogos' => Jogos::find()->
            
            'participa'=>Participantes::find()->where(["USUARIO_ID"=>Yii::$app->user->identity->ID])
        ->andWhere(['SALA_ID'=>$id])->one()
        ]);
    }

    /**
     * Creates a new Salas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Salas();
        $jogos = new JogosSala();
       // $jogossala = new JogosSala();

//        if (($model->load(Yii::$app->request->post())) && (($model->save())) && ($jogossala->load(Yii::$app->request->post())))
//        {
//            return $this->redirect(['view', 'id' => $model->ID]);
//        }
        
        if (($model->load(Yii::$app->request->post())) && ($jogos->load(Yii::$app->request->post())))
        {
            $model->save();
            
            $jogos->SALA_ID = $model->ID;
            $jogos->JOGO_ID = $jogos->ID;
        
            $jogos->save();
            
            return $this->redirect(['view', 'id' => $model->ID]);
        }
        else {
            return $this->render('create', [
                'model' => $model,
                'jogos' => $jogos,
                //'jogossala' => $jogossala,
            ]);
        }
    }

    public function actionJoin($id)
    {
        $participantes = Participantes::find()->where(['USUARIO_ID'=>Yii::$app->user->identity->ID])
        ->andWhere(['SALA_ID'=>$id])->one();
        if(!$participantes)
        {
            $participantes = new Participantes();
            $participantes->USUARIO_ID = Yii::$app->user->identity->ID;
            $participantes->SALA_ID = $id;
            $participantes->PONTUACAO = 0;
            $participantes->save();
        }
        
        $searchModel = new SalasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $dataProvider->query->where('exists (select 1 from participantes p where p.SALA_ID = salas.ID and p.usuario_ID = ' . Yii::$app->user->identity->ID . ')' );

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        
    }
    
    /**
     * Updates an existing Salas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (($model->load(Yii::$app->request->post())) && ($jogossala->load(Yii::$app->request->post())))
        {
            $model->save();
            $jogossala->save();
                
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
               // 'jogossala' => (empty($jogossala)) ? new JogosSala() : $jogossala
            ]);
        }
    }

    /**
     * Deletes an existing Salas model.
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
     * Finds the Salas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Salas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Salas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('A página solicitada não foi encontrada.');
        }
    }
}
