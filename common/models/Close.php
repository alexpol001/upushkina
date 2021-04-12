<?php

namespace common\models;

use common\components\Common;
use Yii;

/**
 * This is the model class for table "close".
 *
 * @property int $id
 * @property string $date
 */
class Close extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'close';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'required'],
            [['date'], 'safe'],
            [['date'], 'date', 'format' => 'dd.MM.yy'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата',
        ];
    }

    public static function getCloseDates() {
        $closes = Close::find()->all();
        $y = (int) date('y');
        $m = date('n');
        $d = date('j');
        $result = [];

        foreach ($closes as $close) {
            $close_arr = explode('.', $close->date);
            $close_arr  = array_map('intval', $close_arr);
            if ($close_arr[2] < $y ||
                ($close_arr[2] == $y && $close_arr[1] < $m) ||
                ($close_arr[2] == $y && $close_arr[1] == $m && $close_arr[0] < $d)) {
                continue;
            }
            $arr = [];
            $arr['day'] = $close_arr[0];
            $arr['month'] = $close_arr[1];
            $arr['year'] = Common::getFullYear($close_arr[2]);
            $result[] = $arr;
        }

        return $result;
    }
}
