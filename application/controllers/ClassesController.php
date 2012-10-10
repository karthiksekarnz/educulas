<?php

class ClassesController extends Zend_Controller_Action
{

    protected $em;

    public function init()
    {
       $this->em = Zend_Registry::get('doctrine')->getEntityManager();
    }

    public function indexAction()
    {
        
       
    }

    public function createAction()
    {
        $classform = new Application_Form_Classes();
        $this->view->autocompleteElement = $classform;

        if($this->_request->isPost())
        {
            $classdetails = $this->_getAllParams();
            $clservice  = new \Campus\Entity\Service\ClassService($this->em);

            $addclass = $clservice->addclass($classdetails);
            $saveclass = $clservice->saveclass($addclass);

        }
    }


}

