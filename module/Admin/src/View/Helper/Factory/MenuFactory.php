<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * 
 * @version 1.0.0
 * @author Victor Chiriac <victorchiriac89@gmail.com>
 * @company Web Design Brasov
 * @website <www.webdesignbv.ro>
 */

namespace Admin\View\Helper\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Admin\View\Helper\Menu;
use Admin\Service\NavManager;

/**
 * This is the factory for Menu view helper. Its purpose is to instantiate the
 * helper and init menu items.
 */
class MenuFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        // Instantiate the helper using menu items.
        return new Menu($container->get(NavManager::class)->getMenuItems());
    }

}
