<?php

namespace app\tables;

use Yii;

/**
 * This is the model class for table "tbl_municipality".
 *
 * @property int $id
 * @property int $kladr
 * @property string $title
 * @property int|null $population
 *
 * @property TblSeekers[] $tblSeekers
 * @property TblVacancies[] $tblVacancies
 */
class TblMunicipality extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_municipality';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kladr', 'title'], 'required'],
            [['kladr', 'population'], 'default', 'value' => null],
            [['kladr', 'population'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['kladr'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kladr' => 'Kladr',
            'title' => 'Title',
            'population' => 'Population',
        ];
    }

    /**
     * Gets query for [[TblSeekers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblSeekers()
    {
        return $this->hasMany(TblSeekers::className(), ['kladr' => 'kladr']);
    }

    /**
     * Gets query for [[TblVacancies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblVacancies()
    {
        return $this->hasMany(TblVacancies::className(), ['kladr' => 'kladr']);
    }
}
