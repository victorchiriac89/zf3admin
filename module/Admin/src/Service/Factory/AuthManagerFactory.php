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
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Authentication\AuthenticationService;
use Zend\Session\SessionManager;
use Admin\Service\AuthManager;
use Admin\Service\UserManager;

/**
 * This is the factory class for AuthManager service. The purpose of the factory
 * is to instantiate the service and pass it dependencies (inject dependencies).
 */
class AuthManagerFactory implements FactoryInterface {

    /**
     * This method creates the AuthManager service and returns its instance. 
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        // Get contents of 'access_filter' config key (the AuthManager service
        // will use this data to determine whether to allow currently logged in user
        // to execute the controller action or not.
        $config = $container->get('Config');
        if (isset($config['access_filter'])){
            $config = $config['access_filter'];
        }else{
            $config = [];
        }

        // Instantiate the AuthManager service and inject dependencies to its constructor.
        return new AuthManager(
            $container->get(\Zend\Authentication\AuthenticationService::class),
            $container->get(SessionManager::class), 
            $config
        );
    }

}
