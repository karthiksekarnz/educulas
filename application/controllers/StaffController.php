<?php

class StaffController extends Zend_Controller_Action
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

    public function createprofileAction()
    {
        if(!isset ($this->session->admin))
                $this->_redirect('/admin');
        
        $staffProfile = new Application_Form_StaffProfile();
        $this->view->createform = $staffProfile;

      if ($this->getRequest()->isPost())
      {        
        if($staffProfile->isValid($this->getRequest()->getPost()))
        {
            $profileValues = $this->_getAllParams();               
            $profileService = new \Campus\Entity\Service\StaffService($this->em);
            $profileData = $profileService->createprofile($profileValues);
            $savestaff = $profileService->saveprofile($profileData);             
        }
      }
    }//End of create profile controller
    

    public function editprofileAction()
    {
        if(!isset ($this->session->admin))
                $this->_redirect('/admin');

        $editForm = new Application_Form_StaffProfile();
        $this->view->editform = $editForm;

        $profileService = new \Campus\Entity\StaffService($this->em);
        $userData = $this->em->getRepository('Campus\Entity\Users')->getUser(2);
        $profData = new \Campus\Entity\UserProfile();
       
         $editForm->getElement('username')->setValue($userData->getUsername());
         $editForm->getElement('firstname')->setValue($userData->getProf()->getprofFirstname());
         $editForm->getElement('surname')->setValue($userData->getProf()->getProfLastname());
         $editForm->getElement('dob')->setValue($userData->getProf()->getProfDob());
         $editForm->getElement('pob')->setValue($userData->getProf()->getProfPob());
    }

    public function homeAction()
    {
        $session = new \Zend_Session_Namespace('campus.auth');
        $profname = $this->em->find('Campus\Entity\UserProfile',$session->user->getUserid());
        $this->view->profname = $profname->getProfFirstName();
    }


}



