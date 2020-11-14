<?php

namespace app\tables;

use Yii;

/**
 * This is the model class for table "tbl_okpdtr".
 *
 * @property int $okpdtr
 * @property string $title
 *
 * @property TblPredictions[] $tblPredictions
 * @property TblSeekersRelOkpdtr[] $tblSeekersRelOkpdtrs
 * @property TblVacancies[] $tblVacancies
 */
class TblOkpdtr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_okpdtr';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['okpdtr', 'title'], 'required'],
            [['okpdtr'], 'default', 'value' => null],
            [['okpdtr'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['okpdtr'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'okpdtr' => 'Okpdtr',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[TblPredictions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblPredictions()
    {
        return $this->hasMany(TblPredictions::className(), ['okpdtr' => 'okpdtr']);
    }

    /**
     * Gets query for [[TblSeekersRelOkpdtrs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblSeekersRelOkpdtrs()
    {
        return $this->hasMany(TblSeekersRelOkpdtr::className(), ['okpdtr' => 'okpdtr']);
    }

    /**
     * Gets query for [[TblVacancies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblVacancies()
    {
        return $this->hasMany(TblVacancies::className(), ['okpdtr' => 'okpdtr']);
    }
}
