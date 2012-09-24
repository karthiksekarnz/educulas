<?php

namespace Campus\Entity;

/**
 * Exam
 *
 * @Table(name="exam")
 * @Entity(repositoryClass = "Campus\Entity\Repository\ExamRepository")
 */
class Exam
{
    /**
     * @var bigint $examId
     *
     * @Column(name="exam_id", type="bigint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $examId;

    /**
     * @var string $examName
     *
     * @Column(name="exam_name", type="string", length=100, nullable=false)
     */
    private $examName;

    /**
     * @var date $exameDate
     *
     * @Column(name="exame_date", type="date", nullable=false)
     */
    private $exameDate;

    /**
     * @var Classes
     *
     * @ManyToOne(targetEntity="Classes")
     * @JoinColumns({
     *   @JoinColumn(name="class_id", referencedColumnName="class_id")
     * })
     */
    private $class;

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
     * Get examId
     *
     * @return bigint $examId
     */
    public function getExamId()
    {
        return $this->examId;
    }

    /**
     * Set examName
     *
     * @param string $examName
     */
    public function setExamName($examName)
    {
        $this->examName = $examName;
    }

    /**
     * Get examName
     *
     * @return string $examName
     */
    public function getExamName()
    {
        return $this->examName;
    }

    /**
     * Set exameDate
     *
     * @param date $exameDate
     */
    public function setExameDate($exameDate)
    {
        $this->exameDate = $exameDate;
    }

    /**
     * Get exameDate
     *
     * @return date $exameDate
     */
    public function getExameDate()
    {
        return $this->exameDate;
    }

    /**
     * Set class
     *
     * @param Classes $class
     */
    public function setClass(\Classes $class)
    {
        $this->class = $class;
    }

    /**
     * Get class
     *
     * @return Classes $class
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set school
     *
     * @param School $school
     */
    public function setSchool(\School $school)
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