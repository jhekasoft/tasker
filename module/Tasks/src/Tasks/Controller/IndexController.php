<?php

namespace Tasks\Controller;
use \Zend as Zend;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\Sql\Select;
use Tasks\Model\TasksTable;

class IndexController extends AbstractActionController implements ServiceLocatorAwareInterface
{
    protected $services;

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->services = $serviceLocator;
    }

    public function init()
    {
//        $container = new Zend\Navigation\Navigation(array(
//            
//            array(
//                'label' => 'Page 1',
//                'uri'   => '#',
//              //  'order' => '100500',
//            ),
//            array(
//                'label' => 'Page 2',
//                'uri'   => '#',
//                //'order' => '101',
//                'pages' => array(
//                    array(
//                        'label' => 'Page 2.1',
//                        'uri'   => '#',
//                    ),
//                    array(
//                        'label' => 'Page 2.2',
//                       'uri'   => '#',
//                    ),
//                ),
//            ),
//            
//        ));
//        \Zend\Debug\Debug::dump($container->toArray());exit();
    }

    public function indexAction()
    {
        //\Zend\Debug\Debug::dump('zlo');exit();
        $this->init();

        $table = $this->services->get('Tasks\Model\TasksTable');

//        $paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\Iterator($table->select(function (Select $select) {
//            $select->where("`done`='0'");
//            $select->order('creation_time DESC');
//        })));
//        \Zend\Debug\Debug::dump($paginator);exit();

        $paginator = $table->getPaginator(array(
            'page' => $this->params()->fromRoute('page', 1),
        ));

        return new ViewModel(array(
            'paginator' => $paginator,
//            'resultSet' => $table->select(function (Select $select) {
//                $select->where("`done`='0'");
//                $select->order('creation_time DESC');
//            }),
        ));
    }
}
