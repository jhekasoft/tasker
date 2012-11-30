<?php

namespace Tasks\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;

class TagsTable extends AbstractTableGateway
{
    //protected $hydrator = null;
    protected $table ='tasker_tags';

    /**
     * Ждем адаптер, не обязательно общий
     */
    public function __construct(Adapter $adapter = null)
    {
        $this->adapter = $adapter;
        $this->initialize();
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

    public function save(array $data)
    {
        $id = (int)$data['id'];
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