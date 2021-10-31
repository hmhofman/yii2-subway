<?php

namespace app\models\subway;

use Yii;

/**
 * This is the model class for table "finish".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $fat-free
 */
class Finish extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finish';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fat-free'], 'integer'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'fat-free' => 'Fat Free',
        ];
    }
}
