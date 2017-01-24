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

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Barcode\Barcode;
use Zend\Mvc\MvcEvent;
use Admin\Entity\User;

/**
 * This is the main controller class of the Admin Demo application. It contains
 * site-wide actions such as Home or About.
 */
class IndexController extends AbstractActionController {

    /**
     * Entity manager.
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * Constructor. Its purpose is to inject dependencies into the controller.
     */
    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }

    /**
     * This is the default "index" action of the controller. It displays the 
     * Home page.
     */
    public function indexAction() {
        return new ViewModel();
    }
    
    /**
     * This is the default "dashboard" action of the controller.
     */
    public function dashboardAction() {
        return new ViewModel();
    }

    /**
     * The "settings" action displays the info about currently logged in user.
     */
    public function settingsAction() {
        $user = $this->entityManager->getRepository(User::class)
                ->findOneByEmail($this->identity());

        if ($user == null) {
            throw new \Exception('Not found user with this email');
        }

        return new ViewModel([
            'user' => $user
        ]);
    }

}
