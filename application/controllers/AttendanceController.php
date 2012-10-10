<?php

class AttendanceController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $attendenceForm = new Application_Form_Attendance();
        $this->view->attendanceform = $attendenceForm;

        

    }


}

