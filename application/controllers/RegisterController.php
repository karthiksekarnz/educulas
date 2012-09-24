<?php

class RegisterController extends Zend_Controller_Action
{
    protected $em;

    public function init()
    {
        $this->em = \Zend_Registry::get('doctrine')->getEntityManager();
    }

    public function indexAction()
    {
        $form = new Application_Form_Register();

        $this->view->form = $form;

      /*  if($this->getRequest()->isPost()){

            if($this->getRequest()->getPost()){
                $values = $form->getValues();
                $username = $values['username'];
                $password = $values['password'];

                $userRepository = $this->em->getRepository('Campus/Entity/Users');
                $users = $this->UserRepository->findBy(array('username' => $username));

                if(empty($users))
                {
                    $u = new \Campus\Entity\Users();

                }




            }

        }*/

    }


}

