<?php

class StaffController extends Zend_Controller_Action
{
    protected $em;
    const PARAM_GET_ID = 1;// 'id';

    public function init()
    {
        $this->em = Zend_Registry::get('doctrine')->getEntityManager();
    }

    public function indexAction()
    {
        
    }

    public function createprofileAction(){

        $staffProfile = new Application_Form_StaffProfile();
        $this->view->createform = $staffProfile;

        if($this->_request->isPost()){

                $profileValues = $this->_getAllParams();               
                $profileService = new \Campus\Entity\Service\StaffService($this->em);
                $profileData = $profileService->createprofile($profileValues);
                $savestaff = $profileService->saveprofile($profileData);             
        }
    }//End of create profile controller

    public function editprofileAction(){

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

}

