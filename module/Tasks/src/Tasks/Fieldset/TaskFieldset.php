<?php

namespace Tasks\Fieldset;

use Tasks\Entity\TaskEntity;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ObjectProperty as ObjectPropertyHydrator;
use Zend\Form\Form;
use Zend\Form\Element;

class TaskFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('task');
        $this->setHydrator(new ObjectPropertyHydrator(false))
             ->setObject(new TaskEntity());
        
        
        //--------------------------------------------------------------------//
        $element = new Element\Hidden('id');
        $this->add($element);
        //--------------------------------------------------------------------//
        $element = new Element\Select('priority');
        $element->setValueOptions(array(
            '0' => 'default',
            '5' => 'necessery',
            '10' => 'now!',
        ));
        $this->add($element);
        //--------------------------------------------------------------------//
        $element = new Element\Textarea('txt');
        //$element->setLabel('Текст');
        $element->setAttributes(array(
            'class' => 'input-xxlarge',
            'cols' => '80',
            'rows' => '8',
        ));
        $this->add($element);
        //--------------------------------------------------------------------//
        $this->add(array(
            'type' => 'Zend\Form\Element\Collection',
            'name' => 'tags',
            'options' => array(
                //'count' => 22,
                //'should_create_template' => true,
                'allow_add' => true,
                'target_element' => array(
                    'type' => 'Tasks\Fieldset\TagFieldset'
                )
            )
        ));
        
        
        
        
        
        

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