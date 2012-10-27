<?php

namespace Tasks\Entity;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;

class TasksTable extends AbstractTableGateway
{
    protected $table ='tasks';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new HydratingResultSet();
//        \Zend\Debug\Debug::dump($this->resultSetPrototype);exit();
        $this->resultSetPrototype->setObjectPrototype(new TaskEntity());
//        \Zend\Debug\Debug::dump($this->resultSetPrototype);exit();
        $this->initialize();
    }

    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }
    
    public function getTask($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveTask(TaskEntity $task)
    {
        $data = array(
            'task' => $task->task,
        );
        $id = (int)$task->id;
        if ($id == 0) {
            $this->insert($data);
        } else {
            if ($this->getTask($id)) {
                $this->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteTask($id)
    {
        $this->delete(array('id' => $id));
    }
}