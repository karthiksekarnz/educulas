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
use Campus\Entity\Attendance;
use Campus\Entity\Papers;
use Campus\Entity\UserProfile;
use Campus\Entity\Classes;

class AttendanceService
{

    protected $em;
    protected $attdent;
    protected $papersent;
    protected $classesent;
    protected $attdrep;
    protected $upent;


    public function __construct(EntityManager $em) 
    {        
        $this->em = $em;
        $this->attdent = new \Campus\Entity\Attendance();
        $this->classesent =  new \Campus\Entity\Classes();
        $this->upent = new \Campus\Entity\UserProfile();
    }

    public function prepareattdsheet($attdparams,$month)
    {    
      $datagrid = $this->em->getRepository('Campus\Entity\Attendance')->getattdByMonth($attdparams,$month);
        
      return $datagrid;
    }

    public function preparecalendar($attdparams)
    {
        $attd = $this->em->getRepository('Campus\Entity\Attendance')->findBy(array('class' => $attdparams['classroom'],'attdDate' => $attdparams['date']));

        // If student attendance for the day not found
        if(empty ($attd))
        {
            $attdstudents = $this->em->getRepository('Campus\Entity\Student')->findBy(array('studClass' => $attdparams['classroom']));
            echo "<hr>";
            foreach($attdstudents as $student)
            {
               echo $student->getStudProf()->getProfName()."<hr>";
            }           
        }

        else
        {

        }

       
    }


}
?>
