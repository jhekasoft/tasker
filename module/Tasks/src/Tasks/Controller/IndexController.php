<?php

namespace Tasks\Controller;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Tasks\Entity\TaskEntity;
use Tasks\Entity\PriorityEntity;
use Tasks\Model\TasksTable;
use Tasks\Form\AddEditTaskForm;




class IndexController extends AbstractActionController implements ServiceLocatorAwareInterface
{
    protected $services;

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->services = $serviceLocator;
    }
    
    public function init()
    {
        
    }
    
    public function indexAction()
    {
        $this->init();
        
        $table = $this->services->get('Tasks\Model\TasksTable');
        
        
        $zlo = 'zlo';
        
        $this->getEventManager()->attach('MyMegaEvent', function ($event) use (&$zlo) {
            $zlo = array(
                'event' => array(
                    'name' => $event->getName(),
                    'target' => get_class($event->getTarget()),
                    'params' => json_encode($event->getParams()),
                ),
            );
        });
        
        $this->getEventManager()->trigger('MyMegaEvent');
        
        
        \Zend\Debug\Debug::dump($zlo);exit();
        
        return new ViewModel(array(
            'resultSet' => $table->fetchAll(),
        ));
    }
    
    
    
}