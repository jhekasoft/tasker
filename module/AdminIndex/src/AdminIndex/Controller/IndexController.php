<?php

namespace AdminIndex\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Renderer\PhpRenderer;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
//        $doctypeHelper = new Doctype();
//        $doctypeHelper->doctype('XHTML1_STRICT');
        
        
        $layout = $this->layout();
        $layout->setTemplate('admin-common/layout/layout', 'admin-common');
        
        $view = new ViewModel(array(
            'title' => 'Welcome to ADMINKA!',
        ));
        
//        $hello = new PhpRenderer();
//        $broker = $hello->getBroker();
//        echo (new ReflectionObject($broker))->getName();
        
        
        //$view->setTerminal(true);
        return $view;
    }
}