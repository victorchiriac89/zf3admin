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

namespace Admin\Service;

/**
 * This service is responsible for determining which items should be in the main menu.
 * The items may be different depending on whether the user is authenticated or not.
 */
class NavManager {

    /**
     * Auth service.
     * @var Zend\Authentication\Authentication
     */
    private $authService;

    /**
     * Url view helper.
     * @var Zend\View\Helper\Url
     */
    private $urlHelper;

    /**
     * Constructs the service.
     */
    public function __construct($authService, $urlHelper) {
        $this->authService = $authService;
        $this->urlHelper = $urlHelper;
    }

    /**
     * This method returns menu items depending on whether user has logged in or not.
     */
    public function getMenuItems() {
        $url = $this->urlHelper;
        $items = [];



        // Display "Login" menu item for not authorized user only. On the other hand,
        // display "Admin" and "Logout" menu items only for authorized users.
        if (!$this->authService->hasIdentity()) {
            $items[] = [
                'id' => 'home',
                'label' => 'Home',
                'link' => $url('home')
            ];
            $items[] = [
                'id' => 'login',
                'label' => 'Sign in',
                'link' => $url('admin'),
                'float' => 'right'
            ];
        } else {
            $items[] = [
                'id' => 'home',
                'label' => 'Home',
                'link' => $url('admin/dashboard')
            ];
            $items[] = [
                'id' => 'admin',
                'label' => 'Admin',
                'float' => 'right',
                'dropdown' => [
                    [
                        'id' => 'users',
                        'label' => 'Manage Users',
                        'link' => $url('admin/users')
                    ]
                ]
            ];

            $items[] = [
                'id' => 'logout',
                'label' => $this->authService->getIdentity(),
                'float' => 'right',
                'dropdown' => [
                    [
                        'id' => 'settings',
                        'label' => 'Settings',
                        'link' => $url('admin/settings')
                    ], [
                        'id' => 'logout',
                        'label' => 'Sign out',
                        'link' => $url('admin/logout')
                    ],
                ]
            ];
        }

        return $items;
    }

}
