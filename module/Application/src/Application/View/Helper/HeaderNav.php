<?php

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class HeaderNav extends AbstractHelper
{
    public function __invoke()
    {
        $view = $this->getView();

        return $view->render('helper/header-nav');
    }
}
