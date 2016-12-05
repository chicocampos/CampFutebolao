<?php

namespace app\controllers;

use Yii;
use app\models\Salas;
//use app\models\Jogos;
use app\models\JogosSala;
use app\models\JogosSalaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JogosSalaController implements the CRUD actions for JogosSala model.
 */
class JogosSalaController extends Controller
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
     * Lists all JogosSala models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JogosSalaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JogosSala model.
     * @param integer $ID
     * @param integer $SALA_ID
     * @param integer $JOGO_ID
     * @return mixed
     */
    public function actionView($ID, $SALA_ID, $JOGO_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID, $SALA_ID, $JOGO_ID),
        ]);
    }

    /**
     * Creates a new JogosSala model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new JogosSala();
        $salas = new Salas();
        //$jogos = new Jogos();

        if (($model->load(Yii::$app->request->post())) && ($salas->load(Yii::$app->request->post())))
        {
            if(empty($salas->ID))
            {
                //$salas->ID = 3;
                $salas->save();
            }
            else
            {
                $salas->save();
            }
            
            if(empty($model->SALA_ID))
            {
                $model->SALA_ID = $salas->ID; //3;
                $model->save();
            }
            else{
                $model->save();
            }
            
            //$salas->ID = $model->SALA_ID;
            
            
            
            //$salas->NOME
            //$salas->VALOR_ENTRADA
            //$salas->OBSERVACAO
            //$salas->ACERTO_RESULTADO
            //$salas->ACERTO_TIME_CASA
            //$salas->ACERTO_TIME_VISITANTE
            //$salas->ACERTO_DIFERENCA
            //$salas->save();
            return $this->redirect(['view', 'ID' => $model->ID, 'SALA_ID' => $model->SALA_ID, 'JOGO_ID' => $model->JOGO_ID, 'NOME' => $salas->NOME, 'VALOR_ENTRADA' => $salas->VALOR_ENTRADA, 'OBSERVACAO' => $salas->OBSERVACAO, 'ACERTO_RESULTADO' => $salas->ACERTO_RESULTADO, 'ACERTO_TIME_CASA' => $salas->ACERTO_TIME_CASA, 'ACERTO_TIME_VISITANTE' => $salas->ACERTO_TIME_VISITANTE, 'ACERTO_DIFERENCA' => $salas->ACERTO_DIFERENCA]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'salas' => $salas,
                //'jogos' => $jogos,
            ]);
        }
    }

    /**
     * Updates an existing JogosSala model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ID
     * @param integer $SALA_ID
     * @param integer $JOGO_ID
     * @return mixed
     */
    public function actionUpdate($ID, $SALA_ID, $JOGO_ID)
    {
        $model = $this->findModel($ID, $SALA_ID, $JOGO_ID);
        $salas = $this->findModel($ID, $SALA_ID, $JOGO_ID);

        if (($model->load(Yii::$app->request->post())) && ($salas->load(Yii::$app->request->post())))
        {
            $model->save();
            
            $salas->ID = $model->SALA_ID;
            //$salas->NOME;
            //$salas->VALOR_ENTRADA;
            //$salas->OBSERVACAO;
            //$salas->ACERTO_RESULTADO;
            //$salas->ACERTO_TIME_CASA;
            //$salas->ACERTO_TIME_VISITANTE;
            //$salas->ACERTO_DIFERENCA;
            $salas->save();
            return $this->redirect(['view', 'ID' => $model->ID, 'SALA_ID' => $model->SALA_ID, 'JOGO_ID' => $model->JOGO_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'salas' => $salas,
            ]);
        }
    }

    /**
     * Deletes an existing JogosSala model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ID
     * @param integer $SALA_ID
     * @param integer $JOGO_ID
     * @return mixed
     */
    public function actionDelete($ID, $SALA_ID, $JOGO_ID)
    {
        $this->findModel($ID, $SALA_ID, $JOGO_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the JogosSala model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ID
     * @param integer $SALA_ID
     * @param integer $JOGO_ID
     * @return JogosSala the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID, $SALA_ID, $JOGO_ID)
    {
        if (($model = JogosSala::findOne(['ID' => $ID, 'SALA_ID' => $SALA_ID, 'JOGO_ID' => $JOGO_ID])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Página não encontrada.');
        }
    }
}
