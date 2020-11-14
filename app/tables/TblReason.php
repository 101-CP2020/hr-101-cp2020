<?php

namespace app\tables;

use Yii;

/**
 * This is the model class for table "tbl_reason".
 *
 * @property int $id
 * @property string $title
 *
 * @property TblSeekers[] $tblSeekers
 */
class TblReason extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_reason';
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
     * Gets query for [[TblSeekers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblSeekers()
    {
        return $this->hasMany(TblSeekers::className(), ['reason_id' => 'id']);
    }
}
