<?php

namespace Campus\Entity\Proxy;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class CampusEntityPapersProxy extends \Campus\Entity\Papers implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function getPaperId()
    {
        $this->_load();
        return parent::getPaperId();
    }

    public function setPaperName($paperName)
    {
        $this->_load();
        return parent::setPaperName($paperName);
    }

    public function getPaperName()
    {
        $this->_load();
        return parent::getPaperName();
    }

    public function setMinMarks($minMarks)
    {
        $this->_load();
        return parent::setMinMarks($minMarks);
    }

    public function getMinMarks()
    {
        $this->_load();
        return parent::getMinMarks();
    }

    public function setMaxMarks($maxMarks)
    {
        $this->_load();
        return parent::setMaxMarks($maxMarks);
    }

    public function getMaxMarks()
    {
        $this->_load();
        return parent::getMaxMarks();
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

    public function setTeacher(\Campus\Entity\Teacher $teacher)
    {
        $this->_load();
        return parent::setTeacher($teacher);
    }

    public function getTeacher()
    {
        $this->_load();
        return parent::getTeacher();
    }

    public function setClassroom(\Campus\Entity\Classes $class)
    {
        $this->_load();
        return parent::setClassroom($class);
    }

    public function getClassroom()
    {
        $this->_load();
        return parent::getClassroom();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'paperId', 'paperName', 'minMarks', 'maxMarks', 'school', 'teacher', 'classes');
    }
}