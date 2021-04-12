<?php

namespace common\models;

use Yii;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "material".
 *
 * @property int $id
 * @property int $parent
 * @property string $title
 * @property string $text
 * @property ActiveQuery children
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['parent'], 'integer'],
            [['text'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent' => 'Категория',
            'title' => 'Заголовок',
            'text' => 'Материал',
        ];
    }

    public function getParent()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent']);
    }

    /**
     * @return array
     */
    public function getSelectParent() {
        $categories = Category::find();
        return ArrayHelper::map($categories->all(), 'id', 'title');
    }

    public static function getSelectParents() {
        $categories = Category::find()
            ->select(['id', 'title'])
            ->all();
        return ArrayHelper::map($categories, 'id', 'title');;
    }

    public static function getTitle($id) {
        return self::findOne($id)->title;
    }
}
