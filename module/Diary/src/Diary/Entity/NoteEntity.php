<?php

namespace Diary\Entity;

use Zend\InputFilter\Factory as InputFactory;

use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;
use \Mc\Hydrator\Strategy\ClosureStrategy;
use \Mc\Entity\DefaultEntity;
use Zend\Stdlib\Hydrator;
use Zend\InputFilter\InputFilter;

class NoteEntity  extends InputFilter // extends DefaultEntity //InputFilter//implements InputFilterAwareInterface
{
    protected $hydrator;
    protected $inputFilter;
    
    public function __construct()
    {
        $this->hydrator = new Hydrator\ObjectProperty;
        
        $this->hydrator->addStrategy('txt', new ClosureStrategy(
            function($value) {
                return sprintf('%s', $value);
            },
            function($value) {
                return sprintf('%s', $value);
            }
        ));
    }
    
    /**
     * Заглушка, чтобы не словить Notice: Undefined property
     */
    public function __get($name)
    {
        if(!in_array($name, get_object_vars($this))) {
            $this->{$name} = null;
        }
        return $this->{$name};
    }
    
    public function getHydrator()
    {
        return $this->hydrator;
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
//                'name'     => 'txt',
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