<?php

namespace app\tables;

use Yii;

/**
 * This is the model class for table "tbl_predictions".
 *
 * @property int $id
 * @property int $okpdtr
 * @property int|null $created_at
 * @property int|null $month_3_value
 * @property int|null $month_6_value
 * @property int|null $month_12_value
 *
 * @property TblOkpdtr $okpdtr0
 */
class TblPredictions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_predictions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['okpdtr'], 'required'],
            [['okpdtr', 'created_at', 'month_3_value', 'month_6_value', 'month_12_value'], 'default', 'value' => null],
            [['okpdtr', 'created_at', 'month_3_value', 'month_6_value', 'month_12_value'], 'integer'],
            [['okpdtr'], 'exist', 'skipOnError' => true, 'targetClass' => TblOkpdtr::className(), 'targetAttribute' => ['okpdtr' => 'okpdtr']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'okpdtr' => 'Okpdtr',
            'created_at' => 'Created At',
            'month_3_value' => 'Month 3 Value',
            'month_6_value' => 'Month 6 Value',
            'month_12_value' => 'Month 12 Value',
        ];
    }

    /**
     * Gets query for [[Okpdtr0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOkpdtr0()
    {
        return $this->hasOne(TblOkpdtr::className(), ['okpdtr' => 'okpdtr']);
    }
}
