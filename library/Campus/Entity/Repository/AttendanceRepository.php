<?php

namespace Campus\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * AttendanceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AttendanceRepository extends EntityRepository
{
    const school_id = 1;

    function getattdByMonth($attdparams,$month)
    {
      $year = $attdparams['year'];
      $classid = $attdparams['classy'];

      $nm = cal_days_in_month(CAL_GREGORIAN, $month,$year );
       //,'stdate' => '1/'.$month.'/'.$year,'endate' => $nm.'/'.($month+1).'/'.$year
      $attdstudents = $this->_em->getRepository('Campus\Entity\Student')->findBy(array('studClass' => $classid));

      $stlist = array();
      foreach($attdstudents as $student)
      {          
         $tmpar = array('id'=> $student->getStudId(),'stud' => $student->getStudProf()->getProfFirstName()." ".$student->getStudProf()->getProfLastName());
         $params = array('classid' => $classid,'schoolid' => self::school_id,'studid' => $student->getStudId());

         //$attd = $this->_em->createQuery('SELECT at.attdRating rat,at.attdDate dat FROM Campus\Entity\Attendance at WHERE (at.school = :schoolid AND at.class = :classid AND at.stud = :studid)');
         $attd = $this->_em->createQuery('SELECT a.attdRating rat FROM Campus\Entity\Attendance a WHERE (a.school = :schoolid AND a.class = :classid AND a.stud = :studid)');
         $attd->setParameters($params);
         $attdlist = $attd->getArrayResult();

         if(!empty($attdlist))
         {
            foreach($attdlist as $rating => $rvalue)
            {              
              $tmp = array($rvalue['attdDate'] => $rvalue['attdRating'] );
              array_push($tmpar, $tmp);
            }
            
         }
            array_push($stlist, $tmpar);
      }
       
        return \Zend_Json::encode($stlist);
    }
}
?>