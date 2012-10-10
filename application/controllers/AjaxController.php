<?php

class AjaxController extends Zend_Controller_Action
{
    protected $em;
    protected $teacherent;
    protected $uprofile;
    protected $schoolent;

    public function init()
    {
        /* Initialize action controller here */
	$this->_helper->viewRenderer->setNoRender();
	$this->_helper->getHelper('layout')->disableLayout();
        $this->em = Zend_Registry::get('doctrine')->getEntityManager();
    }

    public function indexAction()
    {
        
    }

    public function attendanceAction()
    {
        $attdparams = $this->_getAllParams();
        $attdservice = new \Campus\Entity\Service\AttendanceService($this->em);
        $prepareattd = $attdservice->prepareattdsheet($attdparams);

        print_r($prepareattd);
    }

    public function teachersAction()
    {

        $this->teacherent = new \Campus\Entity\Teacher();
        $this->uprofile = new \Campus\Entity\UserProfile();
       

        switch ($this->_getParam('mode'))
        {

            case 'list':
            //$allteachers = $this->em->getRepository('Campus\Entity\Teacher')->findBy(array("school"=>'1'));
            //$teachers = $this->em->getRepository('Campus\Entity\Teacher')->getAllTeachersLike($q);
            $data = array(array("id" => "1","name" => "Ruby"),array("id" => "2","name" => "Perl"),array("id" => "3","name" => "Java"),
                array("id" => "4","name" => "Python"),array("id" => "5","name" => "PHP"),array("id" => "6","name" => "Sam"));
            $json_response = Zend_Json_Encoder::encode($data);
            echo $json_response;
            break;

           case 'add':

            $q = $this->_getParam('q');

            $teachers = $this->em->getRepository('Campus\Entity\Teacher')->getAllTeachersLike(1,$q);
            $json_response = Zend_Json_Encoder::encode($teachers);
            echo $json_response;

           //echo "add mode";
           break;

           default:
               echo "error";
           break;


        }
       
    }
	
}

