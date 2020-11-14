<?php

namespace app\tables;

use Yii;

/**
 * This is the model class for table "tbl_seekers_rel_okpdtr".
 *
 * @property int $id
 * @property int $seeker_id
 * @property int $okpdtr
 *
 * @property TblOkpdtr $okpdtr0
 * @property TblSeekers $seeker
 */
class TblSeekersRelOkpdtr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_seekers_rel_okpdtr';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seeker_id', 'okpdtr'], 'required'],
            [['seeker_id', 'okpdtr'], 'default', 'value' => null],
            [['seeker_id', 'okpdtr'], 'integer'],
            [['okpdtr'], 'exist', 'skipOnError' => true, 'targetClass' => TblOkpdtr::className(), 'targetAttribute' => ['okpdtr' => 'okpdtr']],
            [['seeker_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblSeekers::className(), 'targetAttribute' => ['seeker_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'seeker_id' => 'Seeker ID',
            'okpdtr' => 'Okpdtr',
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

    /**
     * Gets query for [[Seeker]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeeker()
    {
        return $this->hasOne(TblSeekers::className(), ['id' => 'seeker_id']);
    }
}
