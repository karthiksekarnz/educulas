<?php

class StudentController extends Zend_Controller_Action
{
    protected $em;

    public function init()
    {
        $this->em = Zend_Registry::get('doctrine')->getEntityManager();
    }

    public function indexAction()
    {
        // action body
    }

    public function createAction()
    {
        $studform = new Application_Form_StudentProfile();
        $this->view->studform = $studform;

        if($this->_request->isPost()){

            $studprofile = $this->_getAllParams();
            $studservice = new \Campus\Entity\Service\StudentService($this->em);
            $studData = $studservice->addstudent($studprofile);
            $savestudent = $studservice->savestudent($studData);


        }

    }

}

