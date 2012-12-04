<?php

namespace Tasks\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;
use Tasks\Entity\TaskEntity;


class TasksTable extends AbstractTableGateway
{
    //protected $hydrator = null;
    protected $table ='tasker_tasks';

    /**
     * Ждем адаптер, не обязательно общий
     */
    public function __construct(Adapter $adapter = null)
    {
        $this->adapter = $adapter;
        
        $prototype = new TaskEntity();
        $this->resultSetPrototype = new HydratingResultSet();
        $this->resultSetPrototype->setHydrator($prototype->getHydrator())
                                 ->setObjectPrototype($prototype);
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

    public function save(TaskEntity $task)
    {
        $data = get_object_vars($task);
        unset($data['id']);
        
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

    public function delete($id)
    {
        parent::delete(array('id' => $id));
    }
}