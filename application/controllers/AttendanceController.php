<?php

class AttendanceController extends Zend_Controller_Action
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
        
        $attendenceForm = new Application_Form_Attendance();
        $this->view->attendanceform = $attendenceForm;         
    }

    public function showAction()
    {
	$this->_helper->getHelper('layout')->disableLayout();     
        
          if($this->_request->getPost())
          {            
             $attdparams = $this->_getAllParams();      
          }
           
          $this->view->month = date('m');
          $this->view->year = $attdparams['year'];
          $this->view->classy = $attdparams['classy'];
          $this->view->caption = date('m');
     }

    public function showgridAction()
    {
        $this->_helper->getHelper('layout')->disableLayout();

          if($this->_request->getPost())
          {
             $attdparams = $this->_getAllParams();
             $month = $attdparams['month'];

             $attdservice = new \Campus\Entity\Service\AttendanceService($this->em);
             $attdsheet = $attdservice->prepareattdsheet($attdparams,$month);

             $nm = cal_days_in_month(CAL_GREGORIAN, $month, $attdparams['year']);
             $colnames = array('student');
             $colmodel = array(array('name' => 'stud', 'index' => 'stud', 'editable' => 'true'));

             foreach(range(1,$nm) as $day)
             {
                 array_push($colnames,$day);
                 array_push($colmodel,array('name' => $day, 'index' => $day, 'editable' => 'true','width' => '25px','sorttype' => 'float'));
             }
         }
          $this->view->colnames = Zend_Json::encode($colnames);//"[\"student\",1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30]";//;
          $this->view->colmodel = Zend_Json::encode($colmodel);//"[{\"name\":\"stud\",\"index\":\"stud\",\"editable\":\"true\"},{\"name\":1,\"index\":1,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":2,\"index\":2,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":3,\"index\":3,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":4,\"index\":4,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":5,\"index\":5,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":6,\"index\":6,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":7,\"index\":7,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":8,\"index\":8,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":9,\"index\":9,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":10,\"index\":10,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":11,\"index\":11,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":12,\"index\":12,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":13,\"index\":13,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":14,\"index\":14,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":15,\"index\":15,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":16,\"index\":16,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":17,\"index\":17,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":18,\"index\":18,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":19,\"index\":19,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":20,\"index\":20,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":21,\"index\":21,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":22,\"index\":22,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":23,\"index\":23,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":24,\"index\":24,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":25,\"index\":25,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":26,\"index\":26,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":27,\"index\":27,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":28,\"index\":28,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":29,\"index\":29,\"editable\":\"true\",\"width\":\"25px\"},{\"name\":30,\"index\":30,\"editable\":\"true\",\"width\":\"25px\"}]";//
          $this->view->attdsheet = $attdsheet;//"[{\"id\":\"1\",\"stud\":\"karthik Sekar\"},{\"id\":\"2\",\"stud\":\"Anand Sathya\"},{\"id\":\"3\",\"stud\":\"Mayank Sharma\"},{\"id\":\"4\",\"stud\":\"Shashank Kapoor\"}]";//$attdsheet;
          $this->view->month = $month;
        
     
    }

}





