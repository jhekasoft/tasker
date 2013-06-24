<?php

/**
 * This is the model class for table "{{inbox}}".
 *
 * The followings are the available columns in table '{{inbox}}':
 * @property integer $id
 * @property integer $data_id
 * @property integer $user_id
 */
class Inbox extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Inbox the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{inbox}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('data_id', 'required'),
			array('data_id, user_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, data_id, user_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
        //Yii::import('application.modules.data.models.Data');
        //YiiBase::getPathOfAlias('application.modules.data.models.Data')
        //Yii::import(YiiBase::getPathOfAlias('application.modules.data.models.Data'));
        Yii::app()->getModule('data');
        
		return array(
            'data'=>array(self::BELONGS_TO, 'Data', 'data_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'data_id' => 'Data',
			'user_id' => 'User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('data_id',$this->data_id);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    protected function beforeValidate()
    {
        if($this->isNewRecord) {
            $this->create_time=$this->update_time=date('Y-m-d H:i:s');
            $this->user_id=Yii::app()->user->id;
        } else {
            $this->update_time=date('Y-m-d H:i:s');
        }

        $this->user_id = '-1';

        return true;
    }
}