<?php

namespace Tasks\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;
use Tasks\Entity\TaskEntity;
use Zend\Paginator\Adapter\Iterator;
use Zend\Paginator\Paginator;


class TasksTable extends AbstractTableGateway
{
    //protected $hydrator = null;
    protected $table ='tasks_tasks';

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
    
    public function getPaginator($options = array())
    {
        $page = 1;
        if(!empty($options['page'])) {
            $page = (int) $options['page'];
        }
        
        $itemCountPerPage = 10;
        if(!empty($options['itemCountPerPage'])) {
            $itemCountPerPage = (int) $options['itemCountPerPage'];
        }
        
        $resultSet = $this->select(function (\Zend\Db\Sql\Select $select) {
            $select->where("`done`='0'");
            $select->order('creation_time DESC');
            //$select->order('id ASC');
        });
        $resultSet->buffer();
        
        //\Zend\Debug\Debug::dump($paginator->getItemCount);exit();
        
        $iteratorAdapter = new Iterator($resultSet);
        $paginator = new Paginator($iteratorAdapter);
        
        $paginator->setCurrentPageNumber($page);
        $paginator->setItemCountPerPage($itemCountPerPage);
        
        return $paginator;
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

    public function save(TaskEntity $entity)
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