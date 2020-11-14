<?php

namespace app\tables;

use Yii;

/**
 * This is the model class for table "tbl_predictions".
 *
 * @property int $id
 * @property int $okpdtr
 * @property int|null $created_at
 * @property int|null $3_month_value
 * @property int|null $6_month_value
 * @property int|null $12_month_value
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
            [['okpdtr', 'created_at', '3_month_value', '6_month_value', '12_month_value'], 'default', 'value' => null],
            [['okpdtr', 'created_at', '3_month_value', '6_month_value', '12_month_value'], 'integer'],
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
            '3_month_value' => '3 Month Value',
            '6_month_value' => '6 Month Value',
            '12_month_value' => '12 Month Value',
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
