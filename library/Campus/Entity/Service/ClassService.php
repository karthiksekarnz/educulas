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

namespace Campus\Entity\Service;
use Doctrine\ORM\EntityManager;
use Campus\Entity\Papers;
use Campus\Entity\Classes;
use Campus\Entity\Teacher;


class ClassService {

    const Currentschool = 1;
    
    protected $em;
    protected $papersent;
    protected $classent;
    protected $teacherent;


    public function __construct(EntityManager $em){

        
        $this->em = $em;
        $this->papersent = new Papers();
        $this->classent = new Classes();
        $this->teacherent = new Teacher();
    }

    public function addclass($classdata){

        $this->classent->setClassName($classdata['classname']);
        $this->classent->setTermStart($classdata['tstart']);
        $this->classent->setTermEnd($classdata['tend']);
        $this->classent->setSchool($this->em->find('Campus\Entity\School',self::Currentschool));

        $this->papersent->setPaperName($classdata['subject']);
        $this->papersent->setMaxMarks($classdata['maxmark']);
        $this->papersent->setMinMarks($classdata['passmark']);
        $this->papersent->setMaxMarks($classdata['maxmark']);
        $this->papersent->setTeacher($this->em->find('Campus\Entity\Teacher',$classdata['demoinputlocal']));
        $this->papersent->setSchool($this->em->find('Campus\Entity\School',self::Currentschool));
        $this->papersent->setClassroom($this->classent);

        return $this->papersent;

    }

    public function saveclass(\Campus\Entity\Papers $class){

        $this->em->persist($class);
        $this->em->flush();
    }


}
?>
