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
use Campus\Entity\Student;
use Campus\Entity\Classes;
use Campus\Entity\School;

/**
 * 
 * @author karthik sekar
 */

class StudentService {

    protected $em;
    protected $stuent;
    protected $classesent;
    protected $schoolent;
    protected $profileent;
    protected $userent;
    protected $utypeent;


    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->stuent = new \Campus\Entity\Student();
        $this->userent = new \Campus\Entity\Users();
        $this->profileent = new \Campus\Entity\UserProfile();
        $this->utypeent =  new \Campus\Entity\Usertype();
    }

    public function addstudent($studprofile)
    {
        $currentdate = date("d/m/Y-H:i:s");
        
        $this->userent->setUsername($studprofile['username']);
        $this->userent->setPassword($this->createPassword($studprofile['password'],$currentdate));
        $this->userent->setRegisteredDate($currentdate);
        $this->userent->setLastVisitedTime($currentdate);
        $this->userent->setLastVisitedIp('104.234.43.57');//($this->_request->getServer('REMOTE_ADDR'));


        $this->userent->setUserType($this->em->getRepository('Campus\Entity\Usertype')->findOneByuserType('student'));

        $this->profileent->setProfName($studprofile['firstname']." ".$studprofile['lastname']);
        $this->profileent->setProfGender($studprofile['gender']);
        $this->profileent->setProfDob($studprofile['dob']);
        $this->profileent->setProfPob($studprofile['pob']);
        $this->profileent->setProfSteetAddress($studprofile['streetaddress']);
        $this->profileent->setProfNationality($studprofile['nationality']);
        $this->profileent->setProfReligion($studprofile['religion']);
        $this->profileent->setProfCaste($studprofile['caste']);
        $this->profileent->setProfMobile($studprofile['mobile']);
        $this->profileent->setProfPhno($studprofile['phno']);
        $this->profileent->setProfWebsite($studprofile['website']);
        $this->profileent->setProfPassportno($studprofile['passportno']);
        $this->profileent->setProfUserid($this->userent);

        $this->stuent->setStudRegno($studprofile['regno']);
        $this->stuent->setStudClass($this->em->find('Campus\Entity\Classes',1));//($studprofile['studclass']);
        $this->stuent->setStudSchool($this->em->find('Campus\Entity\School',1));
        $this->stuent->setStudProf($this->profileent);

        return $this->stuent;

    }

    public function savestudent(Student $stud)
    {
        $this->em->persist($stud);
        $this->em->flush();
    }

    public static function createPassword ($rawpass,$salt)
    {
	$password = sha1($rawpass.sha1($salt));
        return $password;
    }
}
?>
