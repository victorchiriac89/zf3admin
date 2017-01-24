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

namespace Admin\Controller\Factory;

use Interop\Container\ContainerInterface;
use Admin\Controller\AuthController;
use Zend\ServiceManager\Factory\FactoryInterface;
use Admin\Service\AuthManager;
use Admin\Service\UserManager;

/**
 * This is the factory for AuthController. Its purpose is to instantiate the controller
 * and inject dependencies into its constructor.
 */
class AuthControllerFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        return new AuthController(
            $container->get('doctrine.entitymanager.orm_default'), // entity manager
            $container->get(AuthManager::class), // auth manager
            $container->get(\Zend\Authentication\AuthenticationService::class), // auth service
            $container->get(UserManager::class) // User manager
        );
    }

}
