<?php

namespace Tasks\Fieldset;

use Tasks\Entity\TagEntity;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ObjectProperty as ObjectPropertyHydrator;
use Zend\Form\Form;
use Zend\Form\Element;

class TagFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('tag');
        $this->setHydrator(new ObjectPropertyHydrator(false))
             ->setObject(new TagEntity());
        
        
        //--------------------------------------------------------------------//
        $element = new Element\Hidden('id');
        $this->add($element);
        //--------------------------------------------------------------------//
        $element = new Element\Checkbox('use');
        $element->setCheckedValue(1);
        $element->setUncheckedValue(0);
        $this->add($element);
        //--------------------------------------------------------------------//
        $element = new Element\Select('tag_id');
        $element->setValueOptions(array(
            '1' => 'hello',
            '2' => 'world',
            '3' => 'hi',
        ));
        $this->add($element);
        //--------------------------------------------------------------------//
        
        
        
        
        
        

//        $this->add(array(
//            'name' => 'creation_time',
//            'options' => array(
//                'label' => 'time of task add'
//            ),
//            'attributes' => array(
//                'required' => 'required'
//            )
//        ));

        
    }

    /**
     * Should return an array specification compatible with
     * {@link Zend\InputFilter\Factory::createInputFilter()}.
     *
     * @return array
     \*/
    public function getInputFilterSpecification()
    {
        return array(
//            'id' => array(
//                'required' => true,
//            ),
//            'task' => array(
//                'required' => true,
//            ),
//            'price' => array(
//                'required' => true,
//                'validators' => array(
//                    array(
//                        'name' => 'Float'
//                    )
//                )
//            )
        );
    }
}