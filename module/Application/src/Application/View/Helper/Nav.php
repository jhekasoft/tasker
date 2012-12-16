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
            ),
            array(
                'label' => 'Diary',
                'route' => 'Diary\index',
                'pages' => array(
                    array(
                        'label' => 'list',
                        'route' => 'Diary\index',
                    ),
                    array(
                        'label' => 'add',
                        'route' => 'Diary\add-note',
                    ),
                ),
            ),
            array(
                'label' => 'Tasks',
                'route' => 'Tasks\index',
                'pages' => array(
                    array(
                        'label' => 'list',
                        'route' => 'Tasks\index',
                    ),
                    array(
                        'label' => 'add',
                        'route' => 'Tasks\add-task',
                    ),
                ),
            ),
        ));
        
        //$page = $container->findOneByController('Diary\Controller\Index');
        //$page = $container->findOneByRoute('Diary\index');
        //\Zend\Debug\Debug::dump($this->route);exit();
        //\Zend\Debug\Debug::dump($page->isActive());exit();
        
        return $container;
    }
}
