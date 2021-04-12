<?php

namespace common\models;

use common\models\setting\Setting;
use DateTime;
use Yii;

/**
 * This is the model class for table "offer".
 *
 * @property int $id
 * @property int $price
 * @property string $from_date
 * @property string $to_date
 */
class Offer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'offer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'from_date', 'to_date'], 'required'],
            [['price'], 'integer'],
            [['from_date', 'to_date'], 'safe'],
            [['from_date', 'to_date'], 'date', 'format' => 'dd.MM.yy'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price' => 'Цена во время акции',
            'from_date' => 'Дата начала акции',
            'to_date' => 'Дата окончания акции',
        ];
    }

    /**
     * @return int
     */
    public static function getCurrentPrice()
    {
        $offers = Offer::find()->all();
        $now = DateTime::createFromFormat('!d.m.y', date('d.m.y',time()))->getTimestamp();
        foreach ($offers as $offer) {
            $from = DateTime::createFromFormat('!d.m.y', $offer->from_date)->getTimestamp();
            $to = DateTime::createFromFormat('!d.m.y', $offer->to_date)->getTimestamp();
            if ($from <= $now && $now <= $to) {
                return $offer->price;
            }
        }
        return Setting::take()->price;
    }

    /**
     * @return array
     */
    public static function getOffers()
    {
        $offers = Offer::find()->all();
        $result = [];
        $now = DateTime::createFromFormat('!d.m.y', date('d.m.y',time()))->getTimestamp();
        foreach ($offers as $offer) {
            $from = DateTime::createFromFormat('!d.m.y', $offer->from_date)->getTimestamp();
            $to = DateTime::createFromFormat('!d.m.y', $offer->to_date)->getTimestamp();
            if ($to >= $from && $to >= $now) {
                if ($from < $now) {
                    $from = $now;
                }
                $result[] = array('price' => $offer->price, 'from' => date('d.m.y', $from), 'to' => date('d.m.y', $to));
            }
        }
        return $result;
    }
}
