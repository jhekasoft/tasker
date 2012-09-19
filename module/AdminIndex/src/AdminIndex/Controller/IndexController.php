<?php

namespace AdminIndex\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
//        $doctypeHelper = new Doctype();
//        $doctypeHelper->doctype('XHTML1_STRICT');
        
        $view = new ViewModel(array(
            'title' => 'Welcome to ADMINKA!',
        ));
        //$view->setTerminal(true);
        return $view;
    }
}