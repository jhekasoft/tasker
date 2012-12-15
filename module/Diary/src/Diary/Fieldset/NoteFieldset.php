<?php

namespace Diary\Fieldset;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ObjectProperty as ObjectPropertyHydrator;
use Zend\Form\Form;
use Zend\Form\Element;

class NoteFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('note');
        $this->setHydrator(new ObjectPropertyHydrator(false));
             //->setObject(new TaskEntity());

        //--------------------------------------------------------------------//
        $element = new Element\Hidden('id');
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
//            'txt' => array(
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
