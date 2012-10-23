<?php

namespace Tasks\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class MyStrategy extends \Zend\Stdlib\Hydrator\Strategy\DefaultStrategy
{
    /**
     * Converts the given value so that it can be extracted by the hydrator.
     *
     * @param mixed $value The original value.
     * @return mixed Returns the value that should be extracted.
     */
    public function extract($value)
    {
        return $value . 'kkk';
    }

    /**
     * Converts the given value so that it can be hydrated by the hydrator.
     *
     * @param mixed $value The original value.
     * @return mixed Returns the value that should be hydrated.
     */
    public function hydrate($value)
    {
        return 'yyy' . $value;
    }
}

class MySuperClass
{
    public $one = 'two';
    public $hello = null;
    protected $world = '123';
    
    public function getHello()
    {
        return $this->hello;
    }
    
    public function setHello($value)
    {
        $this->hello = $value;
    }
    
    public function getWorld()
    {
        return $this->world;
    }
    
    public function setWorld($value)
    {
        $this->world = $value;
    }
    
    public function getOlolo()
    {
        return $this->ololo;
    }
    
    public function setOlolo($value)
    {
        $this->ololo = $value;
    }
}

class TaskModel implements InputFilterAwareInterface
{
    public $id;
    public $artist;
    public $title;
    public $task;
    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->task = (isset($data['task'])) ? $data['task'] : null;
        $this->datetime  = (isset($data['datetime'])) ? $data['datetime'] : null;
        $this->ololo = 'Hello, world!!!';
    }
    
    public function getHello()
    {
        $hydrator = new \Zend\Stdlib\Hydrator\ClassMethods();
        $object = new MySuperClass();
        //$object->setHello('ololo');
        //$hydrator->setObject($object);
        
//        $hydrator->addStrategy('world', new MyStrategy());
        $hydrator->hydrate(array(
            //'hello' => 'ololo3',
            'world' => 'ololo4',
            'ololo' => 'ololo4',
        ), $object);
        
        \Zend\Debug\Debug::dump($hydrator->extract($object));exit();
        
        /*$hydrator = new \Zend\Stdlib\Hydrator\ArraySerializable();
        $object = new \ArrayObject(array(
            'hello' => 'ololo1',
            'world' => 'ololo2',
        ));
        
        $hydrator->addStrategy('world', new MyStrategy());
        $hydrator->hydrate(array(
            'hello' => 'ololo3',
            'world' => 'ololo4',
        ), $object);
        
        \Zend\Debug\Debug::dump($hydrator->extract($object));exit();*/
        return "Hello, world! Task: {$this->task} {$this->ololo}";
    }
    
    public function getArrayCopy()
    {
        return get_object_vars($this);
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
                'name'     => 'artist',
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

            $inputFilter->add($factory->createInput(array(
                'name'     => 'title',
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