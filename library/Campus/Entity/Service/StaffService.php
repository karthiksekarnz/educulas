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

namespace Campus\Entity\Service;
use Doctrine\ORM\EntityManager;
use Campus\Entity\Users;
use Campus\Entity\UserProfile;
use Campus\Entity\Teacher;
use Campus\Entity\Repository\UserRepository;

/**
 * 
 * @author karthik sekar
 */

class StaffService {


    const school_id = 1;
    protected $em;
    protected $userent;
    protected $profileent;
    protected $teacherent;
    protected $rep;


    public function __construct (EntityManager $em) {

        $this->em = $em;
        $this->userent = new Users();
        $this->profileent = new UserProfile();
        $this->teacherent = new Teacher();
        
    }

	public function createprofile ($staffprofile) {

        $currentdate = date("d/m/Y-H:i:s");

        $this->userent->setUsername($staffprofile['username']);
        $this->userent->setPassword($this->createPassword($staffprofile['password'],$currentdate));
        $this->userent->setRegisteredDate($currentdate);
        $this->userent->setLastVisitedTime($currentdate);
        $this->userent->setLastVisitedIp('104.234.43.57');        
        $this->userent->setUserType($this->em->getRepository('Campus\Entity\Usertype')->findOneByuserType('staff'));

        $this->profileent->setProfFirstName($staffprofile['firstname']);
        $this->profileent->setProfLastName($staffprofile['lastname']);
        $this->profileent->setProfGender($staffprofile['gender']);
        $this->profileent->setProfDob($staffprofile['dob']);
        $this->profileent->setProfPob($staffprofile['pob']);
        $this->profileent->setProfSteetAddress($staffprofile['streetaddress']);
        $this->profileent->setProfNationality($staffprofile['nationality']);
        $this->profileent->setProfReligion($staffprofile['religion']);
        $this->profileent->setProfCaste($staffprofile['caste']);
        $this->profileent->setProfMobile($staffprofile['mobile']);
        $this->profileent->setProfPhno($staffprofile['phno']);
        $this->profileent->setProfWebsite($staffprofile['website']);
        $this->profileent->setProfPassportno($staffprofile['passportno']);
        $this->profileent->setProfUserid($this->userent);

        $this->teacherent->setJoinDate($staffprofile['doj']);
        $this->teacherent->setQualification($staffprofile['qualification']);
        $this->teacherent->setSchool($this->em->find('Campus\Entity\School',1));
        $this->teacherent->setProfile($this->profileent);
        

        return  $this->teacherent;
    }

    public function saveprofile (Teacher $teach) {
        $this->em->persist($teach);
        $this->em->flush();
    }

    public function updateUser () {
		
    }

    public function deleteUser()
    {
       
    }

    public static function createPassword ($rawpass,$salt)
    {
	$password = sha1($rawpass.sha1($salt));
        return $password;
    }
}



?>
