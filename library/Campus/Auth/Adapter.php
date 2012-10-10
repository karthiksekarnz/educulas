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


/**
 * 
 * @author karthik sekar
 */

class Campus_Auth_Adapter implements Zend_Auth_Adapter_Interface
{
    protected $username;
    protected $password;
    protected $userRepository;
    protected $user = null;

    public function __construct($username,$password)
    {
        $this->username = $username;
        $this->password = $password;

        $em = \Zend_Registry::get('doctrine')->getEntityManager();
        $this->userRepository = $em->getRepository('\Campus\Entity\Users');       

    }

    // main authentication method
  // queries database for match to authentication credentials
  // returns Zend_Auth_Result with success/failure code
  public function authenticate()
  {
    $users = $this->userRepository->findBy(array('username' => $this->username));

    if (!empty($users)) { // Is isset() the proper check?

      $user = $users[0];

      $encrytedPassword = User::encryptPassword($this->password, $user->salt);

      if ($encrytedPassword == $user->password) {

          $this->user = $user;

          // I changed this to return $this->user. It was $this->username.
	  //--$returnValue = new \Zend_Auth_Result(\Zend_Auth_Result::SUCCESS, $this->username, array());
          $returnValue = new \Zend_Auth_Result(\Zend_Auth_Result::SUCCESS, $this->user, array());
       }
    }

    if (is_null($this->user)) {

        $returnValue =  new \Zend_Auth_Result(\Zend_Auth_Result::FAILURE, null, array('Authentication unsuccessful'));
    }

    return $returnValue;
  }
}
?>
