<?php

namespace Tasks\Entity;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

use Tasks\Entity\PriorityEntity;

class TaskEntity implements InputFilterAwareInterface
{
    protected $id;
    protected $priority;
    protected $task;
    protected $creation_time;
    
    protected $inputFilter;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    
    public function getCreationTime()
    {
        return $this->creation_time;
    }
    
    public function setCreationTime($creationTime)
    {
        $this->creation_time = $creationTime;
        return $this;
    }
    
    /**
     * @param Priority $brand
     * @return Priority
     \*/
    public function getPriority()
    {
        return $this->priority;
    }
    
    /**
     * @param Priority $priority
     * @return Task
     \*/
    public function setPriority(Priority $priority)
    {
        $this->priority = $priority;
        return $this;
    }
    
    public function getTask()
    {
        return $this->task;
    }
    
    public function setTask($task)
    {
        $this->task = $task;
        return $this;
    }

    public function exchangeArray($data)
    {
        $this->setId((isset($data['id'])) ? $data['id'] : null);
        $this->setTask((isset($data['task'])) ? $data['task'] : null);
        $this->setCreationTime((isset($data['creation_time'])) ? $data['creation_time'] : null);
    }
    
    public function getArrayCopy()
    {
        //return get_object_vars($this);
        $arrayCopy = array(
            'id' => $this->getId(),
            'task' => $this->getTask(),
            'creation_time' => $this->getCreationTime(),
        );
        return $arrayCopy;
    }
    
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'task',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            )));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}