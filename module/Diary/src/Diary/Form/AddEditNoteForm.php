<?php

namespace Diary\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
use Zend\Stdlib\Hydrator\ObjectProperty as ObjectPropertyHydrator;

class AddEditNoteForm extends Form
{
    public function __construct()
    {
        parent::__construct('add_edit_note_form');

        $this->setAttribute('method', 'post')
             ->setHydrator(new ObjectPropertyHydrator(false))
             ->setInputFilter(new InputFilter());

        $this->add(array(
            'type' => 'Diary\Fieldset\NoteFieldset',
            'options' => array(
                'use_as_base_fieldset' => true
            )
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Csrf',
            'name' => 'csrf'
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Send'
            )
        ));
    }
    
//    //IF YOU WILL WORK WITH DATABASE
//    //AND NEED bind() FORM FOR EDIT DATA, YOU NEED OVERRIDE
//    //populateValues() FUNC LIKE THIS
//    public function populateValues($data)
//    {  
//        foreach($data as $key=>$row)
//        {
//           if (is_array(@json_decode($row))){
//                $data[$key] =   new \ArrayObject(\Zend\Json\Json::decode($row), \ArrayObject::ARRAY_AS_PROPS);
//           }
//        }
//
//        parent::populateValues($data);
//    }
}