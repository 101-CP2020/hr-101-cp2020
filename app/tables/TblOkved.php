<?php

namespace app\tables;

use Yii;

/**
 * This is the model class for table "tbl_okved".
 *
 * @property string $okved
 * @property string $title
 *
 * @property TblVacancies[] $tblVacancies
 */
class TblOkved extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_okved';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['okved', 'title'], 'required'],
            [['okved'], 'string', 'max' => 10],
            [['title'], 'string', 'max' => 255],
            [['okved'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'okved' => 'Okved',
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
        return $this->hasMany(TblVacancies::className(), ['okved' => 'okved']);
    }
}
