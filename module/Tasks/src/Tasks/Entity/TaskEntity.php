<?php

namespace Tasks\Entity;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

use Tasks\Entity\PriorityEntity;

class TaskEntity extends InputFilter//implements InputFilterAwareInterface
{
    public $id;
    //protected $priority;
    public $task;
    public $creation_time;
    
    protected $inputFilter;
    protected $hydrator;
    
    public function __construct($options)
    {
        if(null !== $options['hydrator']) {
            // это должна быть ссылка на ТОТ САМЫЙ гидратор из таблички, такое не прокатит:
            // 'hydrator' => new \Zend\Stdlib\Hydrator\OloloHydrator
            if(!($options['hydrator'] instanceof \Zend\Stdlib\Hydrator\HydratorInterface)) {
                throw new \Exception(sprintf('$options[\'hydrator\'] must implements to \Zend\Stdlib\Hydrator\HydratorInterface, %s given',
                    (new \ReflectionClass($options['hydrator']))->getName()
                ));
            }
            $this->hydrator = $options['hydrator'];
            
            $this->hydrator->addStrategy('task', new \Mc\Hydrator\Strategy\ClosureStrategy(
                function($value) {
                    return sprintf('<<<%s>>>', $value);
                },
                function($value) {
//                    return 'zlo' . $value;
                    return sprintf('<<<%s>>>', $value);
                }
            ));
        }
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

//            $inputFilter->add($factory->createInput(array(
//                'name'     => 'task',
//                'required' => true,
//                'filters'  => array(
//                    array('name' => 'StripTags'),
//                    array('name' => 'StringTrim'),
//                ),
//                'validators' => array(
//                    array(
//                        'name'    => 'StringLength',
//                        'options' => array(
//                            'encoding' => 'UTF-8',
//                            'min'      => 1,
//                            'max'      => 100,
//                        ),
//                    ),
//                ),
//            )));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}