<?php

namespace Campus\Entity\Proxy;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class CampusEntityExamProxy extends \Campus\Entity\Exam implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function getExamId()
    {
        $this->_load();
        return parent::getExamId();
    }

    public function setExamName($examName)
    {
        $this->_load();
        return parent::setExamName($examName);
    }

    public function getExamName()
    {
        $this->_load();
        return parent::getExamName();
    }

    public function setExameDate($exameDate)
    {
        $this->_load();
        return parent::setExameDate($exameDate);
    }

    public function getExameDate()
    {
        $this->_load();
        return parent::getExameDate();
    }

    public function setClass(\Campus\Entity\Classes $class)
    {
        $this->_load();
        return parent::setClass($class);
    }

    public function getClass()
    {
        $this->_load();
        return parent::getClass();
    }

    public function setSchool(\Campus\Entity\School $school)
    {
        $this->_load();
        return parent::setSchool($school);
    }

    public function getSchool()
    {
        $this->_load();
        return parent::getSchool();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'examId', 'examName', 'exameDate', 'class', 'school');
    }
}