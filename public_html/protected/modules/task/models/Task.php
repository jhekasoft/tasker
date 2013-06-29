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
    public function scopes()
    {
        return array(
            'done'=>array(
                'condition'=>"`progress`='done'",
                'order'=>"todo_time DESC",
            ),
            'new'=>array(
                'condition'=>"`progress`='new'",
                'order'=>"todo_time DESC",
            ),
            'in_progress'=>array(
                'condition'=>"`progress`='in_progress'",
                'order'=>"todo_time DESC",
            ),
            'actual'=>array(
                'condition'=>"`progress`!='done'",
                'order'=>"todo_time DESC",
            ),
        );
    }
    
    /**
	 * @return array relational rules.
	 */
	public function relations()
	{
        Yii::app()->getModule('data');
        
		return array(
            'parent'=>array(self::BELONGS_TO, 'Task', 'task_id'),
            'data'=>array(self::BELONGS_TO, 'Data', 'data_id'),
            'tasks'=>array(self::HAS_MANY, 'Task', 'task_id'),
            'actualTasks'=>array(
                self::HAS_MANY,
                'Task',
                'task_id',
                'order'=>'actualTasks.todo_time DESC',
                'condition'=>"`actualTasks`.`progress`!='done'",
            ),
		);
	}
    
    public function getDescription()
    {
        $time = 'null';
        if(!empty($this->todo_time)) {
            $time = date('Y-m-d', time($this->todo_time));
        }
        
        $data = 'null';
        if(!empty($this->data)) {
            $data = $this->substr($this->data->data, 100);
        }
        
        $description = $time . '/' . $data;
        
        return $description;
    }
    
    public function substr($str, $len=40)
    {
        $result = mb_substr($str, 0, $len);
        if(mb_strlen($str) > $len) {
            $result .= '...';
        }
        
        return $result.mb_strlen($str);
    }
    
//    public function substrWords($text, $wordCount = 5)
//    {
//        $sep = ' ';
//        $words = split($sep, $text);
//        
//        if(preg_match('/phpmyadmin/', $text)) {
//            var_dump(mb_strlen($text));
//            var_dump(mb_substr($text, 0, 5));
//            exit();
//        }
//        
//        if (count($words) > $wordCount) {
//            $text = join($sep, array_slice($words, 0, $wordCount)) . '...';
//        }
//        return $text;
//    }
    
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
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'data_id' => 'Data',
			'task_id' => 'Parent Task',
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
        
//        echo '<pre>';
//        var_dump($this->attributes);
//        echo '</pre>';
//        exit();

        return true;
    }
}