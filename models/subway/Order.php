<?php

namespace app\models\subway;

use Yii;
use app\models\User;

/**
 * This is the model class for table "order".
 *
 * @property int $meal
 * @property int $user
 * @property int|null $subway
 * @property int|null $bread
 * @property int|null $topping
 * @property int|null $veggies
 * @property int|null $finish
 * @property int|null $drink
 * @property string|null $breadsize in cm
 *
 * @property Bread $bread0
 * @property Drink $drink0
 * @property Meal $meal0
 * @property Subway $subway0
 * @property Topping $topping0
 * @property User $user0
 * @property Veggy $veggies0
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['meal_id', 'user_id'], 'required'],
            [['meal_id', 'user_id', 'subway_id', 'bread_id', 'topping_id', 'veggies_id', 'finish_id', 'drink_id'], 'integer'],
            [['breadsize'], 'string'],
            [['meal_id', 'user_id'], 'unique', 'targetAttribute' => ['meal_id', 'user_id']],
            [['meal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Meal::className(), 'targetAttribute' => ['meal_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['bread_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bread::className(), 'targetAttribute' => ['bread_id' => 'id']],
            [['topping_id'], 'exist', 'skipOnError' => true, 'targetClass' => Topping::className(), 'targetAttribute' => ['topping_id' => 'id']],
            [['subway_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subway::className(), 'targetAttribute' => ['subway_id' => 'id']],
            [['drink_id'], 'exist', 'skipOnError' => true, 'targetClass' => Drink::className(), 'targetAttribute' => ['drink_id' => 'id']],
            [['veggies_id'], 'exist', 'skipOnError' => true, 'targetClass' => Veggy::className(), 'targetAttribute' => ['veggies_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'meal_id' => 'Meal',
            'user_id' => 'User',
            'subway_id' => 'Subway',
            'bread_id' => 'Bread',
            'topping_id' => 'Topping',
            'veggies_id' => 'Veggies',
            'finish_id' => 'Finish',
            'drink_id' => 'Drink',
            'breadsize' => 'in cm',
        ];
    }

    /**
     * Gets query for [[Bread0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBread0()
    {
        return $this->hasOne(Bread::className(), ['id' => 'bread_id']);
    }

    /**
     * Gets query for [[Drink0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDrink0()
    {
        return $this->hasOne(Drink::className(), ['id' => 'drink_id']);
    }

    /**
     * Gets query for [[Meal0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMeal0()
    {
        return $this->hasOne(Meal::className(), ['id' => 'meal_id']);
    }

    /**
     * Gets query for [[Subway0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubway0()
    {
        return $this->hasOne(Subway::className(), ['id' => 'subway_id']);
    }

    /**
     * Gets query for [[Topping0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTopping0()
    {
        return $this->hasOne(Topping::className(), ['id' => 'topping_id']);
    }

    /**
     * Gets query for [[User0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Veggies0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVeggies0()
    {
        return $this->hasOne(Veggy::className(), ['id' => 'veggies_id']);
    }

    public function getFinish0()
    {
        return $this->hasOne(Finish::className(), ['id' => 'finish_id']);
    }

}
