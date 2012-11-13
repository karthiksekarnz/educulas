<?php

class StudentController extends Zend_Controller_Action
{

    protected $em = null;
    protected $session;

    public function init()
    {
        $this->em = Zend_Registry::get('doctrine')->getEntityManager();
        $this->session = new Zend_Session_Namespace('campus.auth');
    }

    public function indexAction()
    {
        if(!isset ($this->session->admin))
                $this->_redirect('/admin');
    }

    public function createAction()
    {
        if(!isset ($this->session->admin))
                $this->_redirect('/admin');

        $studform = new Application_Form_StudentProfile();
        

        if($this->getRequest()->isPost())
        {

        if($studform->isValid($this->getRequest()->getPost()))
        {
            $studprofile = $this->_getAllParams();
            $studservice = new \Campus\Entity\Service\StudentService($this->em);
            $studData = $studservice->addstudent($studprofile);
            $savestudent = $studservice->savestudent($studData);
        }
       }
       $this->view->studform = $studform;
    }

    public function homeAction()
    {
        
    }


}



