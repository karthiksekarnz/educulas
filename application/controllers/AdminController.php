<?php
use Campus\Auth\Adapter;

class AdminController extends Zend_Controller_Action
{

    protected $session = null;

    public function init()
    {
        $this->session = new Zend_Session_Namespace('campus.auth');
    }

    public function indexAction()
    {
        $this->_helper->layout->setLayout('admin');

        if(!isset ($this->session->admin))
        {           

        $loginform = new Application_Form_Login();
        $this->view->loginform = $loginform;

       if ($this->getRequest()->isPost()) {

 	  if ($loginform->isValid($this->getRequest()->getPost()) ) {

              $values = $loginform->getValues();
              $auth = Zend_Auth::getInstance();
              $adapter = new Adapter($values['username'], $values['password'],true);
              $result = $auth->authenticate($adapter);

              if ($result->isValid())
              {
    	         $session = new Zend_Session_Namespace('campus.auth');
                 
                 $session->admin = $result->getIdentity();

                 if(isset($session->requestURL))
                 {
                       $url = $session->requestURL;
                       unset($session->requestURL);
                   	$this->_redirect($url);
                 }

                 else
                  {
	              $this->_helper->getHelper('FlashMessenger')
                           ->addMessage('You were successfully logged in.');

    	              $this->_redirect('/admin/dashboard');

                  }  // end if auth isValid
              }
              else {

                 $this->view->message = 'You could not be logged in. Please try again.';
	      }
      } // endif: form authentication is valid

     } // endif: posted data is valid
   } //endif session is set
        else{
            $this->_redirect('/admin/dashboard');
        }
        
    }

    public function dashboardAction()
    {
          if(!isset($this->session->admin))
              $this->_redirect('/admin');       
    }

    public function logoutAction()
    {
        $session = new Zend_Session_Namespace('campus.auth');
        if(isset($session->admin))
        {
            unset($session->admin);
            $this->_redirect('/admin');
        }
        else
        {
            $this->_redirect('/admin');
        }

    }


}



