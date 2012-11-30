<?php

namespace Tasks\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;
use Tasks\Entity\TagEntity;


class TasksTagsTable extends AbstractTableGateway
{
    //protected $hydrator = null;
    protected $table ='tasker_tasks_tags';
    
    protected $models = array();

    /**
     * Ждем адаптер, не обязательно общий
     */
    public function __construct(Adapter $adapter = null)
    {
        $this->adapter = $adapter;
        
        $prototype = new TagEntity();
        $this->resultSetPrototype = new HydratingResultSet();
        $this->resultSetPrototype->setHydrator($prototype->getHydrator())
                                 ->setObjectPrototype($prototype);
        $this->initialize();
    }
    
    /**
     * Самописный метод
     */
    public function setDependentModels(array $models)
    {
        $this->models = $models;
        return $this;
    }

    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }
    
    public function getItem($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function save(TagEntity $entity)
    {
        $data = get_object_vars($entity);
        unset($data['id']);
        
        $id = (int)$entity->id;
        if ($id == 0) {
            $this->insert($data);
        } else {
            if ($this->getItem($id)) {
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