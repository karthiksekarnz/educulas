<?php

class IndexController extends Zend_Controller_Action
{
    protected $_em;

    public function init()
    {
        /*
         * @var Bisna\Application\Container\DoctrineContainer
         *
         */
          //  $registry = Zend_Registry::getInstance();
            //$this->_em = $registry->get("doctrine")->getEntityManager();
    }

    public function indexAction()
    {
       
          $this->view->autocompleteElement = new ZendX_JQuery_Form_Element_AutoComplete('ac');
          $this->view->autocompleteElement->setLabel('autocomplete');
          $this->view->autocompleteElement->setJQueryParam('data', array('chennai','auckland','new york','london'));          
          


          /*
        * @var Campus\Entity
        */
      /* $u = new \Campus\Entity\Users();
        $u->setUsername('Karthik');
        $this->_em->persist($u);
        $this->_em->flush(); */
    }

    public function testAction(){

        $staffProfile = new Application_form_ExampleForm();
        $this->view->exampleform = $staffProfile;
    }




}

