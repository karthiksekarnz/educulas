<?php

namespace Campus\Entity\Proxy;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class CampusEntityStudentProxy extends \Campus\Entity\Student implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    private function _load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    
    public function getStudId()
    {
        $this->_load();
        return parent::getStudId();
    }

    public function setStudRegno($studRegno)
    {
        $this->_load();
        return parent::setStudRegno($studRegno);
    }

    public function getStudRegno()
    {
        $this->_load();
        return parent::getStudRegno();
    }

    public function setStudEnrolmentStatus($studEnrolmentStatus)
    {
        $this->_load();
        return parent::setStudEnrolmentStatus($studEnrolmentStatus);
    }

    public function getStudEnrolmentStatus()
    {
        $this->_load();
        return parent::getStudEnrolmentStatus();
    }

    public function setStudProf(\Campus\Entity\UserProfile $studProf)
    {
        $this->_load();
        return parent::setStudProf($studProf);
    }

    public function getStudProf()
    {
        $this->_load();
        return parent::getStudProf();
    }

    public function setStudParent(\Campus\Entity\Parents $studParent)
    {
        $this->_load();
        return parent::setStudParent($studParent);
    }

    public function getStudParent()
    {
        $this->_load();
        return parent::getStudParent();
    }

    public function setStudClass(\Campus\Entity\Classes $studClass)
    {
        $this->_load();
        return parent::setStudClass($studClass);
    }

    public function getStudClass()
    {
        $this->_load();
        return parent::getStudClass();
    }

    public function setStudSchool(\Campus\Entity\School $studSchool)
    {
        $this->_load();
        return parent::setStudSchool($studSchool);
    }

    public function getStudSchool()
    {
        $this->_load();
        return parent::getStudSchool();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'studId', 'studRegno', 'studEnrolmentStatus', 'studProf', 'studParent', 'studClass', 'studSchool');
    }
}