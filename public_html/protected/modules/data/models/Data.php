<?php

/**
 * This is the model class for table "bnd_data".
 *
 * The followings are the available columns in table 'bnd_data':
 * @property integer $id
 * @property string $data
 * @property string $create_time
 * @property string $update_time
 */
class Data extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Data the static model class
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
		return 'bnd_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('data', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, data, create_time, update_time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'data' => 'Data',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
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
		$criteria->compare('data',$this->data,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    protected function beforeSave()
    {
        if(parent::beforeSave()) {
            if($this->isNewRecord) {
                $this->create_time=$this->update_time=date('Y-m-d H:i:s');
                $this->user_id=Yii::app()->user->id;
            } else {
                $this->update_time=date('Y-m-d H:i:s');
            }
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Удаление записи должно вызывать удаление всех комментариев к ней.
     * Вдобавок, мы должны обновить теги в таблице tbl_tag.
     */
    protected function afterDelete()
    {
        parent::afterDelete();
        //Comment::model()->deleteAll('post_id='.$this->id);
        //Tag::model()->updateFrequency($this->tags, '');
    }
}