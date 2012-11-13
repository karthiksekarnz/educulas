<?php
/* 
 *  Copyright 2012 Actuality, Inc.
 * 
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 * 
 *       http://www.apache.org/licenses/LICENSE-2.0
 * 
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 *  under the License.
 */
namespace Campus\Auth;
use Campus\Entity\Users;

/**
 * 
 * @author karthik sekar
 */
class Adapter implements \Zend_Auth_Adapter_Interface
{
    protected $username;
    protected $password;
    protected $salt;
    protected $userRepository;
    protected $usertypeRepository;
    protected $isadmin;
    protected $user = null;
    protected $em;

    public function __construct($username,$password,$admin = false)
    {
        $this->username = $username;
        $this->password = $password;
        $this->isadmin = $admin;
        $this->em = \Zend_Registry::get('doctrine')->getEntityManager();
        $this->userRepository = $this->em->getRepository('\Campus\Entity\Users');
        $this->schoolRepository = $this->em->getRepository('\Campus\Entity\School');
        $this->usertypeRepository = $this->em->getRepository('\Campus\Entity\Usertype');

    }

  public function authenticate()
  {
   
   $users = $this->isadmin == true ? $this->schoolRepository->findBy(array('adminUsername' => $this->username)):  $this->userRepository->findBy(array('username' => $this->username));
     
    if (!empty($users))
    {       
      $user = $users[0];
      $this->salt = $this->isadmin == true ? $user->getSubscriptionDate() : $user->getRegisteredDate();

      $encrytedPassword = Users::encryptPassword($this->password,$this->salt);

      if ($encrytedPassword == $user->getPassword())
      {
          $this->user = $user;          
          $returnValue = new \Zend_Auth_Result(\Zend_Auth_Result::SUCCESS, $this->user, array());
      }
      
    }

    if (is_null($this->user))
    {
        $returnValue =  new \Zend_Auth_Result(\Zend_Auth_Result::FAILURE, null, array('Authentication unsuccessful'));
    }

    return $returnValue;
  }



}
?>
