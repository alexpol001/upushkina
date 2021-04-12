<?php
namespace common\components;

use yii\base\Component;

class Common extends Component {
    public static function getFullYear($year) {
        $str = strval($year);
        return substr(strval(date('Y')), 0, 4 - strlen($str)).$str;
    }
}