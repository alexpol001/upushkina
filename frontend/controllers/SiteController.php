<?php
namespace frontend\controllers;

use common\models\Material;
use common\models\setting\Setting;
use Yii;
use yii\base\InvalidParamException;
use yii\base\Model;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public function behaviors()
    {
        $behaviors = [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'send' => ['post']
                ],
            ],
        ];
        return $behaviors;

    }
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $description = Material::findOne(9);
        return $this->render('index', [
            'description' => $description
        ]);
    }

    public function actionSend() {
        if (Yii::$app->request->isAjax) {
            $model = Yii::$app->request->post();
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $supportEmail = Setting::take()->mail->username;
            return Yii::$app
                ->mailer
                ->compose(
                    ['html' => 'send-html', 'text' => 'send-text'],
                    ['model' => $model]
                )
                ->setFrom([$supportEmail  ? $supportEmail : Yii::$app->params['supportEmail']])
                ->setTo(Yii::$app->params['supportEmail'])
                ->setSubject('Заявка с сайта | ' . Setting::take()->title)
                ->send();
        }
    }
}
