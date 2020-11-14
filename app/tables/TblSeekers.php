<?php

namespace app\tables;

use Yii;

/**
 * This is the model class for table "tbl_seekers".
 *
 * @property int $id
 * @property int $inn
 * @property string $snils
 * @property int|null $sex
 * @property int|null $birthday_date
 * @property int|null $kladr
 * @property int|null $created_date
 * @property int|null $closed_date
 * @property int|null $reason_id
 *
 * @property TblMunicipality $kladr0
 * @property TblReason $reason
 * @property TblSeekersRelOkpdtr[] $tblSeekersRelOkpdtrs
 */
class TblSeekers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_seekers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['inn', 'snils'], 'required'],
            [['inn', 'sex', 'birthday_date', 'kladr', 'created_date', 'closed_date', 'reason_id'], 'default', 'value' => null],
            [['inn', 'sex', 'birthday_date', 'kladr', 'created_date', 'closed_date', 'reason_id'], 'integer'],
            [['snils'], 'string', 'max' => 255],
            [['kladr'], 'exist', 'skipOnError' => true, 'targetClass' => TblMunicipality::className(), 'targetAttribute' => ['kladr' => 'kladr']],
            [['reason_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblReason::className(), 'targetAttribute' => ['reason_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'inn' => 'Inn',
            'snils' => 'Snils',
            'sex' => 'Sex',
            'birthday_date' => 'Birthday Date',
            'kladr' => 'Kladr',
            'created_date' => 'Created Date',
            'closed_date' => 'Closed Date',
            'reason_id' => 'Reason ID',
        ];
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
     * Gets query for [[Reason]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReason()
    {
        return $this->hasOne(TblReason::className(), ['id' => 'reason_id']);
    }

    /**
     * Gets query for [[TblSeekersRelOkpdtrs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblSeekersRelOkpdtrs()
    {
        return $this->hasMany(TblSeekersRelOkpdtr::className(), ['seeker_id' => 'id']);
    }
}
