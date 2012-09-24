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
     * @var bigint $classId
     *
     * @Column(name="class_id", type="bigint", nullable=false)
     */
    private $classId;

    /**
     * @var bigint $schoolId
     *
     * @Column(name="school_id", type="bigint", nullable=false)
     */
    private $schoolId;

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
     * @var Teacher
     *
     * @ManyToOne(targetEntity="Teacher")
     * @JoinColumns({
     *   @JoinColumn(name="teacher_id", referencedColumnName="staff_id")
     * })
     */
    private $teacher;

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
     * Set classId
     *
     * @param bigint $classId
     */
    public function setClassId($classId)
    {
        $this->classId = $classId;
    }

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
     * Set teacher
     *
     * @param Teacher $teacher
     */
    public function setTeacher(\Teacher $teacher)
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
}