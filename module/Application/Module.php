<?php

namespace Application;

use Zend\Mvc\ModuleRouteListener;

class Module
{
    public function onBootstrap($e)
    {
        $e->getApplication()->getServiceManager()->get('translator');
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
        //\Zend\Debug\Debug::dump($e->getApplication()->getServiceManager()->getRegisteredServices());exit();
        
        // определяем этот хелпер здесь, т.к. здесь нам доступен ServiceManager
        $e->getApplication()->getServiceManager()->get('viewhelpermanager')->setFactory('nav', function($sm) use ($e) {
            return new \Application\View\Helper\Nav($e->getRouteMatch());
        });
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
