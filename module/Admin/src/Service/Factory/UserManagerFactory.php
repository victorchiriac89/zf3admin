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

namespace Admin\Service\Factory;

use Interop\Container\ContainerInterface;
use Admin\Service\UserManager;

/**
 * This is the factory class for UserManager service. The purpose of the factory
 * is to instantiate the service and pass it dependencies (inject dependencies).
 */
class UserManagerFactory {

    /**
     * This method creates the UserManager service and returns its instance. 
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        return new UserManager(
            $container->get('doctrine.entitymanager.orm_default')
        );
    }

}
