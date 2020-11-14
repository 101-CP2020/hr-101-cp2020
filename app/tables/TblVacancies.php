<?php

namespace app\tables;

use Yii;

/**
 * This is the model class for table "tbl_vacancies".
 *
 * @property int $id
 * @property int $created_by
 * @property int|null $created_at
 * @property int $okpdtr
 * @property string $okved
 * @property int $kladr
 * @property int|null $number
 * @property int|null $month_year
 *
 * @property TblHirer $createdBy
 * @property TblMunicipality $kladr0
 * @property TblOkpdtr $okpdtr0
 * @property TblOkved $okved0
 */
class TblVacancies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_vacancies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_by', 'okpdtr', 'okved', 'kladr'], 'required'],
            [['created_by', 'created_at', 'okpdtr', 'kladr', 'number', 'month_year'], 'default', 'value' => null],
            [['created_by', 'created_at', 'okpdtr', 'kladr', 'number', 'month_year'], 'integer'],
            [['okved'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => TblHirer::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['kladr'], 'exist', 'skipOnError' => true, 'targetClass' => TblMunicipality::className(), 'targetAttribute' => ['kladr' => 'kladr']],
            [['okpdtr'], 'exist', 'skipOnError' => true, 'targetClass' => TblOkpdtr::className(), 'targetAttribute' => ['okpdtr' => 'okpdtr']],
            [['okved'], 'exist', 'skipOnError' => true, 'targetClass' => TblOkved::className(), 'targetAttribute' => ['okved' => 'okved']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'okpdtr' => 'Okpdtr',
            'okved' => 'Okved',
            'kladr' => 'Kladr',
            'number' => 'Number',
            'month_year' => 'Month Year',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(TblHirer::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Kladr0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKladr0()
    {
        return $this->hasOne(TblMunicipality::className(), ['kladr' => 'kladr']);
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

    /**
     * Gets query for [[Okved0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOkved0()
    {
        return $this->hasOne(TblOkved::className(), ['okved' => 'okved']);
    }
}
