<?php

namespace app\controllers;

use Yii;
use app\models\Jogos;
use app\models\JogosSala;
use app\models\Salas;
use app\models\Participantes;
use app\models\Apostas;
use app\models\JogosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;

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
            /*'access' => [
            'class' => AccessControl::className(),
            'only' => ['view'],
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['?', '@']
                ],
            ],
            'only' => ['create', 'update', 'delete'],
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
        if(Yii::$app->user->identity && Yii::$app->user->identity->SUPERADMIN == 1)
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
        else
        {
            throw new ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
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
        if(Yii::$app->user->identity && Yii::$app->user->identity->SUPERADMIN == 1)
        {
            $model = $this->findModel($ID, $TIME_CASA_ID, $TIME_VISITANTE_ID);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
//                die('a' . $model->ID);
                $this->actionPlacar($model);
                return $this->redirect(['view', 'ID' => $model->ID, 'TIME_CASA_ID' => $model->TIME_CASA_ID, 'TIME_VISITANTE_ID' => $model->TIME_VISITANTE_ID]);
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
     * Deletes an existing Jogos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ID
     * @param integer $TIME_CASA_ID
     * @param integer $TIME_VISITANTE_ID
     * @return mixed
     */
    public function actionDelete($ID, $TIME_CASA_ID, $TIME_VISITANTE_ID)
    {
        $sala = JogosSala::findOne(['JOGO_ID'=>$ID]);
        
        if(!$sala)
        {
            if(Yii::$app->user->identity && Yii::$app->user->identity->SUPERADMIN == 1)
            {
                $this->findModel($ID, $TIME_CASA_ID, $TIME_VISITANTE_ID)->delete();

                return $this->redirect(['index']);
            }
            else
            {
                throw new ForbiddenHttpException('Você não está autorizado a realizar essa ação.');
            }
        }
        else
        {
            throw new ForbiddenHttpException('Este jogo não pode ser deletado, pois está cadastrado em alguma sala.');
        }
        
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
    
    public function actionPlacar($jogo){
//        if($jogo->REGISTRADO) return;
//        die('as' . $jogo->ID);
        $jogossalas = JogosSala::find()->where(["JOGO_ID"=>$jogo->ID])->all();
        foreach($jogossalas as $jogosala){
            $sala = Salas::find()->where(["ID"=>$jogosala->SALA_ID])->one();
            $participantes = Participantes::find()->where(["SALA_ID"=>$sala->ID])->all();
            
            foreach($participantes as $participante){
                $aposta = Apostas::find()->where(["JOGO_SALA_ID"=>$jogosala->ID])->andWhere(["USUARIO_ID"=>$participante->USUARIO_ID])->one();
                
                if(!$aposta) continue;
                
                //Acerto de Diferença
                if(($aposta->RESULTADO_CASA - $aposta->RESULTADO_VISITANTE) == ($jogo->GOLS_CASA - $jogo->GOLS_VISITANTE)){
                    $participante->PONTUACAO += $sala->ACERTO_DIFERENCA;
                }
                
                //Acerto Time Casa
                if($aposta->RESULTADO_CASA == $jogo->GOLS_CASA){
                    $participante->PONTUACAO += $sala->ACERTO_TIME_CASA;
                }
                
                if($aposta->RESULTADO_VISITANTE == $jogo->GOLS_VISITANTE){
                    $participante->PONTUACAO += $sala->ACERTO_TIME_VISITANTE;
                }
                
                //Acerto de Quem ganhou
                if( (($jogo->GOLS_CASA > $jogo->GOLS_VISITANTE) && ($aposta->RESULTADO_CASA > $aposta->RESULTADO_VISITANTE))
                  ||(($jogo->GOLS_CASA < $jogo->GOLS_VISITANTE) && ($aposta->RESULTADO_CASA < $aposta->RESULTADO_VISITANTE))
                  ||(($jogo->GOLS_CASA == $jogo->GOLS_VISITANTE) && ($aposta->RESULTADO_CASA == $aposta->RESULTADO_VISITANTE))
                  ){
                    $participante->PONTUACAO += $sala->ACERTO_RESULTADO;
                }
                $participante->save();
            }
        }
        $jogo->REGISTRADO = true;
        $jogo->save();
    }
}
