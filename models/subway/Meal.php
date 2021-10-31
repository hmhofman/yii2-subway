<?php

namespace app\models\subway;

use Yii;

/**
 * This is the model class for table "meal".
 *
 * @property int $id
 * @property string|null $date
 * @property string|null $closed_at
 * @property string|null $opened_at
 * @property int|null $opened_by user
 * @property int|null $closed_by user
 *
 * @property Order[] $orders
 * @property User[] $users
 */
class Meal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'meal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['date', 'closed_at', 'opened_at'], 'datetime'],
            [['date', 'closed_at', 'opened_at'], 'safe'],
            [['opened_by', 'closed_by'], 'integer'],
            [['date'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'closed_at' => 'Closed At',
            'opened_at' => 'Opened At',
            'opened_by' => 'Opened By',
            'closed_by' => 'Closed By',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['meal' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user'])->viaTable('order', ['meal' => 'id']);
    }
}
