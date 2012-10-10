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
     * @var School
     *
     * @ManyToOne(targetEntity="School")
     * @JoinColumns({
     *   @JoinColumn(name="school_id", referencedColumnName="school_id")
     * })
     */
    private $school;

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
     * Set school
     *
     * @param School $school
     */
    public function setSchool(\Campus\Entity\School $school)
    {
        $this->school = $school;
    }

    /**
     * Get school
     *
     * @return School $school
     */
    public function getSchool()
    {
        return $this->school;
    }
}