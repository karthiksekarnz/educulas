<?php

use Campus\Auth\Adapter;

class IndexController extends Zend_Controller_Action
{

    protected $_em = null;
    protected $session;

    public function init()
    {
        $this->session = new Zend_Session_Namespace('campus.auth');
    }

    public function indexAction()
    {
        if(isset($this->session->user))
        {
             unset($this->session->user);
        }
       
        $loginform = new Application_Form_Login();
        $this->view->loginform = $loginform;

       if ($this->getRequest()->isPost()) {

 	  if ($loginform->isValid($this->getRequest()->getPost()) ) {

              $values = $loginform->getValues();
              $auth = Zend_Auth::getInstance();               
              $adapter = new Adapter($values['username'], $values['password']);
              $result = $auth->authenticate($adapter);

              if ($result->isValid())
              {
                $this->session->user = $result->getIdentity();
                 
               if(isset($this->session->requestURL))
                 {
                       $url = $this->session->requestURL;
                       unset($this->session->requestURL);
                   	$this->_redirect($url);
                 }

                 else
                  {
	              $this->_helper->getHelper('FlashMessenger')
                           ->addMessage('You were successfully logged in.');
                     
    	              $this->_redirect('/'.$this->session->user->getuserType()->getuserType().'/home');

                  }  // end if auth isValid
              }
              else {

                 $this->view->message = 'You could not be logged in. Please try again.';
	      }
      } // endif: form authentication is valid

     } // endif: posted data is valid
    }

    public function testAction()
    {
       
    }

    public function logoutAction()
    {

        if(isset($this->session->user))
        {
            unset($this->session->user);
            $this->_redirect('/');
        }
        else
        {
            $this->_redirect('/');
        }
    }


}



