<?php

/**
 * This is the model class for table "{{task}}".
 *
 * The followings are the available columns in table '{{task}}':
 * @property integer $id
 * @property integer $data_id
 * @property integer $task_id
 * @property integer $user_id
 * @property string $progress
 * @property string $todo_time
 */
class Task extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Task the static model class
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
		return '{{task}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('data_id', 'required'),
			array('data_id, task_id, user_id', 'numerical', 'integerOnly'=>true),
			array('progress', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, data_id, task_id, user_id, progress, todo_time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
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
			'task_id' => 'Task',
			'user_id' => 'User',
			'progress' => 'Progress',
			'todo_time' => 'Todo Time',
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
		$criteria->compare('task_id',$this->task_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('progress',$this->progress,true);
		$criteria->compare('todo_time',$this->todo_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function beforeValidate()
    {
        if($this->isNewRecord) {
            $this->todo_time=date('Y-m-d H:i:s');
        }

        $this->user_id=Yii::app()->user->id;

        return true;
    }
}