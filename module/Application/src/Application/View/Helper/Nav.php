<?php

namespace Application\View\Helper;

use Zend;
use Zend\View\Helper\AbstractHelper;

class Nav extends AbstractHelper
{
    protected $route;
    public function __construct($route)
    {
        $this->route = $route;
    }
    
    public function __invoke()
    {
        //$controller = $this->route->getParam('controller', 'index');\Zend\Debug\Debug::dump($controller);
        $container = new Zend\Navigation\Navigation(array(
            array(
                'label' => 'Home',
                'route' => 'Application\index',
                'routeMatch' => $this->route,
            ),
            array(
                'label' => 'Diary',
                'route' => 'Diary\index',
                'routeMatch' => $this->route,
                'pages' => array(
                    array(
                        'label' => 'list',
                        'route' => 'Diary\index',
                        'routeMatch' => $this->route,
                    ),
                    array(
                        'label' => 'add',
                        'route' => 'Diary\add-note',
                        'routeMatch' => $this->route,
                    ),
                ),
            ),
            array(
                'label' => 'Tasks',
                'route' => 'Tasks\index',
                'routeMatch' => $this->route,
                'pages' => array(
                    array(
                        'label' => 'list',
                        'route' => 'Tasks\index',
                        'routeMatch' => $this->route,
                    ),
                    array(
                        'label' => 'add',
                        'route' => 'Tasks\add-task',
                        'routeMatch' => $this->route,
                    ),
                ),
            ),
        ));
        
        //$page = $container->findOneByRoute('Diary\index');
        //\Zend\Debug\Debug::dump($page->isActive());exit();
        //$page = $container->findOneByRoute('Diary\index');
        //\Zend\Debug\Debug::dump($this->route);exit();
        
        
        return $container;
    }
}
