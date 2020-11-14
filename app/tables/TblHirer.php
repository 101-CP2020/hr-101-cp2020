<?php

namespace app\tables;

use Yii;

/**
 * This is the model class for table "tbl_hirer".
 *
 * @property int $id
 * @property string $title
 *
 * @property TblVacancies[] $tblVacancies
 */
class TblHirer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_hirer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
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
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[TblVacancies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblVacancies()
    {
        return $this->hasMany(TblVacancies::className(), ['created_by' => 'id']);
    }
}
