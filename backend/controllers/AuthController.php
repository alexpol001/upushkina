<?

namespace backend\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class AuthController extends Controller
{

    public $bodyClass;

    public function init() {
        parent::init();
//        $this->bodyClass = 'custom-class';
    }

    public function beforeAction($action)
    {
        $this->bodyClass = str_replace('/', '-', $this->id).'-'.$action->id;
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    public function behaviors()
    {
        $behaviors = [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'request-password-reset', 'reset-password'],
                        'allow' => true,
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'logout' => ['post']
                ],
            ],
        ];
        return $behaviors;

    }


}