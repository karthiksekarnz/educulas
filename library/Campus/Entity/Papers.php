<?php

namespace Campus\Entity;

/**
 * Papers
 *
 * @Table(name="papers")
 * @Entity(repositoryClass = "Campus\Entity\Repository\PapersRepository")
 */
class Papers
{
    /**
     * @var bigint $paperId
     *
     * @Column(name="paper_id", type="bigint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $paperId;

    /**
     * @var string $paperName
     *
     * @Column(name="paper_name", type="string", length=100, nullable=false)
     */
    private $paperName;

    /**
     * @var smallint $minMarks
     *
     * @Column(name="min_marks", type="smallint", nullable=false)
     */
    private $minMarks;

    /**
     * @var smallint $maxMarks
     *
     * @Column(name="max_marks", type="smallint", nullable=false)
     */
    private $maxMarks;

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
     * @var Teacher
     *
     * @ManyToOne(targetEntity="Teacher")
     * @JoinColumns({
     *   @JoinColumn(name="teacher_id", referencedColumnName="staff_id")
     * })
     */
    private $teacher;

    /**
     * @var Classes
     *
     * @ManyToOne(targetEntity="Classes", cascade = {"persist"})
     * @JoinColumns({
     *   @JoinColumn(name="class_id", referencedColumnName="class_id")
     * })
     */
    private $classes;

    /**
     * Get paperId
     *
     * @return bigint $paperId
     */
    public function getPaperId()
    {
        return $this->paperId;
    }

    /**
     * Set paperName
     *
     * @param string $paperName
     */
    public function setPaperName($paperName)
    {
        $this->paperName = $paperName;
    }

    /**
     * Get paperName
     *
     * @return string $paperName
     */
    public function getPaperName()
    {
        return $this->paperName;
    }

    /**
     * Set minMarks
     *
     * @param smallint $minMarks
     */
    public function setMinMarks($minMarks)
    {
        $this->minMarks = $minMarks;
    }

    /**
     * Get minMarks
     *
     * @return smallint $minMarks
     */
    public function getMinMarks()
    {
        return $this->minMarks;
    }

    /**
     * Set maxMarks
     *
     * @param smallint $maxMarks
     */
    public function setMaxMarks($maxMarks)
    {
        $this->maxMarks = $maxMarks;
    }

    /**
     * Get maxMarks
     *
     * @return smallint $maxMarks
     */
    public function getMaxMarks()
    {
        return $this->maxMarks;
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

    /**
     * Set teacher
     *
     * @param Teacher $teacher
     */
    public function setTeacher(\Campus\Entity\Teacher $teacher)
    {
        $this->teacher = $teacher;
    }

    /**
     * Get teacher
     *
     * @return Teacher $teacher
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * Set class
     *
     * @param Classes $class
     */
    public function setClassroom(\Campus\Entity\Classes $class)
    {
        $this->classes = $class;
    }

    /**
     * Get class
     *
     * @return Classes $class
     */
    public function getClassroom()
    {
        return $this->classes;
    }
}