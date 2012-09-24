<?php

namespace Campus\Entity;

/**
 * Classes
 *
 * @Table(name="classes")
 * @Entity(repositoryClass = "Campus\Entity\Repository\ClassesRepository")
 */
class Classes
{
    /**
     * @var bigint $classId
     *
     * @Column(name="class_id", type="bigint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $classId;

    /**
     * @var string $className
     *
     * @Column(name="class_name", type="string", length=100, nullable=false)
     */
    private $className;

    /**
     * @var string $termStart
     *
     * @Column(name="term_start", type="string", length=100, nullable=false)
     */
    private $termStart;

    /**
     * @var string $termEnd
     *
     * @Column(name="term_end", type="string", length=100, nullable=false)
     */
    private $termEnd;

    /**
     * @var bigint $schoolId
     *
     * @Column(name="school_id", type="bigint", nullable=false)
     */
    private $schoolId;

    /**
     * Get classId
     *
     * @return bigint $classId
     */
    public function getClassId()
    {
        return $this->classId;
    }

    /**
     * Set className
     *
     * @param string $className
     */
    public function setClassName($className)
    {
        $this->className = $className;
    }

    /**
     * Get className
     *
     * @return string $className
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * Set termStart
     *
     * @param string $termStart
     */
    public function setTermStart($termStart)
    {
        $this->termStart = $termStart;
    }

    /**
     * Get termStart
     *
     * @return string $termStart
     */
    public function getTermStart()
    {
        return $this->termStart;
    }

    /**
     * Set termEnd
     *
     * @param string $termEnd
     */
    public function setTermEnd($termEnd)
    {
        $this->termEnd = $termEnd;
    }

    /**
     * Get termEnd
     *
     * @return string $termEnd
     */
    public function getTermEnd()
    {
        return $this->termEnd;
    }

    /**
     * Set schoolId
     *
     * @param bigint $schoolId
     */
    public function setSchoolId($schoolId)
    {
        $this->schoolId = $schoolId;
    }

    /**
     * Get schoolId
     *
     * @return bigint $schoolId
     */
    public function getSchoolId()
    {
        return $this->schoolId;
    }
}